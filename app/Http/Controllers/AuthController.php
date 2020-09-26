<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function handleRegister(Request $request)
    {
        $user =  $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100|min:5',
        ]);

        // dd($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,

        ]);



        Auth::login($user);
        if ($request->status == 'student') {
            return redirect(route('students.create'));
        }
        if ($request->status == 'company') {
            return redirect(route('companies.create'));
        }
        return redirect(route('student.index'));
    }


    public function login()
    {
        return view('auth.login');
    }

    public function handleLogin(Request $request)
    {
        $user =  $request->validate([

            'email' => 'required|email|max:100',
            'password' => 'required|string|max:100|min:5',
        ]);

        $is_login = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if (!$is_login) {
            return back();
        }

        if (Auth::user()->status == 'student') {
            return redirect(route('students.index'));
        }
        if (Auth::user()->status == 'company') {
            return redirect(route('companies.index'));
        }


        return redirect(route('admin.index'));
    }

    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}
