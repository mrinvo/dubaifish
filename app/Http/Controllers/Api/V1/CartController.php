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
            'user_id' => 'required|exists:users,id',

        ]);


        $item = Item::create($request->all());



    }
}
