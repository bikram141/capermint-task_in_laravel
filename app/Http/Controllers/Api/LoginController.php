<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\UserList;


class LoginController extends Controller
{
    public function register(Request $request){
        $validator=\Validator::make($request->all(), [
            'Fullname'=>'required',
            "email" =>"required|unique:users|email",
            'phone'=>'required|numeric|unique:users|digits:10',
            "password" => ['required','min:6'
       ],
   ]);
      if ($validator->fails())
       {
       return response()->json(['errors'=>$validator->errors()->all()]);
       }
     
        $user =UserList::create([
            'Fullname'=>$request->Fullname,
            'email' =>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ]);
        return response()->json(['message'=>'Signup successfully',
        'status_code'=>200
        ]);
         
     }


     public function login(Request $request){
        
        $response['status'] = 'false';
        $response['message'] = '';
        $response['data'] = (object)[];
        $validator=\Validator::make($request->all(), [
            "email" =>"required",
            "password" =>'required'
   ]);
 
   if ($validator->fails()) {
    $response['message'] = $validator->errors()->first();
    return response()->json($response);
}

$userSearch = ['email'=>$request->email];
$user = UserList::where($userSearch)->first();


if(!$user) {
    $response['message'] = 'User not found.';
    return response()->json($response);
}



   if(!$token = auth()->attempt($validator->validated()))
   {
        return response()->json([
            'success'=>false,
        'msg'=>"check your credentials",
        "status_code"=>500
    ]);
   }
   return $this->responseWithToken($token,$user);
}
    protected function responseWithToken($token,$user)
    {
     return response()->json([
        'message'=>'login succesfully',
         'success'=>true,
         'access_token'=>$token,
         'token_type'=>'Bearer',
         'expires_in'=>auth()->factory()->getTTL()*600000,
         'status_code'=>200,
       'data'=>$user
     ]);
    }
}
