<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Connection;

use Jenssegers\Mongodb\Validation;
use Illuminate\Support\Facades\Hash;
use App\Profile;
use App\User;
use MongoDB;
use DB;

class AuthController extends Controller
{
    //
    public function loginuser(Request $request)
    {

    	$this->validate($request, [
           'first_name' => 'required',
           'password' => 'required'
    	]);

    
		$name= $request->first_name;
    	$password = $request->password;

    	$user = Profile::find(['first_name' => $name, 'password' => $password]);

    	 if($name && $password ==  true ){
	 
	          $apikey = base64_encode(str_random(40));
	 
	         Profile::where('first_name', $request->input('first_name'))->update(['api_key' => "$apikey"]);;
	 
	          return response()->json(['status' => 'success','api_key' => $apikey]);
	 
	      }else{
	 
	          return response()->json(['status' => 'fail', 'auth'=>$password],401);
    }
}



    }

//     public function test(Request $request) {

//     	$name= $request->first_name;
//     	$password = $request->password;

//     	$user = Profile::find(['first_name' => $name, 'password' => $password]);

//     	 if($name && $password ==  true ){
	 
// 	          $apikey = base64_encode(str_random(40));
	 
// 	         Profile::where('first_name', $request->input('first_name'))->update(['api_key' => "$apikey"]);;
	 
// 	          return response()->json(['status' => 'success','api_key' => $apikey]);
	 
// 	      }else{
	 
// 	          return response()->json(['status' => 'fail', 'auth'=>$password],401);
//     }
// }
// }

