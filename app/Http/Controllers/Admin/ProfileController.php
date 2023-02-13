<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $respondData;

    public function __construct()
    {
        $this->respondData = [];
    }

    public function index()
    {
        $this->respondData = [
            'users' => User::latest()->get()
        ];

        return view('prod.profile.list', $this->respondData);
    }

    public function showProfile(Request $request)
    {
        return view('prod.profile.add');
    }

    public function profileValidation(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|required_with:conf_password|same:conf_password',
            'conf_password' => 'required|min:8',
            'role' => 'required',
            'status' => '',
        ]);

        $userData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password'),
            'role' => $request->get('role'),
            'status' => 1,
        ];

        Session::put('sessionUserData', $userData);

        $this->respondData = [
            'userData' => $userData
        ];

        return view('prod.profile.confirm', $this->respondData);
    }

    public function profileSave(Request $request)
    {
        $sessionUserData = Session::get('sessionUserData');
        $userData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
            'status' => $request->get('status'),
        ];

        User::create($userData);
        Session::forget('sessionUserData');
        return redirect('profile/list')->with('success', 'You have successfully registered!');
    }

    public function edit($id)
    {
        $this->respondData = [
            'users' => User::where('id', $id)->first(),
        ];

        return view('prod.profile.edit', $this->respondData);
    }

    public function editValidate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'status' => '',
        ]);

        $userData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'role' => $request->get('role'),
            'status' => $request->get('status')
        ];

        User::where('id', $id)->update($userData);
        return redirect('/profile/list')->with('success', 'Well done! User infomation successfully updated!');
    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('profile/list')->with('success', 'Your profile is successfully Deleted!');
    }

    public function changePassword()
    {
        return view('prod.profile.change-password');
    }

    public function changePasswordPost(Request $request)
    {
        $dataEmail = Auth::user()->email;
        $user = User::where('email', $dataEmail)->get();
        $hashedPassword = $user[0]->password;


        $request->validate([
            'old-password' => 'required',
            'new-password' => 'required|min:8|required_with:confirm-password|same:confirm-password',
            'confirm-password' => 'required|min:8'
        ], [
            'old-password.required' => 'The current password field is required.'
        ]);

        if (Hash::check($request->get('old-password'), $hashedPassword)) {
            $userData = User::whereEmail($dataEmail)->update([
                'password' => Hash::make($request->get('new-password')),
            ]);

            if ($userData) {
                return redirect('profile/list')->with('success', 'Password is successfully Updated!');
            }
        } else {
            return redirect('profile/changepassword')->with('error', 'Current password is not match.');
        }
    }
}
