<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginOtpMail;

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

        if (! Auth::attempt($credentials)) {

            return back()->withErrors([

                'email' => 'Email atau password salah.'

            ]);

        }

        $user = Auth::user();

        Auth::logout();

        $otp = random_int(100000,999999);

        $user->update([

            'otp_code' => $otp,

            'otp_expires_at' => now()->addMinutes(5),

        ]);

        Mail::to($user->email)
            ->send(new LoginOtpMail($otp));

        session([
            'otp_user' => $user->id,
        ]);

        return redirect()->route('verify.otp');
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

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Register berhasil. Silakan login.'
            );
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

    public function showVerifyOtp()
    {
        if(!session()->has('otp_user')){

            return redirect()->route('login');

        }

        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([

            'otp'=>'required'

        ]);

        $user = User::find(
            session('otp_user')
        );

        if(!$user){

            return redirect()->route('login');

        }

        if(

            $user->otp_code != $request->otp ||

            now()->greaterThan($user->otp_expires_at)

        ){

            return back()->withErrors([

                'otp'=>'OTP salah atau sudah expired.'

            ]);

        }

        $user->update([

            'otp_code'=>null,

            'otp_expires_at'=>null,

            'email_verified_at'=>now(),

        ]);

        Auth::login($user);

        session()->forget('otp_user');

        return redirect('/');
    }
}