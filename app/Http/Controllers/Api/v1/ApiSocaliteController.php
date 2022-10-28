<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginApiRequest;
use App\Http\Requests\LoginRequest;
use App\Models\City;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Location\Facades\Location;



class ApiSocaliteController extends Controller
{

    public function googleRedirect()
    {

        return response()->json([
            'url' => Socialite::driver('google')
                ->stateless()
                ->redirect()
                ->getTargetUrl(),
        ]);
    }

    public function loginWithGoogle(Request $request)
    {
        try {


//            dd($request->regionName);

            $password = 'bowy2022';
            $password = Hash::make($password);

            $randomNumber = random_int(100000, 999999);


            $data = $request->all();

            $isUser = User::where('email', $request->email)->first();

            if ($isUser) {
                Auth::loginUsingId($isUser->id);

                $token = auth()->user()->createToken('API Token')->accessToken;

                return response()->json([
                    "success" => true,
                    "userdata" => auth()->user(),
                    "token" => $token,
                    "message" => "user successfully login",
                ], 200);

            } else {
                $ip = request()->ip();
                $data = \Location::get($ip);

                $data = [
                    'email' => $request->email,
                    'google_id' => $request->id,
                    'password' => $password,
                    'image' => 'profile.image.png',
                    'role_id' => Role::USER_ID,
                    'verified_code' => 1,
                    'location'=>$data->regionName
                ];

                $user = User::create($data);

                if ($user) {
                    $details = [
                        'email' => $request->email,
                        'verification_at' => $randomNumber,
                    ];
                    Mail::to($request->email)->send(new SendMail($details));

                    Auth::loginUsingId($user->id);

                    $token = auth()->user()->createToken('API Token')->accessToken;

                    return response()->json([
                        "success" => true,
                        "message" => "user successfully registered",
                        "userdata" => auth()->user(),
                        'token' => $token,
                    ], 200);

                }
            }
        } catch
        (Exception $exception) {
            dd($exception->getMessage());
        }


    }

    public function vkRedirect()
    {
        return Socialite::driver('vkontakte')->redirect()->getTargetUrl();

        return \response()->json([
            'url' => $url
        ]);
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
                ]);

                Auth::login($createUser);

                return redirect('profile/place-anad');
            }
        } catch (Exception $exception) {
        }
    }

}
