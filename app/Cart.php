<?php
use App\Cart;
use App\Event;
use App\User;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function getEvent(){
        return $this->belongsTo('App\Event','Event_id');
    }
    public function getUser(){
        return $this->belongsTo('App\User','user_id');
    }
}
