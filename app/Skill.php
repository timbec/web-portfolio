<?php

namespace App;

use App\Project; 
use Illuminate\Database\Eloquent\Model;


class Skill extends Model
{
    protected $fillable = [
     'name'
    ];

    public function projects()
    {
        return $this->belongsToMany('App\Project'); 
    }
}
