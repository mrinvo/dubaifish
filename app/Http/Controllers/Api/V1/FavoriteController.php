<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    //
    public function add(Request $request){

        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        $fav = Favorite::where('user_id',$request->user()->id)->where('product_id',$request->product_id)->first();

        if($fav){
            $response = [
                'message' => trans('api.notallowed'),

            ];

            return response($response,422);
        }else{
            $fav = Favorite::create([
                'product_id' => $request->product_id,
                'user_id' => $request->user()->id,
            ]);

            $response = [
                'message' => trans('api.stored'),
                'fav' => $fav,

            ];

            return response($response,201);
        }

    }

    public function delete($id){
        $fav = Favorite::findOrFail($id);
        if($fav){
            $fav->delete();

            $response = [
                'message' => trans('api.deleted'),

            ];

            return response($response,201);

        }else{
            return response('not exist',404);
        }
    }

    public function index(Request $request){
        $fav = Favorite::with('product')->where('user_id',$request->user()->id)->get();
        $response = [
            'message' => trans('api.fetch'),
            'data' => $fav,

        ];

        return response($response,201);



    }
}
