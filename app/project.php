<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectCreated;

class project extends Model
{
    //
    protected $fillable = [
    	'title' , 'description' ,'owner_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($project) {

            Mail::to($project->owner->email)->send(
            new ProjectCreated($project)
         );


        });
    }

    public function owner() 
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
    	return $this ->hasMany(Task::class);
    }

    public function addTask($task)
    {
    	$this->tasks()->create($task);
    }
}
