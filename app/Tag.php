<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
  use SoftDeletes;

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
 protected $dates = ['deleted_at'];

 public function articles(){
   return $this->belongsToMany('App\Article','tags_has_articles8','tags_id','articles_id');
 }
}
