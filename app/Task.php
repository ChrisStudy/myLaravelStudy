<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    public funtion project()
    {
    	return $this->belongsTo(Project::class);
    }
}
