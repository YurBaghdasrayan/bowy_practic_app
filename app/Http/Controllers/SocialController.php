<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class SocialController extends Controller
{
    public function googleRedirect()
    {

        return Socialite::driver('google')->redirect();
    }

    public function loginWithGoogle()
    {

        try {
            $randomNumber = random_int(100000, 999999);

            $user = Socialite::driver('google')->user();

            $isUser = User::where('google_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);

                return redirect('profile/place-anad');
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('user'),
                    'image' => 'profile.image.png',
                    'role_id' => Role::USER_ID,
                    'verified_code' => $randomNumber
                ]);

                if ($createUser) {
                    $details = [
                        'email' => $user->email,
                        'verification_at' => $randomNumber,
                    ];

                    Mail::to($user->email)->send(new SendMail($details));


//                    $login_data = array(
//                        'email' => $user->email,
//                        'password' => $user->password,
//                    );
//                    dd($login_data);
//
//
//                    if (Auth::attempt($login_data)) {
//                        $token = auth()->user()->createToken('API Token')->accessToken;
//
//                        return redirect()->route('verify');
//                    } else {
//                        return response(['error_message' => 'неверный логин или пароль']);
//                    }
                }
                Auth::login($createUser);

                return redirect('profile/active-ads');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    public function vkRedirect()
    {
        return Socialite::driver('vkontakte')->redirect();
    }
    public function loginWithVk()
    {
        try {
            $user = Socialite::driver('vkontakte')->user();

            $isUser = User::where('vk_id', $user->id)->first();


            if ($isUser) {
                Auth::login($isUser);

                return redirect('profile/place-anad');
                
            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'vk_id' => $user->id,
                    'password' => encrypt('user'),
                    'image' => 'profile.image.png',
                    'role_id' => Role::USER_ID,
                    'verified_code' => $randomNumber
                ]);
                if ($createUser) {
                    $details = [
                        'email' => $user->email,
                        'verification_at' => $randomNumber,
                    ];

                    Mail::to($user->email)->send(new SendMail($details));

                    $data = User::where('email', $user->email)->where('password', hash())->get();

                    $login_data = array(
                        'email' => $user->email,
                        'password' => $user->password,
                    );

                    if (Auth::attempt($login_data)) {
                        $token = auth()->user()->createToken('API Token')->accessToken;

                        return redirect()->route('verify');
                    } else {
                        return response(['error_message' => 'неверный логин или пароль']);
                    }
                }

                Auth::login($createUser);

                return redirect('profile/place-anad');
            }
        } catch (Exception $exception) {
            return redirect('/login')->with('vk_error', 'необходимо быть зарегистрированным через емайл адрес для аворизацию через вконтакте ');

        }
    }

    public function okRedirect()
    {
        return Socialite::driver('odnoklassniki')->redirect();
    }

    public function loginWithOk()
    {
        try {
            $user = Socialite::driver('odnoklassniki')->user();
            $isUser = User::where('ok_id', $user->id)->first();

            if ($isUser) {
                Auth::login($isUser);

                return redirect('profile/place-anad');

            } else {
                $createUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'ok_id' => $user->id,
                    'password' => encrypt('user'),
                    'image' => 'profile.image.png',
                    'role_id' => Role::USER_ID,
                ]);

                Auth::login($createUser);

                return redirect('profile/place-anad');
            }
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}
