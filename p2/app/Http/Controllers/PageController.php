<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages/welcome');
    }


     public function show()
     {
         return view('pages/show');
     }
}