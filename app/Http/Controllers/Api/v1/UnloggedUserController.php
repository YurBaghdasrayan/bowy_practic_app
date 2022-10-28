<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class UnloggedUserController extends Controller
{
    public function index($id)
    {
        $unnlogeds = User::where('id', $id)
            ->with('products.image')->get();

        return response()->json($unnlogeds);
    }
}
