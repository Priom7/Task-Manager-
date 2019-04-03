<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskUsre extends Model
{
    //
     protected $fillable = [
    	'user_id',
    	'task_id',
    ];

    //user has many task and a task can be belongs to many user (many to many )
    //
    //a user can create many tasks 
    //and someone can create a task and add severral users for a task 
}
