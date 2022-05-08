<?php
use App\Cart;
use App\Event;
use App\User;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
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

    public function getUser(){
        return $this->belongsTo('App\User','user_id');
    }
}
