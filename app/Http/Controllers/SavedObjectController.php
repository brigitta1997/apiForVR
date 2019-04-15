<?php

namespace App\Http\Controllers;

use App\SavedObject;
use App\VrObject;
use App\Http\Resources\VrObject as VrObjectResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SavedObjectController extends Controller
{
    //
    public function showSavedObj($userId){
    	$so = VrObject::whereIn("id", function($query) use ($userId){
    		$query->select("obj_id")
    				->from("saved_objects")
    				->where("user_id",$userId);
    	})->get();
    	return VrObjectResource::collection($so);

    }

    public function savedObj(Request $request){
    	SavedObject::create([
    		'user_id' => $request['userId'],
    		'obj_id' => $request['objId']
    	]);
    	return response()->json(['success' => 'Object is saved'], 201);
    }
}
