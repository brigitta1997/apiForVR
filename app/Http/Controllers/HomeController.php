<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VrObject;
use App\User;
use App\Company;
use Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $user = User::findOrFail(auth()->id());
        $company = $user->company()->first();
        return view('profile',
            [
                'user'=>$user,
                'company'=>$company
            ]);
    }

    public function objects()
    {
       
        return view('objects');

    }

    public function addLogo(Request $request){
        $filepathLogo = $this->logoUpload($request);
        $linkHead = "https://s3-ap-southeast-1.amazonaws.com/fypprojectstoragevr/";
        $user = User::findOrFail(auth()->id());
        $company =  $user->company()->first();
        $company->logo = $linkHead.$filepathLogo;
        $company->save();

        return back();

    }

    public function logoUpload(Request $request)
    {
        $this->validate($request, ['logo' => 'required|image']);
      
        if($request->hasfile('logo'))
         {
            $file = $request->file('logo');
            $name=time().$file->getClientOriginalName();
            $filePath = 'logo/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
           
            return $filePath;
         }
    }
}
