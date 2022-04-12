<?php
use App\Subevent;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function subevents()
    {
        return $this->hasMany(Subevent::class);
    }
}
