<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginApiRequest;
use App\Http\Requests\LoginRequest;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('/login');
    }

    public function postLogin(LoginRequest $request)
    {

        $data = $request->validated();

        if ($request->rememberme) {
            $remember = true;
            if (Auth::attempt($data, $remember)) {
                $request->session()->regenerate();
                return redirect('/profile/active-ads');

            } else {
                return redirect('/login')->with('login_error', 'неверные данные');
            }
        } else {
            if (Auth::attempt($data)) {
                $request->session()->regenerate();
                return redirect('profile/active-ads');
            } else {
                return redirect('/login')->with('login_error', 'неверные данные');
            }
        }
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/login');
    }

    public function storeLogin(LoginApiRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $token = auth()->user()->createToken('API Token')->accessToken;

            return response(['user' => auth()->user(), 'token' => $token], 200);
        } else {
            return response(['error_message' => 'неверный логин или пароль'],401);
        }
    }
}
