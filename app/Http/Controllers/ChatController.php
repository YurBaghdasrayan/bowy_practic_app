<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use App\Models\Product;

class ChatController extends Controller
{
    public function index($id)
    {
        $unnlogeds = Product::with('user')->with('image')->get();
        $data = Chat::where(['sender_id' => auth()->user()->id, 'product_id' => $id])->orWhere(['receiver_id' => auth()->user()->id, 'product_id' => $id])->orderBy('id', 'ASC')->get()->groupBy('product_id');

        return view('includes_file.chat', compact('data', 'unnlogeds'));
    }

    public function getUsersData(Request $request, $id, $receiver_id)
    {
        $data = Chat::where(function ($query) use ($id, $receiver_id) {
            $query->where([
                'sender_id' => auth()->id()
            ])->where('product_id', $id)->where('receiver_id', $receiver_id)
                ->orWhere([
                    'receiver_id' => auth()->id(),
                ])->where(['product_id' => $id,])->where('sender_id', $receiver_id);
        })
            ->with(['user', 'forusers', 'products']

            )
            ->orderBy('id', 'ASC')
//            ->groupBy('product_idQ')
            ->get();


        $get_views = Chat::where(['review' => 1, 'product_id' => $id, 'receiver_id' => \auth()->id()])
            ->get();


        $ids = [];
        foreach ($get_views as $review_id){
            array_push($ids,$review_id->id);
            $update_views = Chat::where(['id' => $review_id->id])
                ->update(['review' => 0]);
        }


//        dd($get_views);


//        if ($review) {
//            dd(10);
//        } else {
//            dd(7);
//        }

//        return response()->json([$id, $receiver_id]);
//
//        $data = Chat::where('product_id', $id)
//            ->where(function ($query) use ($id) {
//                $query->where([
//                    'sender_id' => auth()->id(),
//                ])->orWhere([
//                    'receiver_id' => auth()->id(),
//                ]);
//            })
//
//            ->orderBy('id', 'ASC')
//            ->get();

        $user = [];
        foreach ($data as $datum) {
            $user[] = User::where('id', $datum->receiver_id)->with('products')->get();
        }

        if (isset($data[0])) {

            if ($data[0]->receiver_id == auth()->user()->id) {
                $reciver_id = $data[0]->sender_id;
            } else {
                $reciver_id = $data[0]->receiver_id;
            }

            return response([
                'success' => true,
                'sender' => auth()->user(),
                'message' => "chat between two users",
                'data' => $data,
                "receiver_user_data" => $user,
                "receiver_id" => $reciver_id
            ], 200);

        } else {

            $chat_owner_id = 0;
            $product_data = Product::where('id', $id)->get();

            if (isset($product_data[0])) {
                $chat_owner_id = $product_data[0]->user_id;
            }


            return response()->json([
                'success' => false,
                "message" => "this product was not found",
                "receiver_id" => $chat_owner_id
            ], 404);

        }
    }

    public function RightSiteUsers()
    {
        $usersChat = Chat::query()->where(function ($query) {
            $query->where([
                'sender_id' => auth()->id(),
            ])->orWhere([
                'receiver_id' => auth()->id(),
            ]);

        })
            ->with(['user', 'forusers', 'products'])
            ->orderByDesc('created_at')
            ->get()
            ->groupBy('product_id')
            ->toArray();

        $right_side_data = [];

        foreach ($usersChat as $item) {

            $review_count = collect($item);
            $user_name = auth()->id() == $item[0]['forusers']['id'] ? $item[0]['user']['name'] : $item[0]['forusers']['name'];
            $receiver_id = auth()->id() == $item[0]['forusers']['id'] ? $item[0]['user']['id'] : $item[0]['forusers']['id'];
            $product_id = $item[0]['products']['id'];
            $user_image = auth()->id() == $item[0]['forusers']['id'] ? $item[0]['user']['image'] : $item[0]['forusers']['image'];
            $product_headline = $item[0]['products']['headline'];
            $product_price = $item[0]['products']['price'];
            $image = $item[0]['file'];
            $review = $review_count->sum('review');

            $messages = $item[0]["messages"];

            $right_side_data[] = [
                'user_name' => $user_name,
                'product_id' => $product_id,
                'user_image' => $user_image,
                'product_headline' => $product_headline,
                'product_price' => $product_price,
                'messages' => $messages,
                'image' => $image,
                'receiver_id' => $receiver_id,
                'review' => $review
            ];
        }

        return response()->json([
            'success' => true,
            'userschatdata' => $right_side_data,
        ], 200);
    }

    public function store(Request $request)
    {
        if ($request->receiver_id == auth()->user()->id) {
            $sender_id = auth()->user()->id;
            $receiver_id = $request->sender_id;

        } else {
            $sender_id = auth()->user()->id;
            $receiver_id = $request->receiver_id;
        }

        $fileNames = array_keys($request->allFiles());
        $data = $request->except($fileNames);
        $fileNames = array_keys($request->allFiles());
        if (count($fileNames)) {
            foreach ($fileNames as $fileName) {
                $image = $request->file($fileName);
                $destinationPath = 'public/uploads';
                $originalFile = time() . $image->getClientOriginalName();
                $image->storeAs($destinationPath, $originalFile);
                $data = [
                    'sender_id' => $sender_id,
                    'receiver_id' => $receiver_id,
                    'product_id' => $request->product_id,
                    'messages' => $request->messages,
                    'notification' => 0,
                    'file' => $originalFile,
                    'review' => 1
                ];
            }
        } else {
            $data = [
                'sender_id' => $sender_id,
                'receiver_id' => $receiver_id,
                'product_id' => $request->product_id,
                'messages' => $request->messages,
                'notification' => 0,
                'review' => 1
            ];
        }
        $chat = Chat::create($data);
        if ($chat) {
            $chat_data = User::where("id", $request->receiver_id)->get();
            return response()->json([
                "success" => true,
                'receiver_id' => $receiver_id,
                "message" => "your message has been successfully sent",
                "data" => [
                    "message" => $chat,
                    "receiver" => $chat_data,
                    "sender" => auth()->user()
                ]
            ], 200);
        } else {
            return response()->json([
                'success' => false
            ], 422);
        }
    }

    public function sendFile(Request $request)
    {

        if ($request->receiver_id == auth()->user()->id) {
            $sender_id = auth()->user()->id;
            $receiver_id = $request->sender_id;

        } else {
            $sender_id = auth()->user()->id;
            $receiver_id = $request->receiver_id;
        }

        $fileNames = array_keys($request->allFiles());
        $data = $request->except($fileNames);

        if (count($fileNames)) {

            foreach ($fileNames as $fileName) {

                $image = $request->file($fileName);
                $destinationPath = 'public/uploads';
                $originalFile = time() . $image->getClientOriginalName();
                $image->storeAs($destinationPath, $originalFile);

                $data = [
                    'receiver_id' => $receiver_id,
                    'product_id' => $request->product_id,
                    'file' => $originalFile,
                    'sender_id' => $sender_id,
                ];

            }

            $chat = Chat::create($data);

            if ($chat) {
                $chat_data = User::where("id", $request->receiver_id)->get();
                return response()->json([
                    "success" => true,
                    'receiver_id' => $receiver_id,
                    "message" => "your message has been successfully sent",
                    "data" => [
                        "message" => $chat,
                        "receiver" => $chat_data,
                        "sender_id" => auth()->user()
                    ]
                ], 200);
            } else {
                return response()->json([
                    'success' => false
                ], 422);
            }
        }
    }

    public function storeApi(Request $request)
    {
        $fileNames = array_keys($request->allFiles());
        $data = $request->except($fileNames);
        $fileNames = array_keys($request->allFiles());
        if (count($fileNames)) {
            foreach ($fileNames as $fileName) {
                $image = $request->file($fileName);
                $destinationPath = 'public/uploads';
                $originalFile = time() . $image->getClientOriginalName();
                $data = [
                    'sender_id' => auth()->user()->id,
                    'receiver_id' => $request->receiver_id,
                    'product_id' => $request->product_id,
                    'messages' => $request->messages,
                    'notification' => 0,
                    'file' => $originalFile,
                ];
            }
        } else {
            $data = [
                'sender_id' => auth()->user()->id,
                'receiver_id' => $request->receiver_id,
                'product_id' => $request->product_id,
                'messages' => $request->messages,
                'notification' => 0,
            ];
        }

        $chat = Chat::create($data);

        if ($chat) {

            $chat_data = Chat::where("receiver_id", $request->receiver_id)->where("sender_id", auth()->user()->id)->where("product_id", $request->product_id)->get();

            foreach ($chat_data as $chat_datum)
                if ($chat_datum->receiver_id == auth()->id()) {
                    $chat_datum->receiver_id = $chat_data->sender_id;
                    $chat_datum->sender_id = auth()->id();
                }
            return response()->json([
                "success" => true,
                "message" => "your message has been successfully sent",
                "data" => [
                    "message" => $chat,
                    "sender" => auth()->user(),
                    "receiver" => $chat_datum,
                    'receiver_id' => $chat_datum->receiver_id,
                ]

            ]);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'something was wrong'
            ], 422);
        }
    }
}
