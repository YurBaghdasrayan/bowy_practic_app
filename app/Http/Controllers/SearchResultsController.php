<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchResultsController extends Controller
{
    public function index(Request $request)
    {

        $sql = array(
            'category_id' => $request->category,
        );

        if ($request->region) {
            $sql = array(
                'category_id' => $request->category,
                'region' => $request->region,
            );
        }

        if ($request->city) {
            $sql = array(
                'category_id' => $request->category,
                'region' => $request->region,
                'city' => $request->city,
            );
        }
        if (auth()->user()) {
            $products = Product::where($sql)->where('status', true)->with('image')
                ->where('user_id', '!=', auth()->user()->id)->paginate(19);
            return view('search-results', compact('products'));
        } else {
            $products = Product::where($sql)->where('status', true)->paginate(19);
            return view('search-results', compact("products"));
        }

    }

    public function getCategories($id)
    {
        $products = Product::where('category_id', $id)
            ->where('status', true)->with('image')->paginate(19);

        return view('search-results', compact('products'));
    }
}
