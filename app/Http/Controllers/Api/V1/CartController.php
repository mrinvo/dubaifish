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

        $item = Item::create([
            'product_id' => $request->product_id,
            'cleaning_id' => $request->cleaning_id,
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
        $items = Item::where('user_id',$request->user()->id)->get();
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

        $item->update([
            'product_id' => $request->product_id,
            'cleaning_id' => $request->cleaning_id,
            'quantity' => $request->quantity,


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
}
