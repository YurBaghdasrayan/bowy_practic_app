<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\City;
use App\Models\Favourites;
use App\Models\Product;
use App\Models\Views;
use App\Models\Image;
use App\Models\CarsModel;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Api\ApiProductsRequest;


class  ProductController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function allProducts()
    {
        //  $allProducts = Product::with('image','category')->orderBy('id', 'DESC')->get();
        $allProducts = Product::leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('regions', 'products.region', '=', 'regions.id')
            ->leftJoin('cities', 'products.city', '=', 'cities.id')
            ->orderBy('id', 'desc')->with("image")
            ->get(array('products.*', 'categories.name as category_name', 'regions.name as region_name', 'cities.name as city_name'));
        return response()->json([
            "product_data" => $allProducts,
            'product_url' => "http://bowy.ru/storage/uploads/"
        ]);
    }

    public function city()
    {
        $car_model = CarsModel::all();
        $city = City::all();
        return response()->json([$car_model, $city]);

    }

    public function index()
    {
        auth()->user()->products = Product::leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->leftJoin('regions', 'products.region', '=', 'regions.id')
            ->leftJoin('cities', 'products.city', '=', 'cities.id')
            ->leftJoin('images', 'products.id', '=', 'images.id')
            ->orderBy('id', 'DESC')
            ->get(array('products.*', 'images.image', 'categories.name as category_name', 'regions.name as region_name', 'cities.name as city_name'));

        return response()->json([
            'success' => 'true',
            'message' => 'All products',
            'data' => auth()->user()->products,
        ], 200);

    }


    public function create(Request $request)
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ApiProductRequest $request)
    {

//        return response()->json($_FILES);

        $fileNames = array_keys($request->allFiles());
        $data = $request->except($fileNames);
        $fileNames = array_keys($request->allFiles());
        $data['user_id'] = Auth::user()->id;
        DB::beginTransaction();
        $product = Product::query()->create($data);
        if (count($fileNames)) {

            foreach ($fileNames as $fileName) {
                $images = $request->file($fileName);
                $test = [];
                foreach ($images as $image) {

                    $destinationPath = 'public/uploads';
                    $originalFile = time() . $image->getClientOriginalName();
                    $image->storeAs($destinationPath, $originalFile);

                    $test[] =  $image->getPathname();
                    Image::create([
                        'product_id' => $product->id,
                        'image' => $originalFile
                    ]);
                }
            }
        }

        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'product was successfully created'
        ], 201);
    }


    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'this is product',
            'products' => new ProductResource(Product::find($id)),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ApiProductRequest $request, $id)
    {
        $fileNames = array_keys($request->allFiles());
        $data = $request->except($fileNames);
        $fileNames = array_keys($request->allFiles());


        $data = $request->all();

        $data['image'] = $originalFile;

        $product = Product::where('id', '=', $id)->first();
        if ($product->user_id != \auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You cant update this image',
            ], 403);
        }
        $update = [
            'headline' => $request->headline,
            'address' => $request->address,
            'price' => $request->price,
            'car_model' => $request->car_model,
            'description' => $request->description,
            'body_type' => $request->body_type,
            'rudder' => $request->rudder,
            'year_of_issue' => $request->year_of_issue,
            'transmission' => $request->transmission,
            'image' => $request->image
        ];

        $productUpdated = $product->update($update);
        $product->save();

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

        if ($productUpdated) {
            return response()->json([
                'success' => true,
                'message' => 'update success',
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'incorrect data',
            ], 422);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $data = Product::query()->where('id', $id)->get();
        if ($data) {
            $user = Product::where('id', '=', $id)->update(['status' => '0']);
            return response()->json([
                'success' => true,
                'message' => 'Product was successfully created inactive'
            ], 200);
        }
    }

    public function storeFavourite(Request $request)
    {
        $data = $request->all();
        $product_id = $request->product_id;
        Favourites::create([
            'user_id' => \auth()->id(),
            'product_id' => $product_id
        ]);
        return response()->json('success');
    }

    public function destroyFavourite($id)
    {
        $products = Product::where('id', $id)->first();
        if ($products) {
            $products
                ->favourites()
                ->where('user_id', \auth()->id())
                ->delete();
        }
        return response()->json([
            'success' => true,
            'message' => 'successfully deletedsss'
        ], 200);
    }

    public function indexFavourite()
    {
        $products = Product::with('image')->whereHas('favourites', function ($query) {
            $query->where('user_id', '=', \auth()->id());
        })->get();
        return response()->json([
            $products,
            'status' => true,
            'message' => 'user favourites posts'
        ]);
    }

    public function searchResultIndex(Request $request)
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
        $search_results = Product::where($sql)->get();

        return response()->json([$search_results]);
    }

    public function getCategories($id)
    {
        $search_results = Product::where('category_id', $id)->get();

        return response()->json([$search_results]);
    }
}
