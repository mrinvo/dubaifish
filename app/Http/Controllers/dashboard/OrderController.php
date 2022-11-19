<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function indexnew(){
        $data = Order::where('status','new')->get();
        return view('admin.orders.indexnew',compact('data'));


    }
}
