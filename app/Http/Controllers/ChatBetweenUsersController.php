<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatBetweenUsersController extends Controller
{
    public function index($product_id, $receiver_id)
    {
        $data = Chat::where(function ($query) use ($product_id,$receiver_id) {
                $query->where([
                    'sender_id' => auth()->id()
                ])->where('product_id' , $product_id)->where('receiver_id' , $receiver_id)
                    ->orWhere([
                        'receiver_id' => auth()->id(),
                    ])->where(['product_id' => $product_id,])->where('sender_id' , $receiver_id);
                })
            ->with(['user', 'forusers', 'products']

            )
            ->orderBy('id', 'ASC')
//            ->groupBy('product_id')
            ->get();
        return response()->json([
            "success" => true,
            "message" => $data
        ], 200);


        return view('chat.chatforusers', compact('data', 'leftChatData'));
    }

}
