<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    protected $table = "project_user"; //joint table name in the databse


    protected $fillable = [
    	'user_id',
    	'project_id',
    ];
}
