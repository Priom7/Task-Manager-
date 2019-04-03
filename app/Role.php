<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
    	'name',
    ];

    //role has many users form User model
    public function users(){
        return $this->hasMany('App\User');
    }
}
