<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        }

        return view('admin/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('admin/dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function profile() {
        return view('admin.profile.edit');
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
        return redirect('/admin/profile');
    }
}
