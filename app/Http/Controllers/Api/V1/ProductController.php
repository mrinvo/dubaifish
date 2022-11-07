<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|max:150',
            'name_ar'=> 'required|max:150',
            'description_en'=> 'max:500',
            'description_ar'=> 'max:500',
            'price'=> 'required',
            'have_discount'=> 'boolean',
            'discounted_price'=> 'numeric',
            'img' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'category_id'=> 'required|exists:categories,id',
        ]);


        $image_path = $request->file('img')->store('api/products','public');




        $product = Product::create([
            'name_en' => $request->name_en,
            'name_ar'=> $request->name_ar,
            'description_en'=> $request->description_en,
            'description_ar'=> $request->description_ar,
            'price'=> $request->price,
            'have_discount'=> $request->have_discount,
            'discounted_price'=> $request->discounted_price,
            'img' => asset('storage/'.$image_path),

            'category_id'=> $request->category_id,

        ]);
        $response = [
            'message' => trans('api.stored'),
            'data' => $product,

        ];

        return response($response,201);
        //
    }

    public function index()
    {
        $products = Product::select(
            'id',
            'name_'.app()->getLocale().' as name',
            'description_'.app()->getLocale().' as description',
            'price',
            'have_discount',
            'discounted_price',
            'category_id',
            'img',

            )->get();
            $response = [
                'message' =>  trans('api.fetch'),
                'count' => count($products) ,
                'data' => $products,

            ];

            return response($response,201);

        //
    }

    public function show($id){
        $product = Product::select(
            'id',
            'name_'.app()->getLocale().' as name',
            'description_'.app()->getLocale().' as description',
            'price',
            'have_discount',
            'discounted_price',
            'category_id',
            'img',

            )->where('id',$id)->first();
        if($product){
            $response = [
                'message' =>  trans('api.fetch'),
                'data' => $product,
            ];
            $stat = 201;
        }else{
            $response = [
                'message' =>  trans('api.notfound'),
                'data' => $product,
            ];
            $stat = 201;
            }

            return response($response,$stat);


    }

    public function CategoriesProduct($cat_d){
        $product = Product::select(
            'id',
            'name_'.app()->getLocale().' as name',
            'description_'.app()->getLocale().' as description',
            'price',
            'have_discount',
            'discounted_price',
            'category_id',
            'img',

            )->where('category_id',$cat_d)->get();
        if($product){
            $response = [
                'message' =>  trans('api.fetch'),
                'count' => count($product) ,
                'data' => $product,
            ];
            $stat = 201;
        }else{
            $response = [
                'message' =>  trans('api.notfound'),
                'count' => count($product) ,
                'data' => $product,
            ];
            $stat = 201;
            }

            return response($response,$stat);

    }


}
