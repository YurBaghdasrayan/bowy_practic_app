<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Chat;

class PaidServicesController extends Controller
{
    public function index()
    {
        $data = Chat::where('sender_id', auth()->user()->id)->orWhere('receiver_id',auth()->user()->id)->orderBy('id','DESC')->get();
        $unnlogeds = Product::with('user')->get();
        return view('/paid-services',compact('data','unnlogeds'));
    }
}
