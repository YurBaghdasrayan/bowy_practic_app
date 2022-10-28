<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('admin.admin-login');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->validated();
        
        if (Auth::attempt($data)) {
            if (auth()->user()->role_id == 2) {
                $request->session()->regenerate();
                return redirect('/admin/users');
            } else {
                return redirect(route('admin.auth'))->with('messages', 'Простите вы не администратор');
            }
        } 
        else {
            return redirect(route('admin.auth'))->with('messages', 'Простите вы не администратор');
        }

    }
}
