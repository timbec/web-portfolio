<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $fillabel = [
          'work_category_id',
          'thumbnail_id',
          'title',
          'website_link',
          'body'
    ]; 

     public function user() {

          return $this->belongsTo('App\User');

      }

      public function thumbnail(){

          return $this->belongsTo('App\Thumbnail');

      }

    public function work_category(){

          return $this->belongsTo('App\WorkCategory');

      }

      public function tags(){

          return $this->belongsToMany('App\Tag'); 

      }

}
