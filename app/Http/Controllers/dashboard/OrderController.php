<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function indexnew(){
        $data = Order::where('status','new')->orderBy('id','DESC')->get();
        return view('admin.orders.indexnew',compact('data'));


    }

    public function indexdelivered(){
        $data = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('admin.orders.indexdelivered',compact('data'));


    }

    public function details($id){
        $order = Order::findOrFail($id);


        return view("admin.orders.details",compact('order'));
    }

    public function status(Request $request){

        $order = Order::find($request->id);
        $order->update([
            'status' => $request->status,
        ]);

        return redirect()->back();

    }
}
