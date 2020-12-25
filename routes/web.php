<?php

use App\Notifications\SubscriptionRenewalFailed;
use Illuminate\Http\Request;

//use Illuminate\Filesystem\Filesystem;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
        //E21 code
// app()->singleton('twitter',function(){
// 	return new \App\Services\Twitter('askjdhskajhdas');
// });


// Route::get('/', function() {
// 	 dd(app(Filesystem::class));
// 	});
// EOE E21
//  use App\Services\Twitter;

// Route::get('/',function(Twitter $twitter){
// 	dd($twitter);
// 	return view('welcome');
// });
// EOE E22

//use App\Services\Twitter;

// use App\Repositories\UserRepository;

// Route::get('/',function(UserRepository $users){
// 	dd($users);
// 	return view('welcome');
// });
// EOE E22
//Route::get('/home','PagesController@home');
Route::get('projects/create', function(){

	return view('projects.create');

});
Route::post('projects', function(){

	session()->flash('message','Your project has been created.');	

	return redirect('/projects');

});
Route::get('/test-session',function(Request $request){

	//session(['name'=>'JohnDoe']);
	$request->session()->put('footbar','baz');

	return $request->session()->get('footbar');
	session()->flash('message','Your project has been created.');
	return session('name','A default');

});

Route::get('/user-notification',function(){
	$user = App\User::first();

	$user -> notify(new SubscriptionRenewalFailed);
	
	return 'Done';

});
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/about','PagesController@about');

Route::get('/contact','PagesController@contact');

Route::resource('projects','ProjectsController');

// Route:: patch('/tasks/{task}','ProjectTasksController@update');
Route:: post('/projects/{project}/tasks','ProjectTasksController@store');

Route::post('/completed-tasks/{task}','CompletedTasksController@store');
Route::delete('/completed-tasks/{task}','CompletedTasksController@destory');

// Route::get('/projects','ProjectsController@index');

// Route::get('/projects/{project}','ProjectsController@show');

// Route::post('/projects','ProjectsController@store');

// Route::get('/projects/create','ProjectsController@create');

// Route::get('/projects/{project}/edit','ProjectsController@edit');

// Route::patch('/projects/{project}','ProjectsController@update');

// Route::delete('/projects/{project}','ProjectsController@destory');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
