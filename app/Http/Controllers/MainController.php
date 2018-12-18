<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Post;
use App\Tag;
use App\Category;
use App\Session;
use App\Purifier;
use App\Body;

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

        /*request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('images/UploadImages'), $imageName);

        return view('admin')->with('success','You have successfully upload image.')->with('image',$imageName);*/




        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required'
        ));

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;
        $post->body = Purifier::clean($request-body);

        if ($request->hasFile('featurd_image')) {
        $image = $request->file('featured_image');
        $filename = time(). '.' . $image->getClientOriginalExtension();
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('succes', 'The images has been uploaded');

        return redirect()->route('admin', $post->id);
    }

    public function galleryUploads()
    {

        $dir = "/public/images";

        $images = glob( $dir . "/*jpg" );

        return view("photoGallery")->with('images', $images);
    }

}
