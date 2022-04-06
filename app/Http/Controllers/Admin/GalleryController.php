<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Galleries = Gallery::all();
        return view('admin.gallery.index')->with('galleries', $Galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gallery = new Gallery();


        if(($request->hasFile('photo1')) || ($request->hasFile('photo2')) || ($request->hasFile('photo3')) || ($request->hasFile('photo4')) || ($request->hasFile('photo5'))){
            
            $gallery->photo1 = $request->photo1->store('image');
            $gallery->photo2 = $request->photo2->store('image');
            $gallery->photo3 = $request->photo3->store('image');
            $gallery->photo4 = $request->photo4->store('image');
            $gallery->photo5 = $request->photo5->store('image');
         }
       
        
        $gallery->save();
        session()->flash('alert_scc', 'creation done  successfully');
        return redirect('admin/gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return view('admin.gallery.edit', ['gallery' => $gallery]);
        } catch (\Throwable $th) {
            return redirect('admin/gallery')->with('alert_err', 'Ops id not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            
            if(($request->hasFile('photo1')) || ($request->hasFile('photo2')) || ($request->hasFile('photo3')) || ($request->hasFile('photo4')) || ($request->hasFile('photo5'))){
            
                $gallery->photo1 = $request->photo1->store('image');
                $gallery->photo2 = $request->photo2->store('image');
                $gallery->photo3 = $request->photo3->store('image');
                $gallery->photo4 = $request->photo4->store('image');
                $gallery->photo5 = $request->photo5->store('image');
             }
            $gallery->save();
            return redirect('admin/gallery')->with('alert_scc', 'updated successfully');
        } catch (\Throwable $th) {
            return redirect('admin/gallery')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $gallery = Gallery::find($id);
            $gallery->delete();
            return redirect('admin/gallery')->with('alert_scc', 'Delete successfully');
        } catch (\Throwable $th) {
            return redirect('admin/gallery')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }
}
