<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateuserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Chat;



class ProfileSettingsController extends Controller
{
    public function index()
    {
        $data = Chat::where('sender_id', auth()->user()->id)->orWhere('receiver_id',auth()->user()->id)->orderBy('id','DESC')->get();
        $unnlogeds = Product::with('user')->get();
        return view('profile-settings',compact('data','unnlogeds'));
    }

    public function update(UpdateuserRequest $request)
    {
        $image = $request->file('image');
        if ($image) {
            $destinationPath = 'public/uploads';
            $user_image = time() . $image->getClientOriginalName();
            $image->storeAs($destinationPath, $user_image);
        } else {
            $user_image = auth()->user()->image;
        }

        $user = auth()->user();
        $email = $request->email;
        $email_exist = User::where(['email' => $email, 'role_id' => '1'])->get();
        if (!$email_exist->isEmpty()) {

            $exist_data_id = $email_exist[0]->id;

            if (auth()->user()->id == $exist_data_id) {

                $update_data = [
                    'name' => $request->name,
                    'surname' => $request->surname,
                    'number' =>  $request->number,
                    'image' => $user_image,
                    'city' => $request->city
                ];

                $update_success = $user->update($update_data);

                if ($update_success) {
                    return redirect('profile/settings')->with('status', 'Профиль обновлен!');

                } else {
                    return redirect('profile/settings')->with('error', 'что то пошло не так попробуйте снова');
                }

            } else {
                return redirect('profile/settings')->with('emailerror', 'этот емайл существует');
            }

        } else {

            $update_data = [
                'email' => $request->email,
                'name' => $request->name,
                'surname' => $request->surname,
                'number' => $request->number,
                'image' => $user_image,
                'city' => $request->city
            ];

            $update_success = $user->update($update_data);

            if ($update_success) {
                return redirect('profile/settings')->with('status', 'Профиль обновлен!');
            } else {
                return redirect('profile/settings')->with('error', 'что то пошло не так попробуйте снова');
            }

        }
    }
}
