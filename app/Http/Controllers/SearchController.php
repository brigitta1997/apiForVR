<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VrObject;
use App\Http\Resources\VrObject as VrObjectResource;
use App\Http\Resources\VrObjectCollection;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
   public function filter(Request $request, VrObject $vro)
   {
    // Search for a user based on their name.
    $vro = null;
    if ($request->has('name')) {
        $vro = DB::table('vr_objects')->where('name',"like", "%".$request['name']."%")->get();
    }
    if ($request->has('type')) {
        $vro = DB::table('vr_objects')->where('type', $request['type'])->get();
    }
    if ($request->has('company')){
        $vro = DB::table('vr_objects')->where('company', $request['company'])->get();
    }
    if ($request->has('price')){//always has op = operator
        $vro = DB::table('vr_objects')->where('price', $request['op'] , $request['price'])->get();
    }
   
    
   
    return VrObjectResource::collection($vro);
    
    
   }

   public function show_desc($obj_id){
        
   }
}
