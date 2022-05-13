<?php
use App\Cart;
namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use App\Faculte;
use App\Organisateurevent;

class User extends Authenticatable
{
    use Notifiable;
    use CrudTrait;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone_number','address','postcode','state','profile_pic','email', 'password','faculte_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function roles(){
        return $this->belongsToMany('App\Role');
    }


    public function hasAnyRole(array $roles){
        return $this->roles()->where('name', $roles)->first();
    }

    public function getFaculte(){
        return $this->belongsTo('App\Faculte','faculte_id');
        //Select from facultes where facultes.id = user.faculte_id limit 1
    }
    
    public function organisateurevents()
    {
        return $this->hasMany(Organisateurevent::class);
    }

    public function carts(){
        return $this->hasMany('App\Cart');
    }

}