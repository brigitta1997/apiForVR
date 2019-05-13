<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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

   public function registerFromPhone(Request $request)
    {
       $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

       if($validator->fails())
       {
        return response()->json(['error' => $validator->errors()->first()], 201);
       }
       else
       {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return response()->json(['success' => 'The registration successful!'],201);
       }
    }

    public function viewProfile($id){
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
}
