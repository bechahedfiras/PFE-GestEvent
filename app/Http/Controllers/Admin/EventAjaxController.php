<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //kizedna l modal
        $eventOgrs = User::whereHas(
            'roles', function($q){
                $q->where('name', 'organisateur');
            }
        )->get();

        $events = Event::all();
        return view('admin.eventsajax.index')->with('events', $events)->with('eventOgrs',$eventOgrs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        // $users = User::with('roles')->where('id', '3')->get();
        // $users = User::with('roles')->where('id', '3')->get();
        // $users = DB::table('role_user')->where('role_id','=',3 )->get();
        // $organizaters = User::role('organisateur')->get();
        $eventOgrs = User::whereHas(
            'roles', function($q){
                $q->where('name', 'organisateur');
            }
        )->get();
        // dd($users);
        return view('admin.eventsajax.create',compact('eventOgrs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->label = $request->input('label');
        $event->price = $request->input('price');
        $event->description = $request->input('description');
        $event->lieux = $request->input('lieux');
        //request image  mil front  baed tsobha f doussi image
        //  baed taffictiha ll objet event image
        if($request->hasFile('photo')) {
            
            $event->photo = $request->photo->store('image');
         }
       
        
        $event->save();
        session()->flash('alert_scc', 'creation done  successfully');
        return redirect('admin/eventsajax');
        // if($event)
        // return response() -> json([
        //     'status' => true,
        //     'alert_scc' => 'creation done  successfully',
        // ]);
        // else

        // return response() -> json([
        //     'status' => false,
        //     'alert_scc' => 'creation failed',
        // ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
