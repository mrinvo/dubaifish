<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Item;

class CartController extends Controller
{
    //

    public function userstore(Request $request)
    {
        # code...
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'cleaning_id' => 'required|exists:cleanings,id',
            'quantity' => 'required|numeric|max:200',

        ]);
        $request->user_id = $request->user()->id;

        $item = Item::create($request->all());

        $response = [
            'message' =>  trans('api.cartadded'),
            'data' => $item,


        ];

        return response($response,201);

    }

    public function userindex(Request $request)
    {
        # code...
        $items = Item::where('user_id',$request->user_id)->get();
        $response = [
            'message' =>  trans('api.fetch'),
            'data' => $items,


        ];

        return response($response,201);
    }
}
