<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use App\Mail\RessetpasswordMail;
use App\Models\RessetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotController extends Controller
{
    public function index()
    {
        return view('/forgot-password');
    }

    public function send(ForgotPasswordRequest $request)
    {
        $email = $request->validated();

        $email_exist = User::where(['email' => $email, 'role_id' => '1'])->get();

        if (!$email_exist->isEmpty()) {

            $randomNumber = random_int(100000, 999999);
            $user_id = $email_exist[0]->id;

            $details = [
                'title' => 'Mail from BOWY.com',
                'code' => $randomNumber,
                'body' => 'This is for forgot password'
            ];

                 Mail::to($email)->send(new RessetpasswordMail($details));

                 $code = RessetPassword::create([
                    "user_id" => $user_id,
                    "random_int" => $randomNumber,
                ]);

                 return redirect('/restore-password');

        } else {
            return redirect('/forgot-password')->with('message', 'Email не существует !');
        }
    }
}
