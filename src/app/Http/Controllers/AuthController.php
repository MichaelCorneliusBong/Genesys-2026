<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {

            $request->session()->regenerate();

            return redirect('/')
                ->with('success','Welcome back!');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password salah.',
            ])
            ->onlyInput('email');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    public function showRegister(Request $request)
    {
        $a = rand(1,9);
        $b = rand(1,9);

        session([
            'captcha_answer' => $a + $b
        ]);

        return view('auth.register', compact(
            'a',
            'b'
        ));
    }

    public function register(Request $request)
    {
        $request->validate([

            'name'=>'required|max:255',

            'email'=>'required|email|unique:users,email',

            'password'=>'required|min:8|confirmed',

            'captcha'=>'required|numeric',

        ]);

        if (
            (int)$request->captcha !==
            session('captcha_answer')
        ) {

            return back()

                ->withInput()

                ->withErrors([
                    'captcha'=>'Captcha salah.'
                ]);

        }

        $user = User::create([

            'name'=>$request->name,

            'email'=>$request->email,

            'password'=>$request->password,

        ]);

        $user->assignRole('user');

        Auth::login($user);

        return redirect('/')
            ->with('success','Register berhasil.');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}