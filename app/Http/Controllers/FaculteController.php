<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faculte;

class FaculteController extends Controller
{
    //

    public function index()
    {   $facs = Faculte::all();
        return view('admin.faculte.index')->with('facs',$facs);
    }


    public function create () {
        return view('admin.faculte.create');
    }
    
    public function edit ($id) {
        $fac =Faculte::find($id);
        return view('admin.faculte.edit',['fac',$fac]);
    }
   


   
}