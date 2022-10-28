<?php

namespace App\Http\Controllers;

use App\Models\CarsModel;
use App\Models\Categories;
use App\Models\Region;
use App\Models\City;
use App\Models\Product;


class ProfilePlaceController extends Controller
{
    public function index()
    {
        $unnlogeds = Product::with('user')->get();
        $categories = Categories::all();
        $regions = Region::all();
        $cities = City::all();
        $cars_models = CarsModel::all();
        return view('/profile-place-anad', compact('categories', 'regions', 'cities','cars_models','unnlogeds'));
    }
}
