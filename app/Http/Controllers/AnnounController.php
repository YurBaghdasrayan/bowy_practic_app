<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProductRequest;
use App\Models\Call;
use App\Models\CarsModel;
use App\Models\Categories;
use App\Models\City;
use App\Models\Image;
use App\Models\Product;
use App\Models\Region;
use App\Models\User;
use App\Models\Views;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnounController extends Controller
{
    public function index($status, $id)
    {
        $file = Image::where('product_id', $id)->get();

        $clientIP = request()->ip();

        $view = Views::where('product_id', $id)->where('ip_address', $clientIP)->get();
        $viewsCount = Views::where('product_id', $id)->count();
        $call_count = Call::where('product_id', $id)->count();


        $regions = Region::all();
        $cities = City::all();
        $cars_models = CarsModel::all();
        $views_posts = Product::all();

        $products = "";
        $similar_product = "";
        $car_model = "";

        if ($status == true) {
            $products = Auth::user()->products()->where('status', '=', true)->where('id', $id)->get();

        } else {
            $products = Auth::user()->products()->where('status', '=', false)->where('id', $id)->get();
        }

        $arr = $products->toArray();

        if ($arr != []) {
            $car_model = $products[0]->car_model;
        }

        if ($products != "" && $car_model != "") {

            $similar_product = Product::where('car_model', '=', $car_model)
                ->where('id', '!=', $products[0]->id)
                ->limit(3)
                ->get();
        }
        return view('announcement', compact('products','file', 'similar_product', 'regions', 'cities','call_count', 'cars_models', 'viewsCount'));

    }

    public function update(UpdateProductRequest $request)
    {

        $fileNames = array_keys($request->allFiles());
        $data = $request->except($fileNames);
        $fileNames = array_keys($request->allFiles());

        $data['user_id'] = Auth::user()->id;

        $data = $request->all();


        $update = Product::find($data['product_id']);
        $update->headline = $data['headline'];
        $update->address = $data['address'];
        $update->price = $data['price'];
        $update->car_model = $data['car_model'];
        $update->description = $data['description'];
        $update->body_type = $data['body_type'];
        $update->rudder = $data['rudder'];
        $update->year_of_issue = $data['year_of_issue'];
        $update->transmission = $data['transmission'];
        $update->save();
        if (count($fileNames)) {
            foreach ($fileNames as $fileName) {
                $image = $request->file($fileName);
                $destinationPath = 'public/uploads';
                $originalFile = time() . $image->getClientOriginalName();

                $image->storeAs($destinationPath, $originalFile);
                $dataUpdate = Image::create([
                     'product_id' => $update->id,
                     'image' => $originalFile
                 ]);
            }
        }
        return response()->json([
            'success' => true,
            'message' => $request->all(),
        ], 200);
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
    public function destroy($id)
    {
        $products = Image::where('id', $id)
            ->first()
            ->delete();
        return response()->json([
            'success' => true,
            'message' => 'image successfully deleted'
        ], 200);
    }
}
