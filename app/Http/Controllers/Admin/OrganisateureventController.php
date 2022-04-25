<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Event;
use App\User;
use App\Organisateurevent;
use Illuminate\Http\Request;

class OrganisateureventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {           
        //   $eventorgs = DB::table('eventorgs')->distinct()->get();
        
        $eventorgs = Organisateurevent::distinct('event_id')->orderBy('event_id')->get();;
        return view('admin.eventorgs.index')->with('eventorgs', $eventorgs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $events = Event::all();
        $eventorgs = Organisateurevent::all();
        return view('admin.eventorgs.create')->with('eventorgs', $eventorgs)->with('events', $events)->with('users', $users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventorg = new Organisateurevent();
        $eventorg->event_id = $request->input('event');
        $eventorg->user_id = $request->input('user');

        $eventorg->save();
        session()->flash('alert_scc', 'creation done  successfully');
        return redirect('admin/eventorgs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organisateurevent  $orgnisationevent
     * @return \Illuminate\Http\Response
     */
    public function show(Organisateurevent $orgnisationevent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organisateurevent  $orgnisationevent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   try{
        $users = User::all();
       
        $eventorg = Organisateurevent::findOrFail($id);
        return view('admin.eventorgs.edit', ['eventorg' => $eventorg,'users' => $users]);
    }catch(\Throwable $th) {
        return redirect('admin/eventorgs')->with('alert_err', 'Ops id not found');
    }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organisateurevent  $orgnisationevent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
  try{
    $eventorg = Organisateurevent::findOrFail($id);
    $eventorg->event_id = $request->input('event');
    $eventorg->user_id = $request->input('user');

    $eventorg->save();
    
    return redirect('admin/eventorgs')->with('alert_scc', 'updated successfully');
  }catch(\Throwable $th){
        return redirect('admin/eventorgs')->with('alert_err', 'Ops something went wrong, try again.');
    }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organisateurevent  $orgnisationevent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $eventorg = Organisateurevent::findOrFail($id);
            $eventorg->delete();
            return back()->with('alert_scc', 'Delete successfully');
        } catch (\Throwable $th) {
            return back()->with('alert_err', 'Ops something went wrong, try again.');
        }
    }
}
