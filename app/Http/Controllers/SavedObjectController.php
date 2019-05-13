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
    	// $so = DB::table('saved_objects')->select('obj_id')->where('user_id',$userId)->get();
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

    public function delete($user_id, $obj_id){
        SavedObject::where('user_id','=',$user_id)->where('obj_id','=',$obj_id)->delete();
        return response()->json(['success' => 'Saved Object is deleted'], 201);
    }

    public function is_saved($user_id, $obj_id){
        $so = SavedObject::where('user_id','=',$user_id)->where('obj_id','=',$obj_id)->first();
        if($so == null){
            return response()->json(['message' => "0"], 201);
        }else{
            return response()->json(['message' => "1"], 201);
        }
    }
}
