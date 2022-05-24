<?php


use App\User;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
/*
Auth
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//yjib data mil tel yvalidihom
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 //select l user l aaando nafss leamail
    $user = User::where('email', $request->email)->first();
 //kano mich howa bido threw mesage dereer
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 //kano mawjoud sinn yasnaa token w yarj3o selon device name
    return $user->createToken($request->device_name)->plainTextToken;
});


//hathi methode bch nfasskho token
Route::middleware('auth:sanctum')->get('/user/revoke', function (Request $request) {
    $user = $request->user();
    $user->tokens()->delete();
    return 'tokens are deleted';
});

/*
Events api routing
*/
   //without Auth
//   Route::get('/events','Admin\EventController@geteventindapi');
Route::get('/events','Admin\EventController@geteventindapi');
 