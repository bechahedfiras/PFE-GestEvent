<?php
use App\Event;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subevent extends Model
{
    protected $fillable = [
        'label','price','even_id','description','photo'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class,'event_id');
    }
}
