<?php
use App\Subevent;
use App\Organisateurevent;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function subevents()
    {
        return $this->hasMany(Subevent::class);
    }

    public function organisateurevents()
    {
        return $this->hasMany(Organisateurevent::class);
    }
}
