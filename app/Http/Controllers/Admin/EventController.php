<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\Subevent;
use App\User;
use App\Organisateurevent;
use App\HasRoles;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\EloquentFilters\KeywordFilter;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //kizedna l modal
        $eventOgrs = User::whereHas('roles', function ($q) {
            $q->where('name', 'organisateur');
        })->get();

        // $events = Event::all();
        $Keyword =   $request->get('Keyword');
         
        $events = Event::where('label','LIKE','%'.$Keyword.'%')
        ->orwhere('lieux','LIKE','%'.$Keyword.'%')->get();
        // $events = Event::all();
        // dd(  $events);
        return view('admin.events.index')
            ->with('events', $events)
            ->with('eventOgrs', $eventOgrs);
    }
    /**
     * eventsindex
     */
    public function geteventind(Request $request)
    {
         $events = Event::filter($request->all())->get();
        // $events = Event::all();
      
        return view('users.events')->with('events', $events);
    }
      /**
     * eventsindexsearch
     */
    public function geteventinds(Request $request)
    {  
         $Keyword =   $request->get('Keyword');
         
         $events = Event::where('label','LIKE','%'.$Keyword.'%')->get();
        
      
        return view('users.events')->with('events', $events);
    }
    /**
     * getsubevent
     */
    public static function getsubevent($id)
    {
        
        
        $eventOgrs = Organisateurevent::where('event_id',$id)->get();
     

           $event = Event::findOrFail($id);
    
            $subevents = DB::table('subevents')
                ->where('event_id', '=', $id)
                ->get();
    
            return view('users.subevents')
                ->with('subevents', $subevents)
                ->with('event', $event)
                ->with('eventOgrs', $eventOgrs);
        
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
        $eventOgrs = User::whereHas('roles', function ($q) {
            $q->where('name', 'organisateur');
        })->get();
        // dd($users);
        return view('admin.events.create', compact('eventOgrs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request->validate([
           
        
               
        //        'dateevent' => 'date_format:m/d/Y|after:start_date',
        // ]);

       

        $event = new Event();
        $event->label = $request->input('label');
        $event->price = $request->input('price');

        $event->dateevent = $request->input('dateevent');
        $event->description = $request->input('description');
        $event->lieux = $request->input('lieux');
        //request image  mil front  baed tsobha f doussi image
        //  baed taffictiha ll objet event image
        if ($request->hasFile('photo')) {
            $event->photo = $request->photo->store('image');
        }

        $event->save();
        session()->flash('alert_scc', 'creation done  successfully');
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
            //kizedna l modal
            // $eventOgrs = User::whereHas('roles', function ($q) {
            //     $q->where('name', 'organisateur');
            // })->get();
            
            // $eventOgrs = DB::table('eventorgs')
            // ->where('event_id', '=', $id)
            // ->get();

            $numberOfOrgs = Organisateurevent::where('event_id',$id)->get()->count();
            // dd($numberOfOrgs);
            $eventOgrs = Organisateurevent::where('event_id',$id)->get();
            $users = User::all();
            $events = Event::all();
            $subevents = Subevent::where('event_id',$id)->get();
            $event = Event::findOrFail($id);
            // dd($event);
            $numberOfSubevents = Subevent::where('event_id','=',$id )->get()->count();
        //  dd($numberOfSubevents);
          
            return view('admin.events.edit', ['event' => $event,
             'eventOgrs' => $eventOgrs,
             'users' => $users,
             'subevents' => $subevents,
             'events' => $events,
             'numberOfOrgs' => $numberOfOrgs,
             'numberOfSubevents' => $numberOfSubevents,
            ]);
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
            $event->dateevent = $request->input('dateevent');
            $event->description = $request->input('description');
            $event->lieux = $request->input('lieux');
            if ($request->hasFile('photo')) {
                $event->photo = $request->photo->store('image');
            }
            $event->save();
            return redirect('admin/events/'.$event->id.'/edit')->with('alert_scc', 'updated successfully');
        } catch (\Throwable $th) {
            return redirect('admin/events/'.$event->id.'/edit')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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
