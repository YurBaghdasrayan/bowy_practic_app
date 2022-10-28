<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function getCityByRegionId(Request $request)
    {
//        dd($request);
        $region_id = $request->region_data;
        $regions = City::where('region_id', '=', $region_id)->get();
        return response()->json(['city_data' => $regions]);
    }
}
