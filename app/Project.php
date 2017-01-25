<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
     'project_category_id',
     'thumbnail_id',
     'title',
     'body'
  ];

  public function user()
  {
     return $this->belongsTo('App\User');
  }

  public function thumbnail()
  {
     return $this->belongsTo('App\Thumbnail');
  }

  // public function photo()
  // {
  //    return $this->belongsTo('App\Photo');
  // }

  public function project_category()
  {
     return $this->belongsTo('App\ProjectCategory');
  }

  public function project_skills()
  {
     return $this->belongsToMany('App\Skills');
  }

}
