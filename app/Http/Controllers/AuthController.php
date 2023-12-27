<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{

    public function index()
    {
        // if (Auth::check()) 
        // {
        //     return redirect('student');
        // }
        // else
        // {
        //     return view('auth.login');
        // }
        return view('auth.login');
    
    }

    public function login_proses(Request $request)
    {
        // dd($request->all());
        // if (Auth::attempt($request->only('email','password')));
        //     return redirect('student');
      
    }
    

    public function regis()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);

    
        return redirect ('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
