<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    } 

    public function index() 
    {
      return redirect()->route('login');
    }

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
        $sessionUserData = User::Where('email', '=',$request->email)->first();

        Session::put('sessionUserData', $sessionUserData);
        return redirect()->intended('dashboard');
      } else {
        return back()->withErrors(['email' => 'Your provided credentials could not be verified']);
      }
    }

    public function showRegister(Request $request) 
    {
      return view('prod.auth.register');
    }
    
    public function register(Request $request) 
    {
      $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|required_with:conf_password|same:conf_password',
        'conf_password' => 'required|min:8',
      ]);

      $userData = [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'password' => $request->get('password')
      ]; 

      return view('prod.auth.confirm_register', ['userData' => $userData]);
    } 

    public function registerConfirm(Request $request)
    {
      $userData = [
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'password' => Hash::make($request->get('password'))
      ]; 

      User::create($userData);
      return redirect('login')->with('success','You have successfully registered,please login!');
    }

    public function logout(Request $request)
    {
      Auth::logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect()->route('/');
    }

}
