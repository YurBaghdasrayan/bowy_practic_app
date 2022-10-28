<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiRegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UsersRequest;
use App\Jobs\RegisteredSuccessEmailJob;
use App\Mail\RegisteredSuccessFullyMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use PhpParser\Parser\Multiple;
use Illuminate\Auth\Events\Registered;
use App\Mail\SendMail;
use Stevebauman\Location\Facades\Location;


class RegisterController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function view()
    {
        return view('mails.verified');
    }

    public function postSignup(UsersRequest $request)
    {

        $image = $request->file('image');
        $randomNumber = random_int(100000, 999999);
        if ($image) {
            $destinationPath = 'public/uploads';
            $originalFile = time() . $image->getClientOriginalName();
            $image->storeAs($destinationPath, $originalFile);

            $data = [
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => Role::USER_ID,
                'image' => $originalFile,
                'verified_code' => $randomNumber
            ];
        } else {
            $data = [
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => Role::USER_ID,
                'verified_code' => $randomNumber
            ];
        }
        $user = User::create($data);

        if ($user) {
            $details = [
                'email' => $user->email,
                'verification_at' => $randomNumber,
            ];

            Mail::to($user->email)->send(new SendMail($details));

            $login_data = array(
                'email' => $request->email,
                'password' => $request->password,
            );

            if (Auth::attempt($login_data)) {
                $request->session()->regenerate();

                return redirect('/verify');
            }
        }
    }

    public function CodeRepeatWeb(Request $request)
    {
        $randomNumber = random_int(100000, 999999);
        $user = Auth::user();

        if ($user) {
            $details = [
                'email' => $user->email,
                'verification_at' => $randomNumber,
            ];
            Mail::to($user->email)->send(new SendMail($details));
            $updating = User::where('id', '=', $user->id)->update(['verified_code' => $randomNumber]);
            return redirect()->route('verify');
        } else {
            return response()->json([
                'success' => false,
                'message' => 'something was wrong'
            ], 200);
        }
    }

    public function verifycode(Request $request)
    {
        $user_code = $request->user_code;

        $users = User::where('verified_code', '=', $user_code)->get();

        if (!$users->isEmpty()) {

            $user_id = $users[0]->id;

            $updating = User::where('id', '=', $user_id)->update(['verified_code' => 1]);
            return redirect()->route('profile-active-ads');

            if (!$updating) {
                return redirect()->route('verify');
            }
        } else {
            return redirect()->route('verify');
        }
    }

    public function storeApi(ApiRegistrationRequest $request)
    {
        $ip = request()->ip();
        $data = \Location::get($ip);
        $randomNumber = random_int(100000, 999999);

        $data = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => Role::USER_ID,
            'number' => $request->number,
            'name' => $request->name,
            'verified_code' => $randomNumber,
            'location' => $data->regionName
        ];


        $user = User::create($data);
//        if ($user) {
//            $details = [
//                'email' => $user->email,
//                'verification_at' => $randomNumber,
//            ];
//
//            Mail::to($user->email)->send(new SendMail($details));
//
//            $login_data = array(
//                'email' => $request->email,
//                'password' => $request->password,
//            );
//
//            if (Auth::attempt($login_data)) {
//                $token = auth()->user()->createToken('API Token')->accessToken;
//
//                return response(['user' => auth()->user(), 'token' => $token], 200);
//            } else {
//                return response(['error_message' => 'неверный логин или пароль']);
//            }
//        }

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'user successfully registered'
            ], 200);
        } else {
            return response()->json([
                'success' => false
            ], 401);
        }
    }

    public function verifycodeapi(Request $request)
    {
        $user_code = $request->verified_code;

        $users = User::where(['verified_code' => $user_code, 'email' => $request->email])->first();

        if ($users) {
            $user_id = $users->id;
            $updating = User::where('id', '=', $user_id)->update(['verified_code' => 1]);

//            $updating_user = User::where('id', '=', $user_id)->first();
//            $login_data = array(
//                'email' => $users->email,
//            );
//            dd($login_data);
//            $updating_users = User::where('email', '=', $updating_user->email)->first();
//            if ($updating_users){
//                $token = auth()->user()->createToken('API Token')->accessToken;
//                return response(['user' => auth()->user(), 'token' => $token], 200);
//            }
//            if(Auth::loginUsingId($user_id)) {
//                $token = auth()->user()->createToken('API Token')->accessToken;
//
//                return response(['user' => auth()->user(), 'token' => $token], 200);
//            } else {
//                    return response(['error_message' => 'неверный логин или пароль']);
//            }

            if ($updating) {
                return response()->json([
                    'success' => true,
                    'message' => 'your account successfully verified'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'something was wrong'
                ], 422);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'something was wrong'
            ], 422);
        }
    }

    public function CodeRepeat(Request $request)
    {
        $randomNumber = random_int(100000, 999999);
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $details = [
                'email' => $user->email,
                'verification_at' => $randomNumber,
            ];

            Mail::to($user->email)->send(new SendMail($details));
            $updating = User::where('id', '=', $user->id)->update(['verified_code' => $randomNumber]);
//            dd($updating);
            if ($updating) {
                return response()->json([
                    'success' => true,
                    'message' => 'verified code successfully updatet'
                ], 200);

            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'this email was not found'
                ], 200);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'this email was not found'
            ], 200);
        }
    }
}
