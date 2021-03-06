@extends('layouts.app')

@section ('content')


<h1 class="title">Edit Project</h1>


<form method="POST" action="/projects/{{ $project->id }}" sytle="margin-bottom:1em;">
	
<!-- 	{{method_field('PATCH')}}

		{{ csrf_field() }} -->

		   	@method('PATCH')
   			@csrf
	
	<div class="field">
		<label class="label" for="title">Title</label>

		<div class="control">
			<input type="text" class="input" name="title" placeholder="Title" value="{{ $project->title }}">

		</div>

		
	</div>

		<div class="field">
		<label class="label" for="description">Description</label>

		<div class="control">
			<textarea   class="textarea" name="description" >{{ $project->description }}</textarea>

		</div>
		
	</div>

	<div class="field" style="margin-bottom: 0.75em">

		<div class="control">

			<button type="submit" class="button is-link" name="send" value="update" >Update Project </button>


		</div>

		
	</div>


</form>

@include ('errors')

<form method="POST" action="/projects/{{ $project->id }}">
<!-- 	{{method_field('DELETE')}}

		{{ csrf_field() }} -->

		   @method('DELETE')
   			@csrf
	<div class="field">

		<div class="control">
	<button type="submit" class="button is-link" name="send" value="delete" >Delete Project </button>

			</div>

		
	</div>
	<form>

@endsection