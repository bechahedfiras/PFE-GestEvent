<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Subevent;
use App\Event;
use Illuminate\Http\Request;

class SubeventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $events = Event::all();
        $subevents = Subevent::all();
        return view('admin.subevents.index')->with('subevents', $subevents);
    }
    /**
     * eventsindex
     */
    public function getsubeventind()
    {
        //
        $subevents = Subevent::all();
     
        return view('users.subevents')->with('subevents', $subevents);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('admin.subevents.create')->with('events', $events);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subevent = new Subevent();
        $subevent->label = $request->input('label');
        $subevent->price = $request->input('price');
        $subevent->description = $request->input('description');
        $subevent->event_id = $request->input('event');
       
     
        if($request->hasFile('photo')) {
            
            $subevent->photo = $request->photo->store('image');
         }
       
        
        $subevent->save();
        session()->flash('alert_scc', 'creation done  successfully');
        return redirect('admin/events/'.$request->input('event').'/edit'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subevent  $subevent
     * @return \Illuminate\Http\Response
     */
    public function show(Subevent $subevent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subevent  $subevent
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        try {
            $subevent = Subevent::findOrFail($id);
            return view('admin.subevents.edit', ['subevent' => $subevent]);
        } catch (\Throwable $th) {
            return redirect('admin/subevents')->with('alert_err', 'Ops id not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subevent  $subevent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        try {
            $subevent = Subevent::findOrFail($id);
            $subevent->label = $request->input('label');
            $subevent->price = $request->input('price');
            $subevent->description = $request->input('description');
            // $subevent->lieux = $request->input('lieux');
            if($request->hasFile('photo')) {
            
                $subevent->photo = $request->photo->store('image');
             }
            $subevent->save();
            return redirect('admin/events/'.$subevent->event->id.'/edit')->with('alert_scc', 'updated successfully');
        } catch (\Throwable $th) {
            return redirect('admin/events/'.$subevent->event->id.'/edit')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subevent  $subevent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $subevent = Subevent::findOrFail($id);
            $subevent->delete();
            return redirect('admin/events/'.$subevent->event->id.'/edit')->with('alert_scc', 'Suprimer avec succ??s');
        } catch (\Throwable $th) {
            return redirect('admin/subevents')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }
    
}
