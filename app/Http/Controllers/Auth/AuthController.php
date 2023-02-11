<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Mail\VerificationMail;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

use function Ramsey\Uuid\v1;

class AuthController extends Controller
{

    public function __construct()
    {
        // $this->middleware('guest')->except(['login']);
    }

    public function index()
    {
        return redirect()->route('login');
    }

    /* User login and register */

    public function showLogin()
    {
        return view('prod.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $userID =  Auth::user()->id;
            $sessionUserData = User::Where('email', '=', $request->email)->first();

            if ($sessionUserData->email_verified) {
                Session::put('sessionUserData', $sessionUserData);
                if (Auth::user()->role == 'Manager') {
                    return redirect('manager/dashboard');
                } else {
                    return redirect('staff/dashboard');
                }
            } else {

                $token = Crypt::encryptString(Str::random(40));
                $expiration = now()->addMinutes(30);
                User::where('id', $sessionUserData->id)->update([
                    'token_expire_date' => $expiration
                ]);
                $data = [
                    'name' => $sessionUserData->first_name . $sessionUserData->last_name,
                    'url' => 'http://127.0.0.1:8000/verify-email/user/' . $sessionUserData->id . '/' . $token,
                    'user_id' => $sessionUserData->id,
                    'email' => $sessionUserData->email
                ];
                Mail::to('aungkaungmyatkpg777@gmail.com')->send(new VerificationMail($data));
                return redirect('/email-verify/user/' . $sessionUserData->id)->with(['data' => $data]);
            }
        } else {
            return back()->withErrors(['email' => 'Your provided email or password not match!']);
        }
    }

    public function showRegister(Request $request)
    {
        return view('prod.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|required_with:conf_password|same:conf_password',
            'conf_password' => 'required|min:8',
        ]);

        $userData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role' => 'Staff',
            'status' => 1,
        ];

        return view('prod.auth.confirm_register', ['userData' => $userData]);
    }

    public function registerConfirm(Request $request)
    {
        $userData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
            'status' => $request->get('status'),
        ];

        $user = User::create($userData);


        $token = Crypt::encryptString(Str::random(40));
        $expiration = now()->addMinutes(30);
        User::where('id', $user->id)->update([
            'token_expire_date' => $expiration
        ]);
        $data = [
            'name' => $user->first_name . $user->last_name,
            'url' => 'http://127.0.0.1:8000/verify-email/user/' . $user->id . '/' . $token,
            'user_id' => $user->id,
            'email' => $user->email
        ];
        Mail::to('aungkaungmyatkpg777@gmail.com')->send(new VerificationMail($data));
        return redirect('/email-verify/user/' . $user->id)->with(['data' => $data]);
    }

    /* User login and register */

    /* User email verification */


    public function showEmailVerification(Request $request, $id)
    {
        $user = User::where([
            'id' => $id
        ])->first();
        if (!$user) {
            abort(404);
        }
        return view('prod.auth.email_verify_form')->with(['data' => $user]);;
    }

    public function emailVerify(Request $request, $id, $token)
    {
        $user = User::where('id', $id)->first();
        $now = now();

        if ($now->gt($user->token_expire_date)) {
            abort(403);
        } else {
            User::where('id', $user->id)->update([
                'email_verified' => true
            ]);
        }
        return redirect('login')->with('success', 'You have successfully registered,please login!');
    }

    public function resentEmail(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            abort(404);
        }

        $token = Crypt::encryptString(Str::random(40));
        $expiration = now()->addMinutes(30);
        User::where('id', $user->id)->update([
            'token_expire_date' => $expiration
        ]);
        $data = [
            'name' => $user->first_name . $user->last_name,
            'url' => 'http://127.0.0.1:8000/verify-email/user/' . $user->id . '/' . $token
        ];
        Mail::to('aungkaungmyatkpg777@gmail.com')->send(new VerificationMail($data));

        // Set a flash message
        $request->session()->flash('success', 'Email resent successfully!');
        return redirect()->back()->with('messages', 'Email Resent Successfully!');
    }

    /* User email verification */


    /* Forgot Password*/


    public function showRecoveryForm(Request $request)
    {
        return view('prod.auth.forgot_password');
    }

    public function recoveryPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|email'
        ]);
        $email = $request->email;

        $user = User::where('email', $email)->first();
        if (!$user) {
            // Set a flash message
            $request->session()->flash('noUser', 'This user doesn\'t exist.');
            return redirect()->back();
        }

        $randomNumber = random_int(1000000, 9999999);
        $expiration = now()->addMinutes(30);
        User::where('id', $user->id)->update([
            'token_expire_date' => $expiration,
            'token' => $randomNumber
        ]);
        $data = [
            'name' => $user->first_name . $user->last_name,
            'url' => 'http://127.0.0.1:8000/forgot-reset/' . $user->id . '/' . $randomNumber,
            'user_id' => $user->id,
            'email' => $user->email,
        ];
        Mail::to('aungkaungmyatkpg777@gmail.com')->send(new VerificationMail($data));
        return redirect('/forgot-reset');
    }

    public function showPasswordResetForm(Request $request, $id, $token)
    {
        $user = User::where('id', $id)->first();
        if (!$user || $user->token !== $token) {
            abort(404);
        }
        $now = now();
        if ($now->gt($user->token_expire_date)) {
            abort(403);
        }

        return view('prod.auth.password-reset')->with(['data' => $user]);
    }



    public function passwordReset(Request $request, $id)
    {
        $request->validate([
            'password' => 'required|min:8|required_with:conf_password|same:conf_password',
            'conf_password' => 'required|min:8',
        ]);
        User::where('id', $id)->update([
            'password' => Hash::make($request->get('password')),
        ]);
        return redirect('login')->with('success', 'Your password is successfully recovered,please login!');
    }

    /* Forgot Password*/

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
