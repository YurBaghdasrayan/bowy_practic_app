<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RestorePasswordRequest\RestorePasswordRequest;
use App\Mail\RessetpasswordMail;
use App\Models\RessetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function send(Request $request)
    {
        $email = $request->email;
        $email_exist = User::where(['email' => $email, 'role_id' => '1'])->get();

        if (!$email_exist->isEmpty()) {

            $randomNumber = random_int(100000, 999999);
            $user_id = $email_exist[0]->id;

            $details = [
                'title' => 'Mail from BOWY.com',
                'code' => $randomNumber,
                'body' => 'This is for forggot password'
            ];

            Mail::to($email)->send(new RessetpasswordMail($details));

            $code = RessetPassword::create([
                "user_id" => $user_id,
                "random_int" => $randomNumber,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'code os sended to your email'
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Email не существует !'
            ]);
        }
    }

    public function CodeSend(Request $request)
    {
        $updatePassword = RessetPassword::where([
            'random_int' => $request->random_int,
        ])->get();

        if (!$updatePassword) {
          return response()->json([
              'success' => true,
              'message' => 'Code is not right'
          ], 422);
        } else {
            $user_id = $updatePassword[0]->user_id;

            $user = User::where('id', '=', $user_id)
                ->update([
                    'password' => Hash::make($request->password)
                ]);

            $delete = RessetPassword::where(['id' => $updatePassword[0]->id])->delete();

            if ($delete) {
                return response()->json([
                        'status' => true,
                        'message' => 'Ваш пароль успешно изменен!']
                );
            } else {
                return response()->json([
                    'status' => false,
                    'message', 'Произошла ошибка!',
                ]);
            }
        }
    }
}
