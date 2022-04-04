<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::all();
        return view('admin.events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
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
        $event->save();
        return redirect('admin/events');
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
    public function edit($id)
    {
        try {
            $event = Event::findOrFail($id);
            return view('admin.events.edit', ['event' => $event]);
        } catch (\Throwable $th) {
            return redirect('admin/events')->with('alert_err', 'Ops id not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $event = Event::findOrFail($id);
            $event->label = $request->input('label');
            $event->price = $request->input('price');
            $event->save();
            return redirect('admin/events')->with('alert_scc', 'updated successfully');
        } catch (\Throwable $th) {
            return redirect('admin/events')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        try {
            $event = Event::find($id);
            $event->delete();
            return redirect('admin/events')->with('alert_scc', 'Delete successfully');
        } catch (\Throwable $th) {
            return redirect('admin/events')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }
}
