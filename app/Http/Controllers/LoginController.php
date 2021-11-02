<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

      
        $check = Auth::attempt($credentials);
        //$check = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);

        if ($check) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'Tài khoản sai hoặc đã tồn tại,vui lòng nhập lại.',
            // 'password' => 'Mật khẩu không đúng, vui lòng nhập lại',
            'email.required' => 'vui lòng nhập thông tin'
        ]);
    }

    public function login(){

        $pass = Hash::make(123456); 
        // dd($pass);
        return view('admin.authentication.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}