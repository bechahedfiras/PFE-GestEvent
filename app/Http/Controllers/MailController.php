<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Http\Request;
use App\Mail\MailAdminReply;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function ReplyAdmin(Request $request){
        $mailto = $request->sender;
        //  dd($mailto);
        $details=[
            'title'=>$request->title,
            'mail'=>$request->mail,
            'tel' => $request->tel,
            'mess' => $request->mess,
        ];
        Mail::to($mailto)->send(new MailAdminReply($details));
        return back()->with('alert_scc','Your Message has been sent successfully!');
    }
}
