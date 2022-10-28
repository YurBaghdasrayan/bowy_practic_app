<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\City;
use App\Models\Image;
use App\Models\Product;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        if (auth()->user()) {
            $product = Product::with('image')->orderBy('id', 'DESC')->where('status', true)->where('user_id', '!=', auth()->user()->id)->paginate(20);
        } else {
            $product = Product::with('image')->orderBy('id', 'DESC')->where('status', true)->paginate(20);
        }

        $regions = Region::all();
        $cities = City::all();
        return view('/home', compact('categories', 'product', 'regions', 'cities'));
    }

    public function homeApi()
    {
        $categories = Categories::all();
        $regions = Region::all();
        $cities = City::all();

        return response()->json([$categories, $regions, $cities]);
    }

}
