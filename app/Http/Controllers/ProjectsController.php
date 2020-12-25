<?php

namespace App\Http\Controllers;

use App\Events\ProjectCreated;
use App\Project;
use App\Services\Twitter;
use Illuminate\Http\Request;
use Mail;
// use App\Event\ProjectCreated;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
  
    $this->middleware('auth');
  
  //or
  
    //$this->middleware('auth')->only(['store','update']);
  
    }

    public function index()
    {
            //$projects = project::all();
        $projects = auth()->user()->projects;
           // $projects = Project::where('owner_id',auth()->id())->get();
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
        // $attributes = request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
            
        // ]);

        $attributes = $this->validateProject();
 
        //Project::create($attributes + ['owner_id'=>auth()->id()]);


        // $attributes = request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
        // ]);
        $owner_id = auth()->id();
        $attributes['owner_id'] = $owner_id;
        
        //Project::create($attributes);

        $project = Project::create($attributes);

        // event(new ProjectCreated($project));


        //$project->save();
         // Mail::to($projects->owner->email)->send(
         //    new ProjectCreated($projects)
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
        //E21 code
        // $twitter = app('twitter');
        // dd($twitter);
        //EOE E21
        //abort_if($project->owner_id !== auth()->id(),403);

        $this->authorize('update',$project);
        

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


        // $project =Project::findorFail($id);

        // $project->title = $request->title;

        // $project->description = $request->description;

        // $project->save();

        $project ->update($this->validateProject());

        //         $this->authorize('update',$project);

        //         $attributes = request()->validate([
        //     'title' => ['required', 'min:3'],
        //     'description' => ['required', 'min:3']
            
        // ]);

        // $project->update(request(['title','description']));

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

        $this->authorize('update',$project);

       $project->delete();

      return redirect('/projects');
  }

  public function validateProject()
{

                return request()->validate([
            'title' => ['required', 'min:3'],
            'description' => ['required', 'min:3']
            
        ]);

}


}
