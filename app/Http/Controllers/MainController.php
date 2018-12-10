<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      if(['email'] == 'Detwijker' && ['password'] == 'dumbell'){
          return view('welcome');
      }
      else{
          return view('auth/login');
      }
    }
}
