<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ApiProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\City;
use App\Models\Favourites;
use App\Models\Product;
use App\Models\Views;
use App\Models\Image;
use App\Models\CarsModel;
use http\Env\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;


class ProductUpdateController extends Controller
{
    public function update(ApiProductRequest $request, $id)
    {
        $fileNames = array_keys($request->allFiles());

        $data = $request->except($fileNames);
        $fileNames = array_keys($request->allFiles());

        $data['user_id'] = Auth::user()->id;

        $data = $request->all();


        $product = Product::where('id', '=', $id)->first();
        if ($product->user_id != \auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'You cant update this product',
            ], 403);
        }
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
                $images = $request->file($fileName);
                $test = [];
                foreach ($images as $image) {

                    $destinationPath = 'public/uploads';
                    $originalFile = time() . $image->getClientOriginalName();
                    $image->storeAs($destinationPath, $originalFile);

                    $test[] = $image->getPathname();
                    Image::create([
                        'product_id' => $product->id,
                        'image' => $originalFile
                    ]);
                }
            }
        }
        if ($update) {
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
        if (Product::query()->where('id', $id)->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Product was successfully deleted'
            ], 200);
        }
    }

    public function delete($id)
    {
        $img = Image::find($id);

        if ($img) {
            $user_product = Product::where('user_id', auth()->user()->id)
                ->with('image')
                ->get();

            if ($user_product) {

                $products = Image::where([
                    'id' => $id
                ])
                    ->first()
                    ->delete();
                return response()->json([
                    'success' => true,
                    'message' => 'image successfully deleted'
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'image not found'
                ], 404);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'image not found'
            ], 404);
        }
    }
}
