<?php
use App\Event;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subevent extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
