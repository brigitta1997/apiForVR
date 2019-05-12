<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Storage;
use App\Http\Resources\Slider as SliderResource;

class SlidersController extends Controller
{
    //
	public function create(){
		return view('addSlider');
	}

    public function uploadSlider(Request $request){
    	$filepathImg = $this->uploadImg($request);
    	$linkHead = "https://s3-ap-southeast-1.amazonaws.com/fypprojectstoragevr/";

    	Slider::create([
    		'objId' => request('objId'),
    		'imgLink' => $linkHead.$filepathImg
    	]);

    	return back()->with('success','Uploaded successfully');

    	
    }
    public function uploadImg(Request $request){
    	$this->validate($request, ['imgLink' => 'required|image']);

    	 if($request->hasfile('imgLink'))
         {
            $file = $request->file('imgLink');
            $name=time().$file->getClientOriginalName();
            $filePath = 'slider/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
           
            return $filePath;
         }
    }

    public function getImgSlider($objId){
    	$slider = Slider::where('objId','=',$objId)->get();
    	return SliderResource::collection($slider);
    }
}
