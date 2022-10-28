<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Models\Image;
use App\Models\Product;
use App\Models\Region;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\City;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function index()
    {

    }

    public function create(CreateProductRequest $request)
    {

    }

    public function store(CreateProductRequest $request)
    {
        $fileNames = array_keys($request->allFiles());

        $data = $request->except($fileNames);
        $fileNames = array_keys($request->allFiles());
        $data['user_id'] = Auth::user()->id;
        DB::beginTransaction();
        $product = Product::query()->create($data);
        if (count($fileNames)) {
            foreach ($fileNames as $fileName) {
                $image = $request->file($fileName);
                $destinationPath = 'public/uploads';
                $originalFile = time() . $image->getClientOriginalName();

                $image->storeAs($destinationPath, $originalFile);
                Image::create([
                    'product_id' => $product->id,
                    'image' => $originalFile
                ]);
            }
        }
        DB::commit();

        return response()->json([
            'success' => true,
            'message' => 'product was successfully created'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
