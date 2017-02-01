<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Work extends Model
{
     use Sluggable;

          /**
           * Return the sluggable configuration array for this model.
           * HAVE TO ADD SLUG FIELD TO DATABASE
           * @return array
           */
     public function sluggable()
          {
              return [
                  'slug' => [
                      'source' => 'title'
                  ]
              ];
          }

     protected $fillable = [
          'title',
          'body'
      ];

       public function user() {

          return $this->belongsTo('App\User');

      }

      public function tags(){

          return $this->belongsToMany('App\Tag'); 

      }
}
