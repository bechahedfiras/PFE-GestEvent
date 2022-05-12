<?php
use App\Event;
use App\Subevent;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id','type','event_id'
    ];

    public function getEvent(){
        return $this->belongsTo('App\Event','event_id');
    }

    public function getSubEvent(){
        return $this->belongsTo('App\Subevent','event_id');
    }
}
