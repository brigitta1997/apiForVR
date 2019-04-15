<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;

class UserController extends Controller
{
    //
    public function autheniticateUserAPI(Request $request){
    	$user = User::where('email',$request['email'])->get()->first();
    	if(Hash::check($request['password'], $user->password)){
    		return new UserResource($user);
    	}else{
    		
    		return response()->json(['error' => 'Not Found'], 404);
    	} 
   }
}
