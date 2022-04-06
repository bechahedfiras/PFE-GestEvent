<?php

namespace App\Http\Controllers;
use App\Gallery;
use Illuminate\Http\Request;
use App\Sponsorimg;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
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
    public function welcome()
    {

        $sponsorimgs = Sponsorimg::all();
        $galleries = Gallery::all();
        return view('welcome')->with('galleries',$galleries)->with('sponsorimgs',$sponsorimgs);

    }

   
}
