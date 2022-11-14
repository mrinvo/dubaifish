<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

/////////////////////////////////////////////// user order //////////////////////////

    public function userstore(Request $request){

        $request->validate([

            'payment_id' => 'required|exists:payments,id',
            'address_id' => 'required|exists:addresses,id',
            'customer_name' => 'required|max:250',
            'customer_phone' => 'required|numeric',
            'total_price' => 'required|numeric',
        ]);

        $user_id = $request->user()->id;

        $order = Order::create([
            'user_id' => $user_id,
            'payment_id' => $request->payment_id,
            'address_id' => $request->address_id,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'total_price' => $request->total_price,
        ]);


        $items = Item::where('user_id',$user_id)->get();

        foreach($items as $item){
            $item->update([
                'order_id' => $order->id,
            ]);
        }

        $response = [
            'message' => trans('api.orderstored'),
            'order items' => $items,
        ];
        $stat = 201;


        return response($response,$stat);


    }


    public function myorders(Request $request){
        $order = Order::with('items')->where('user_id',$request->user()->id)->get();
        $response = [
            'message' => trans('api.fetch'),
            'order items' => $order,
        ];
        $stat = 201;


        return response($response,$stat);
    }

    ///////////////////////////////////////////// guest order /////////////////////


    public function gueststore(Request $request){

        $request->validate([

            'uuid' => 'required',
            'payment_id' => 'required|exists:payments,id',
            'address' => 'required|max:250',
            'customer_name' => 'required|max:250',
            'customer_phone' => 'required|numeric',
            'total_price' => 'required|numeric',

        ]);



        $order = Order::create([
            'uuid' => $request->uuid,
            'payment_id' => $request->payment_id,
            'address' => $request->address,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'total_price' => $request->total_price,
            'lat' => $request->lat,
            'long' => $request->long,
        ]);


        $items = Item::where('uuid',$request->uuid)->where('order_id',null)->get();

        foreach($items as $item){
            $item->update([
                'order_id' => $order->id,
            ]);
        }

        $response = [
            'message' => trans('api.orderstored'),
            'order items' => $items,
        ];
        $stat = 201;


        return response($response,$stat);


    }


    public function guestorders(Request $request){
        $order = Order::with('items')->where('uuid',$request->uuid)->get();
        $response = [
            'message' => trans('api.fetch'),
            'order items' => $order,
        ];
        $stat = 201;


        return response($response,$stat);
    }
}
