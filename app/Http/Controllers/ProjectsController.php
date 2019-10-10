<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $projects = project::all();

        //return $projects;
           // dump($projects);
            // cache()->rememberForever('stats',function(){
            //     return ['lessons' => 1300, 'hours' => 50000, 'series' =>100];
            // });

        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
        ]);
 
        Project::create($attributes);


        // $attributes = request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);

        // $attributes['ower_id'] = auth()->id();
        
        // Project::create($attributes);


        //$project->save();
        // \Mail::to('chris@adimpact.com.au')->send(
        //     new ProjectCreated()
        // );

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        // $project = project::findorFail($id);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {

        // $project = project::findorFail($id);


        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project)
    {
        $project->update(request(['title','description']));

        // $project =Project::findorFail($id);

        // $project->title = $request->title;

        // $project->description = $request->description;

        // $project->save();

        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

       $project->delete();

      return redirect('/projects');
  }
}
