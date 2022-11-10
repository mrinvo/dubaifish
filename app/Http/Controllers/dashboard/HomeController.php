<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Cleaning;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function home(){
        $orders = Order::all();
        $users = User::all();
        $products = Product::all();
        $categories = Category::all();
        $cleanings = Cleaning::all();

        return view('admin.index',compact('orders','users','products','categories','cleanings'));
    }
}
