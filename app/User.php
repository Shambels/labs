<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    /**
    * @var array
    */

    protected $dates = ['deleted_at'];

  use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){

      return $this->belongsTo('App\Role', 'roles_id', 'id');

    }
    public function articles() {
        return $this->hasMany('App\Article','users_id','id');
    }
    
    public function comments() {
      return $this->hasMany('App\Comment', 'users_id','id');
    }
}
