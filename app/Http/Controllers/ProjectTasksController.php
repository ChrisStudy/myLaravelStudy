<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Project;

class ProjectTasksController extends Controller
{
    //
    public function store(Project $project)
    {
    	// $attributes = request()->validate(['description' => 'required']);

    	// $project->addTask($attributes);
        $project ->addTask(
            request()->validate(['description' => 'required'])
        );
    	return back();

    }
    public function update(Task $task)
    {
        // $task->complete();
        // $task->complete(request()->has('completed'));
    	// $task->update([
    	// 	'completed' => request()->has('completed')
    	// ]);
        request()->has('completed') ? $task->complete() : $task->incomplete();
    	return back();
    }
}