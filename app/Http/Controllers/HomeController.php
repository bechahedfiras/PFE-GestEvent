<?php

namespace App\Http\Controllers;
use App\Gallery;
use App\Event;
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
        $event = Event::all()->take(1);
        $sponsorimgs = Sponsorimg::all();
        $galleries = Gallery::all();
        return view('home')->with('galleries',$galleries)
        ->with('sponsorimgs',$sponsorimgs)
        ->with('event',$event);

    }
    public function welcome()
    {
        $eventss = Event::all()->take(1);
       
        $sponsorimgs = Sponsorimg::all();
        $galleries = Gallery::all();
        return view('welcome')
        ->with('galleries',$galleries)
        ->with('sponsorimgs',$sponsorimgs)
        ->with('eventss',$eventss);


    }

   
}
