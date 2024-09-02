<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    private $user;

    public function __contruct(){
        $this->user = auth()->guard('api')->user();
    }

    public function user(Request $request){
        return auth()->guard('api')->user();
    }

    public function getSettings(Request $request){
        $settings = [
            ['setting_key' =>'company_name',
                'setting_value' => 'Evian Voda'
                ]
        ];
        return response()->json($settings);
    }

    public function getCustomers(Request $request){

        $customers = [
            ['id'=> 1, "name"=> "james"]
        ];
        return response()->json($customers);
    }
}
