<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function userstore(Request $request){

        $user_id = $request->user()->id;

    }
}