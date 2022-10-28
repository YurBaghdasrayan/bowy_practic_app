<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\CarsModel;
use App\Models\City;
use App\Models\Image;
use App\Models\Product;
use App\Models\Region;
use App\Models\User;
use App\Models\Views;
use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnloggedUserController extends Controller
{
    public function index($status, $id)
    {

        $data = Chat::where('product_id', $id)
        ->where(function ($query) use ($id){
            $query->where([
                'sender_id' => auth()->id(),
            ])
            ->orWhere([
                'receiver_id' => auth()->id(),
            ]);
        })
        ->orderBy('id', 'ASC')
        ->get();

        $files = Image::where('product_id', $id)->get();

        $clientIP = request()->ip();

        $view = Views::where('product_id', $id)->where('ip_address', $clientIP)->simplePaginate(2);

        if ($view->count() < 1) {
            Views::create(['product_id' => $id, 'ip_address' => $clientIP]);
        }

        $viewsCount = Views::where('product_id', $id)->count();
        $call_count = Call::where('product_id', $id)->count();
        $unnloged = Product::with(['image', 'user'])
            ->where('user_id', "!=", auth()->id())
            ->where('id', $id)
            ->first();

        $unnlogeds = Product::with(['image', 'user'])
            ->where('user_id', auth()->id())
            ->where('id', $id)
            ->first();

        $products = "";
        $similar_product = "";
        $car_model = "";

        if ($status == true) {
            $products = Product::where('status', '=', true)->where('id', $id)->get();
        } else {
            $products = Product::where('status', '=', false)->where('id', $id)->get();
        }

        $arr = $products->toArray();

        if ($arr != []) {
            $car_model = $products[0]->car_model;
        }

        if ($products != "" && $car_model != "") {

            $similar_product = Product::where('car_model', '=', $car_model)->where('status', true)
                ->where('id', '!=', $products[0]->id)
                ->simplePaginate(3);
        }
        return view('/announcement-unlogged-user', compact('data','unnlogeds','unnloged', 'viewsCount', 'similar_product', 'call_count', 'files'));
    }

    public function indexCalls($id)
    {
        $clientIP = request()->ip();

        $calls = Call::where('product_id', $id)->where('ip_address', $clientIP)->get();

        if ($calls->count() < 1) {
            Call::create(['product_id' => $id, 'ip_address' => $clientIP]);
        }

        $callsCount = Call::where('product_id', $id)->count();

        $call_phone_data = Product::where('id', $id)->get();
        $product_user_id = $call_phone_data[0]->user_id;
        $phoned_user = User::where('id', '=', $product_user_id)->get();
        $phone_number = $phoned_user[0]->number;

        return response()->json(['callsCount' => $callsCount, 'phone_number' => $phone_number]);
    }
}

