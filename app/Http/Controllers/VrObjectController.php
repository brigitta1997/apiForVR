<?php

namespace App\Http\Controllers;

use App\User;
use App\Company;
use App\VrObject;
use App\Http\Resources\VrObject as VrObjectResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Storage;

class VrObjectController extends Controller
{
    //

    public function create()
    {
        return view('uploadobject');
    }

    //upload object from web upload
    public function objectupload(Request $request)
    {
        $attributes = $this->validate($request, [
            'name' => 'required | min:3',
            'price' => 'required',
            'type' => 'required',
            'descr' => 'required'
            ]);

        $filepath3d = $this->object3dUpload($request);
        $filepath2d = $this->object2dUpload($request);
        
        $companyName = Company::where('user_id',auth()->id())->first()->name;
        $linkHead = "https://s3-ap-southeast-1.amazonaws.com/fypprojectstoragevr/";

        VrObject::create([
            'name' => request('name'),
            'price' => request('price'),
            'type' => request('type'),
            'company' =>  $companyName,
            'obj3dl' => $linkHead.$filepath3d,
            'obj2dl' => $linkHead.$filepath2d,
            'descr' => request('descr')
        ]);
     
        return back()->with('success','Uploaded successfully');
        

    }

    public function object3dUpload(Request $request)
    {
        $this->validate($request, ['object3d' => 'required|mimetypes:text/plain']);
       
        if($request->hasfile('object3d'))
         {
            $file = $request->file('object3d');
            $name=time().$file->getClientOriginalName();
            $filePath = '3dobject/' . $name;   
            Storage::disk('s3')->put($filePath, file_get_contents($file));   
           
            return $filePath;
         }
    }

    public function object2dUpload(Request $request)
    {
        $this->validate($request, ['object2d' => 'required|image']);
      
        if($request->hasfile('object2d'))
         {
            $file = $request->file('object2d');
            $name=time().$file->getClientOriginalName();
            $filePath = '2dobject/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
           
            return $filePath;
         }
    }

    public function storeObject(array $data)
    {
        
    }

    public function view($id){
        $vrobj = VrObject::findOrFail($id);
        return new VrObjectResource($vrobj);
    }

    //temporary
    public function delete($id){
        $vrobj = VrObject::findOrFail($id)->delete();
        return view('/');
    }

    

}
