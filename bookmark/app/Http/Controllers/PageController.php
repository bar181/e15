<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('pages/welcome');
    }

     public function contact()
     {
         return view('pages/contact');
     }

     public function tests()
     {
         //  dd(app_path());
         //  dd(Str::plural('mouse'));
         //  dd(public_path('css/books/show.css'));
         //  dd(public_path());
         //  dd(config('app.timezone'));
         //  dd(storage_path('temp'));

         $location = session('location', 'Default Value');
         return view('pages/tests', ['location' => $location]);
     }
}