<?php

namespace App;
use App\Subevent;
use App\Cart;
use App\Organisateurevent;
use App\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\EloquentFilters\KeywordFilter;
use Laravel\Sanctum\HasApiTokens;


use Abdrzakoxa\EloquentFilter\Traits\Filterable;
class Event extends Model
{
    use Filterable;
    use HasApiTokens;
    
    protected $filters = [
        KeywordFilter::class,
    ];

 


    protected $fillable = [
        'label','price','dateevent','lieux','description','photo'
    ];

    public function subevents()
    {
        return $this->hasMany(Subevent::class);
    }

    public function organisateurevents()
    {
        return $this->hasMany(Organisateurevent::class);
    }

    public function carts(){
        return $this->hasMany('App\Cart');
    }
}
