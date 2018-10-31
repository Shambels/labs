<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
  use SoftDeletes;

  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
 protected $dates = ['deleted_at'];

 public function user(){
   return $this->belongsTo('App\User', 'users_id', 'id');
 }
 
 public function categories(){
   return $this->belongsToMany('App\Category', 'articles_categories','articles_id','categories_id');
 }
 public function tags(){
  return $this->belongsToMany('App\Tag', 'articles_tags','articles_id','tags_id');
 }
 public function comments(){
   return $this->hasMany('App\Comment','articles_id','id');
 }
}
