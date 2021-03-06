<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(){
        return view('contact');
    }

    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contacts.index')->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        try {

            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->email = $request->input('email');
            $contact->subject = $request->input('subject');
            $contact->number = $request->input('number');
            $contact->message = $request->input('message');
            $contact->save();
            return redirect('contact')->with('alert_scc', 'Reclamtion Send Successfully');
        } catch (\Throwable $th) {
            return redirect('contact')->with('alert_err', 'Ops something went wrong, try again.');
        }
       

       
       
    
    }

    public function indexreply(Request $request, $id){
        $theSender = Contact::findOrFail($id);
        $theSenderemail= $theSender->email;
        // dd($theSenderemail);
        $allmess=Contact::all();
        return view('admin.contacts.replyform')
        ->with('allmess',$allmess)
        ->with('theSenderemail',$theSenderemail);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $contact = Contact::find($id);
            $contact->delete();
            return redirect('contactus')->with('alert_scc', 'Suprimer avec succ??s');
        } catch (\Throwable $th) {
            return redirect('contactus')->with('alert_err', 'Ops something went wrong, try again.');
        }
    }
}
