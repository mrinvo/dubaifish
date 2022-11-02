<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\Debts;

class HomeController extends Controller
{
    //

    public function index(){
        $data = Home::find(1);
        $count =  Debts::all()->count();
        $response = [
            'status' => true,
            'StatusCode' => 201,
            'message' => '',
            'video url' => $data->video_url,
            'landing_page_url' => $data->landing_page_url,
            'number of subscribers' => $count,
        ];

        return $response;

    }


    public function store(Request $request){
        $data = Home::find(1);
        $data->video_url = $request->video_url;
        $data->landing_page_url = $request->landing_page_url;
        $data->save();


        $count =  Debts::all()->count();
        $response = [
            'status' => true,
            'StatusCode' => 201,
            'message' => 'تم التعديل  بنجاح',
            'video url' => $data->video_url,
            'landing_page_url' => $data->landing_page_url,
            'number of subscribers' => $count,
        ];

        return $response;





    }
}
