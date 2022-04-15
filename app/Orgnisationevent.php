<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orgnisationevent extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class,'event_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
