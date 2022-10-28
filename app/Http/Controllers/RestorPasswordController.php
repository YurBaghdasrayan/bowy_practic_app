<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateuserRequest;
use App\Models\RessetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RestorPasswordController extends Controller
{
    public function index()
    {
        return view('/restore-password');
    }

    public function CodeSend(UpdatePasswordRequest $request)
    {

        $updatePassword = RessetPassword::where([
            'random_int' => $request->random_int,
        ])->get();

        if (!$updatePassword) {
            return redirect('/restore-password')->with('message', 'Произошла ошибка!');
        } else {
            $user_id = $updatePassword[0]->user_id;

            $user = User::where('id', '=', $user_id)->update(['password' => $request->password]);

            $delete = RessetPassword::where(['id' => $updatePassword[0]->id])->delete();

            if ($delete) {
                return redirect('/login')->with('message', 'Ваш пароль успешно изменен!');
            } else {
                return redirect('/restore-password')->with('message', 'Произошла ошибка!');
            }

        }
    }
}
