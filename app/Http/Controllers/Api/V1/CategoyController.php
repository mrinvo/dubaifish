<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoyController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|max:150',
            'name_ar' => 'required|max:150',
            'des_en' => 'required|max:150',
            'des_en' => 'required|max:150',
        ]);
        $cat = Category::create($request->all());
        $response = [
            'message' => ' category created successfuly',
            'data' => $cat,

        ];

        return response($response,201);
        //
    }

    public function index()
    {
        $categories = Category::select(
            'id',
            'name_'.app()->getLocale().' as name',
            'des_'.app()->getLocale().' as description',
            'img',

            )->get();
            $response = [
                'message' => count($categories) . ' categories retuned  successfuly',
                'count' => count($categories) ,
                'data' => $categories,

            ];

            return response($response,201);

        //
    }
}
