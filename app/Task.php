<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
     protected $fillable = [
    	'name',
    	'days',
    	'hours',
    	'project_id',
    	'company_id',

    ];

    //task has a project form Project model
    public function project(){
        return $this->belongsTo('App\Project');
    }

    //task has a user form User model
    public function user(){
        return $this->belongsTo('App\User');
    }

    //task has a caompany form Compay model
    public function company(){
        return $this->belongsTo('App\Company');
    }


    //tasks has many users
    //laravel will look for the join table for User ans Task 
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }
}
