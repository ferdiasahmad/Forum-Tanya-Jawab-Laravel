<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Logincontroller extends Controller
{
    public function index()
    {
        return view('auth.login');

    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $rules =[
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_confirm' => 'nullable|same:password'
        ];

        $customMessages =[
            'password.confirmed' => 'Password belum sama !',
            'password_confirm.confirmed' => 'password belum sama !',
            'name.required' => 'nama belum diisi !',
            'email.required' => 'email belum diisi !',

        ];
        $this->validate($request, $rules, $customMessages);


        $User = new User();
        $User->email = $request->email;
        $User->name = $request->name;
        // $User->id = 3 ;
        if ($request->password !== null) {
            $User->password = Hash::make($request->password_confirm);
        }

        $User->save();

        return redirect()->route('login')->with('messageSuccess', 'Berhasil daftar');
    }

    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' =>['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/pertanyaan');
        }
        return back()->with('fail', 'Login failed');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}



