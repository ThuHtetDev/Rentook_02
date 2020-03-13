<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller as Controller;
use Validator;

class BaseController extends Controller
{
    //
    public function sendRequest($data,$msg){
        $response  = [
            'success' => true,
            'data'   => $data,
            'message' => $msg,
        ];
        return response()->json($response, 200);
    }

    public function errorRequest($error,$errorMessages = []){
        $response = [
            'success' => false,
            'message' => $error
        ];
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response,404);
    }
    public function notFoundError(){
        $output = [
            'message' => "Sorry, Not Found Here"
        ];
        return response()->json($output,404);
    }
    public function giveMsg($msg,$code){
        $output = [
            'message' => $msg
        ];
        return response()->json($output,$code);
    }
    public function apiValidation($resquest,$array){
        $validator = Validator::make($request->all(),$array);
        if($validator->fails()){
            return $this->errorRequest('Validation Error.', $validator->errors());       
        }
    }
    public function unknownError(){
        $output = [
            'message' => 'I dont know this error'
        ];
        return response()->json($output,520);
    }
}
