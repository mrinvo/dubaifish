<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\UserRequest;
use App\Models\Rule;
use App\Models\User;
use App\Models\Verfication;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function Register(UserRequest $request){
        $request->verified = 0;



        $user = User::create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'verified' => 0,
            'password' => bcrypt($request->password)

        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $otp = $this->generateOtp($request->phone);

        if($otp){
            $otp_msg = 'Verification code has been sent to your email';
        }else{
            $otp_msg = 'no code generated';
        }


        $response = [

            'Message' => 'registerd successfuly',
            'otp message' => $otp_msg,
            'data'=> $user,
            'token' => $token,

            'verify code' => $otp->otp_code,


        ];


        return response($response,201);


    }

    public function generateOtp($phone){
        $user = User::where('phone',$phone)->first();
        $code = Verfication::where('user_id',$user->id)->latest()->first();

        $current_time =Carbon::now();

        if($code && $current_time->isBefore($code->expire_ate)){

            return $code;

        }


        return Verfication::create([
            'user_id' => $user->id,
            'otp_code' => rand(0000, 9999),
            'expire_at' => Carbon::now()->addMinutes(10),
        ]);
    }

    public function Regenerate(Request $request){

        $user = User::where('id',$request->user()->id)->first();
        $code = $this->generateOtp($user->phone);

        if($code){
            return response('otp regenerated successfuly');
        }
    }

    public function verify(Request $request){

        $request->validate([
            'otp' => 'required|exists:verfications,otp_code'
        ]);


        $otp = Verfication::where('user_id',$request->user()->id)->where('otp_code',$request->otp)->latest()->first();
        $now = Carbon::now()->addHours(2);

        // if($otp && $now->isAfter($otp->expire_at)){

        //     return response('otp is not valid',422);

        // }

        if($otp){
            $user = User::where('id',$request->user()->id)->first();
            $user->verified = 1;
            $user->save();



            $response = [

                'Message' => 'your phone has been verified successfuly',
            ];

            return response($response,201);
        }else{
            return response('otp is not valid',422);
        }





    }

    public function rules(){
        $rules = Rule::find(1);

        $response = [
            'status' => true,
            'StatusCode' => 201,
            'message' => 'your rules and personal id key ',
            'data' => $rules,

        ];

        return response($response,201);
    }

    public function updaterules(Request $request){

        $request->validate([
            'key' => 'required|boolean',
            'rules' => 'required'

        ]);

        $data = Rule::find(1);

            $data->key = $request->key;
            $data->rules = $request->rules;



        $data->save();

        $response = [
            'status' => true,
            'StatusCode' => 201,
            'message' => 'your rules and personal id key are updated ',
            'data' => $data,

        ];

        return response($response,201);



    }

    public function login(Request $request){
        $fields = $request->validate([


            'user' => 'required',
            'password' => 'required|string|'

        ]);

        $user = User::where('email',$fields['user'])
        ->orWhere('phone',$fields['user'])
        ->first();
        //check email


        //check password
        if(!$user || !Hash::check($fields['password'], $user->password)){

            return response([
                'message' => 'wrong login information'
            ],401);

        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'message' => 'logged in successfuly',
            'user' => $user,
            'token' => $token
        ];

        return response($response,201);
    }


    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            'messege' =>'Logged out'
        ];
    }
    //





}
