<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
    	'name',
    	'description',
    	'days',
    	'company_id',
    ];


    //Project has many users
    //laravel will look for the join table for User ans Project 
    public function users(){
        return $this->belongsToMany('App\User');
    }

    //project has a caompany form Compay model
    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
