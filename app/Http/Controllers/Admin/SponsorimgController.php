<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sponsorimg;
use Illuminate\Http\Request;

class SponsorimgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsorimgs = Sponsorimg::all();
        return view('admin.sponsorimgs.index')->with('sponsorimgs', $sponsorimgs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsorimgs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $sponsorimgs = new Sponsorimg();
    
        if( ($request->hasFile('photo1')) || ($request->hasFile('photo2')) ||  ($request->hasFile('photo3')) ||  ($request->hasFile('photo4')) || ($request->hasFile('photo5')) ) {
            
            $sponsorimgs->photo1 = $request->photo1->store('image');
            $sponsorimgs->photo2 = $request->photo2->store('image');
            $sponsorimgs->photo3 = $request->photo3->store('image');
            $sponsorimgs->photo4 = $request->photo4->store('image');
            $sponsorimgs->photo5 = $request->photo5->store('image');
         }
       
        
        $sponsorimgs->save();
        session()->flash('alert_scc', 'creation done  successfully');
        return redirect('admin/sponsorsimg');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sponsorimg  $sponsorimg
     * @return \Illuminate\Http\Response
     */
    public function show(Sponsorimg $sponsorimg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sponsorimg  $sponsorimg
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $sponsorimgs = Sponsorimg::findOrFail($id);
            return view('admin.sponsorimgs.edit', ['sponsorimgs' => $sponsorimgs]);
        } catch (\Throwable $th) {
            return redirect('admin/sponsorimg')->with('alert_err', 'Ops id not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sponsorimg  $sponsorimg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $sponsorimgs = Sponsorimg::findOrFail($id);
        if( ($request->hasFile('photo1')) || ($request->hasFile('photo2')) ||  ($request->hasFile('photo3')) ||  ($request->hasFile('photo4')) || ($request->hasFile('photo5')) ) {
            
            $sponsorimgs->photo1 = $request->photo1->store('image');
            $sponsorimgs->photo2 = $request->photo2->store('image');
            $sponsorimgs->photo3 = $request->photo3->store('image');
            $sponsorimgs->photo4 = $request->photo4->store('image');
            $sponsorimgs->photo5 = $request->photo5->store('image');
         }
       
        
           
             $sponsorimgs->save();
            
            return redirect('admin/sponsorsimg')->with('alert_scc', 'updated successfully');
        } catch (\Throwable $th) {
            return redirect('admin/sponsorsimg')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sponsorimg  $sponsorimg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            try {
                $sponsorimg = Sponsorimg::find($id);
                $sponsorimg->delete();
                return redirect('admin/sponsorsimg')->with('alert_scc', 'Delete successfully');
            } catch (\Throwable $th) {
                return redirect('admin/sponsorsimg')->with('alert_err', 'Ops something went wrong, try again.');
            }
        
    }
}
