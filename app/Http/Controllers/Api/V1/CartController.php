<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cleaning;
use App\Models\Item;
use App\Models\Product;

class CartController extends Controller
{
    //user

    public function userstore(Request $request)
    {
        # code...
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'cleaning_id' => 'required|exists:cleanings,id',
            'quantity' => 'required|numeric|max:200',

        ]);

        $product = Product::findOrFail($request->product_id);

            if($product->discounted_price != null){
                $price = $product->discounted_price;
            }else{
                $price = $product->price;
            }

            $clean = Cleaning::findOrFail($request->cleaning_id);


        $item = Item::create([
            'product_id' => $request->product_id,
            'cleaning_id' => $request->cleaning_id,
            'product_name_en' => $product->name_en,
            'product_name_ar' => $product->name_ar,
            'cleaning_name_en' => $clean->name_en,
            'cleaning_name_ar' => $clean->name_ar,
            'product_price' => $price,
            'cleaning name' => $clean->name,
            'quantity' => $request->quantity,
            'user_id' => $request->user()->id,
        ]);

        $response = [
            'message' =>  trans('api.cartadded'),
            'data' => $item,


        ];

        return response($response,201);

    }

    public function userindex(Request $request)
    {
        # code...


        $items = Item::select([

            'product_id',
            'cleaning_id',
            'product_name_'.app()->getLocale().' as name',
            'cleaning_name_'.app()->getLocale().' as cleaning_name',
            'product_price',
            'quantity',
            'user_id',

        ])->where('user_id',$request->user()->id)->get();
        $response = [
            'message' =>  trans('api.fetch'),
            'data' => $items,


        ];

        return response($response,201);
    }

    public function userupdate(Request $request,$id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'cleaning_id' => 'required|exists:cleanings,id',
            'quantity' => 'required|numeric|max:200',

        ]);
        # code...
        $item = Item::where('id',$id)->first();

        $product = Product::findOrFail($request->product_id);

        if($product->discounted_price != null){
            $price = $product->discounted_price;
        }else{
            $price = $product->price;
        }

        $clean = Cleaning::findOrFail($request->cleaning_id);

        $item->update([
            'product_id' => $request->product_id,
            'cleaning_id' => $request->cleaning_id,
            'product_name_en' => $product->name_en,
            'product_name_ar' => $product->name_ar,
            'cleaning_name_en' => $clean->name_en,
            'cleaning_name_ar' => $clean->name_ar,
            'product_price' => $price,
            'cleaning name' => $clean->name,
            'quantity' => $request->quantity,
            'user_id' => $request->user()->id,

        ]);

        $response = [
            'message' =>  trans('api.stored'),
            'data' => $item,


        ];

        return response($response,201);
    }

    public function userdelete($id)
    {
        # code...

        $item = Item::findOrFail($id);
        if($item){
            $item->delete();
            $response = [
               'message' => trans('api.deleted'),

            ];
            $stat = 201;
        }else{
            $response = [
                'message' => trans('api.notfound'),


            ];
            $stat = 201;
            }

            return response($response,$stat);


    }

    // guest

    public function gueststore(Request $request)
    {
        # code...
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'cleaning_id' => 'required|exists:cleanings,id',
            'quantity' => 'required|numeric|max:200',
            'uuid' => 'required:numeric',

        ]);

        $product = Product::findOrFail($request->product_id);

            if($product->discounted_price != null){
                $price = $product->discounted_price;
            }else{
                $price = $product->price;
            }

            $clean = Cleaning::findOrFail($request->cleaning_id);


        $item = Item::create([
            'product_id' => $request->product_id,
            'cleaning_id' => $request->cleaning_id,
            'product_name_en' => $product->name_en,
            'product_name_ar' => $product->name_ar,
            'cleaning_name_en' => $clean->name_en,
            'cleaning_name_ar' => $clean->name_ar,
            'product_price' => $price,
            'cleaning name' => $clean->name,
            'quantity' => $request->quantity,
            'uuid' => $request->uuid,
        ]);

        $response = [
            'message' =>  trans('api.cartadded'),
            'data' => $item,


        ];

        return response($response,201);

    }

    public function guestindex(Request $request)
    {
        # code...


        $items = Item::select([

            'product_id',
            'cleaning_id',
            'product_name_'.app()->getLocale().' as name',
            'cleaning_name_'.app()->getLocale().' as cleaning_name',
            'product_price',
            'quantity',
            'uuid',

        ])->where('uuid',$request->uuid)->get();
        $response = [
            'message' =>  trans('api.fetch'),
            'data' => $items,


        ];

        return response($response,201);
    }

    public function guestupdate(Request $request,$id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'cleaning_id' => 'required|exists:cleanings,id',
            'quantity' => 'required|numeric|max:200',
            'uuid' => 'required|numeric',

        ]);
        # code...
        $item = Item::where('id',$id)->first();

        $product = Product::findOrFail($request->product_id);

        if($product->discounted_price != null){
            $price = $product->discounted_price;
        }else{
            $price = $product->price;
        }

        $clean = Cleaning::findOrFail($request->cleaning_id);

        $item->update([
            'product_id' => $request->product_id,
            'cleaning_id' => $request->cleaning_id,
            'product_name_en' => $product->name_en,
            'product_name_ar' => $product->name_ar,
            'cleaning_name_en' => $clean->name_en,
            'cleaning_name_ar' => $clean->name_ar,
            'product_price' => $price,
            'cleaning name' => $clean->name,
            'quantity' => $request->quantity,
            'uuid' => $request->uuid,

        ]);

        $response = [
            'message' =>  trans('api.stored'),
            'data' => $item,


        ];

        return response($response,201);
    }

    public function guestdelete(Request $request,$id)
    {
        # code...

        $item = Item::findOrFail($id);

        if($item && $item->uuid == $request->uuid){
            $item->delete();
            $response = [
               'message' => trans('api.deleted'),

            ];
            $stat = 201;
        }else{
            $response = [
                'message' => trans('api.notfound'),


            ];
            $stat = 201;
            }

            return response($response,$stat);


    }


}
