<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class RightSideChatController extends Controller
{
    public function index()
    {
        $leftChatData = [];
        $data = [];

        $usersChat = Chat::query()->where(function ($query) {
            $query->where([
                'sender_id' => auth()->id(),
            ])->orWhere([
                'receiver_id' => auth()->id(),
            ]);
        })
            ->with(['user', 'forusers', 'products'])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->groupBy('product_id')
            ->toArray();
        foreach ($usersChat as $asd) {
            foreach ($asd as $endasd) {
                if ($endasd['receiver_id'] == auth()->user()->id) {
                    $endasd['forusers'] = $endasd['user'];
                    $endasd['receiver_id'] = $endasd['sender_id'];
                    $endasd['sender_id'] = auth()->user()->id;
                }
                $send_blade[] = $endasd;
            }
        }

                if (isset($send_blade)){
                    $usersChat = collect($send_blade);
                    $usersChat = $usersChat->unique('product_id');
                }

        return view('chat.chatforusers', compact('usersChat', 'data', 'leftChatData'));
    }
}
