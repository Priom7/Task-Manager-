<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email',
        'password',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relations in database 
   

    //user has many comments form Comment model
    public function comments()
    {
        return $this->morphMany('App\Comment','commentable');
    }

    //user has a Role form Role model
    public function role(){
        return $this->belongsTo('App\Role');
    }

    //user has many companies form Company model
    public function companies(){
        return $this->hasMany('App\Company');
    }

    //users has many tasks
    //laravel will look for the join table for User ans Task 
    public function tasks(){
        return $this->belongsToMany('App\Task');
    }

    //users has many Projectss
    //laravel will look for the join table for User ans Project 
    public function projects(){
        return $this->belongsToMany('App\Project');
    }


}
