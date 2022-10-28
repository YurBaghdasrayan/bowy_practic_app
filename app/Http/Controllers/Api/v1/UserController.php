<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UpdateUsersRequest;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::where("id",$id)->get();
        return response()->json([$user]);
        
    }
    
    public function update(UpdateUsersRequest $request)
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
                    'number' => $request->number,
                    'image' => $user_image,
                    'city' => $request->city
                ];

                $update_success = $user->update($update_data);

                if ($update_success) {
                    return response()->json([
                        'data'=> $user,
                        'status' => true,
                        'message' => 'ваш профиль обновлен',
                    ], 200);

                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'что то пошло не так попробуйте снова'
                    ], 422);
                }

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'этот емайл существует'
                ],422);
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
                return response()->json([
                    'message' => 'Профиль обновлен!',
                    'status' => true
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message', 'что то пошло не так попробуйте снова'
                ]);
            }

        }
    }
}
