<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Favourites;
use App\Models\Product;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouritesController extends Controller
{
    public function index()
    {
        $data = Chat::where('sender_id', auth()->user()->id)->orWhere('receiver_id',auth()->user()->id)->orderBy('id','DESC')->get();
        $unnlogeds = Product::with('user')->get();
        $products = Product::whereHas('favourites', function ($query) {
            $query->where('user_id', '=', \auth()->id());
        })->with('image')->get();
        return view('/favourites', compact('data','products','unnlogeds'));
        
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $product_id = $data['product_id'];
        Favourites::create([
            'user_id' => \auth()->id(),
            'product_id' => $product_id
        ]);
        return response()->json('success');
    }

    public function destroy($id)
    {
        $products = Product::where('id', $id)
            ->first()
            ->favourites()
            ->where('user_id', \auth()->id())
            ->delete();
        return response()->json([
            'success' => true,
            'message' => 'successfully deleted'
        ], 200);
    }

    public function destroyFavourite($id)
    {
        $products = Product::where('id', $id)
            ->first()
            ->favourites()
            ->where('user_id', \auth()->id())
            ->delete();
        return response()->json([
            'success' => true,
            'message' => 'successfully deletedsss'
        ], 200);
    }
}
