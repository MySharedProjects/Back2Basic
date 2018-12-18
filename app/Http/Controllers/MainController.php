<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function home()
    {
        return view('welcome');
    }

    public function LoginCheck(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
      if($username == "Detwijker" && $password == "dumbell" ){
          return view('admin');
      }
      else{
          return redirect('/login')->with('status', 'username or password is incorrect');
      }
    }

    public function imageUpload(Request $request)

    {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images/UploadImages'), $imageName);

        return view('admin')->with('success','You have successfully upload image.')->with('image',$imageName);


    }

    public function galleryUploads()
    {

        $dir = "/public/images/*.jpg";

        $images = glob( $dir );

        return view("photoGallery")->with('images', $images);
    }


}
