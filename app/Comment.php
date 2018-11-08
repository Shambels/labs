<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
  use SoftDeletes;

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
 protected $dates = ['deleted_at'];

 public function articles(){
   return $this->belongsTo('App\Article', 'articles_id', 'id');
 }
 public function users(){
   return $this->belongsTo('App\User', 'users_id', 'id');
 }
 
}
