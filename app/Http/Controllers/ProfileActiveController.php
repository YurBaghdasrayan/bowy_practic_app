<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;

class ProfileActiveController extends Controller
{
    public function index()
    {
        $data = Chat::where('sender_id', auth()->user()->id)->orWhere('receiver_id',auth()->user()->id)->orderBy('id','DESC')->get();
        $unnlogeds = Product::with('user')->get();
        $products = Auth::user()->products()->with('image')->where('status', '=', true)->paginate(20);
        $no_ative_products = Auth::user()->products()->paginate(20)->where('status', '=', false);

        return view('profile-active-ads', compact('data','products', 'no_ative_products','unnlogeds'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return view('profile-active-ads');
    }
}
