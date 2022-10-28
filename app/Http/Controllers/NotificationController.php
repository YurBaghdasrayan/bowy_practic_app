<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Chat;

class NotificationController extends Controller
{
    public function index()
    {
        $data = Chat::where('sender_id', auth()->user()->id)->orWhere('receiver_id',auth()->user()->id)->orderBy('id','DESC')->get();
        $unnlogeds = Product::with('user')->get();
        return view('/notification',compact('data','unnlogeds'));
    }
}
