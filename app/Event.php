<?php
use App\Subevent;
use App\Orgnisationevent;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function subevents()
    {
        return $this->hasMany(Subevent::class);
    }

    public function organisationevents()
    {
        return $this->hasMany(Orgnisationevent::class);
    }
}
