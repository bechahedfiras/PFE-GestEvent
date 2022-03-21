<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Faculte extends Model
{
    //
    public function users(){
        return $this->hasMany('App\User');
    }
}