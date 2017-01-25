<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
   
   protected $uploads = '/thumbnails/';

   protected $fillable = ['file'];


   public function getFileAttribute($thumbnail)
   {
     return $this->uploads . $thumbnail;
  }
}
