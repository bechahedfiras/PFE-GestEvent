<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\User;
use App\Role;
use App\Faculte;
use Carbon\Carbon;
use App\Mail\MailBox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class UsersController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $users = User::all();
        return view('admin.users.index')->with('users',$users);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   $roles = role::all();
        return view('admin.users.edit',[
            'users' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('admin.users.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {   
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function adminDashboard()
    {
        $detail['users'] = User::all()->count();
        $detail['facultes'] = Faculte::all()->count();
        return view('admin.dashboard', compact('detail'));
    }

   /**
     * Show email verification page
     */
    public function showVerifyEmail()
    {
        if (auth::user()->emailConfirmed == 'false') {
            $code = Str::random(10);
            auth::user()->emailConfirmed = $code;
            auth::user()->save();

            /**Send email to author*/
            $email = [];
            $email['from'] = "qsedfqsd@gmail.com";
            $email['subject'] = "Confirmation code";
            $email['message'] = "Hello dear " . auth::user()->name . ",<br> Your confirmation code is <b>" . $code . "</b>.";
            Mail::to(auth::user()->email)->send(new MailBox($email));
        }

        return view('auth.verifyEmail');
    }

    
    /**
     * Confirm verify
     */
    public function validEmailCode(Request $request)
    {
        try {
            if ($request['code']) {
                if ($request['code'] == auth::user()->emailConfirmed) {
                    auth::user()->emailConfirmed = 'true';
                    auth::user()->email_verified_at = Carbon::now()->timestamp;
                    auth::user()->save();
                    return redirect(('/home'));
                } else {
                    return back()->with('error', 'Confirmation code unvalid');
                }
            } else {
                return back()->with('error', 'Please insert the confirmation code');
            }
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Show email verification page
     */
    public function sendNewCode()
    {
        $code = Str::random(10);
        auth::user()->emailConfirmed = $code;
        auth::user()->save();

        return redirect('auth.verifyEmail');
    }
}
    
    