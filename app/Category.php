<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
  use SoftDeletes;

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
 protected $dates = ['deleted_at'];

 public function articles(){
   return $this->belongsToMany('App\Article','categories_has_articles', 'categories_id', 'articles_id');
 }
}
