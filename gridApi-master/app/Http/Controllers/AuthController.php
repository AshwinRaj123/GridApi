<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Jenssegers\Mongodb\Connection;


use Illuminate\Support\Facades\Hash;
use App\Profile;
use App\User;
use MongoDB;

class AuthController extends Controller
{
    //
    public function loginuser(Request $request)
    {

    	$this->validate($request, [
           'first_name' => 'required',
           'password' => 'required'
    	]);

    
		
		$user =  $request->input('first_name');
		$password =  $request->input('password');

		//dd($password);

 		$authUser = Profile::where('first_name', $user)->first();
 		$authPass = Profile::where('password', $password)->first();
 		//dd($authPass);
	     if($authUser && $authPass ==  true ){
	 
	          $apikey = base64_encode(str_random(40));
	 
	         Profile::where('first_name', $request->input('first_name'))->update(['api_key' => "$apikey"]);;
	 
	          return response()->json(['status' => 'success','api_key' => $apikey]);
	 
	      }else{
	 
	          return response()->json(['status' => 'fail', 'auth'=>$authUser],401);
	 
	      }


    }
}

