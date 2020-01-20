@extends('layouts.app')

@section ('content')

<h1 class="title">
	{{ $project->title }}
	</h1>
<div class="content"> 
	{{ $project->description}} 
</div>
<p>
	<a href="/projects/{{$project->id }}/edit">Edit</a>
</p>

@if ($project->tasks->count())
<div class="box">

@foreach ($project->tasks as $task)
<div>
	<form method="POST" action="/completed-tasks/{{ $task->id }}">
{{-- 		@method('PATCH') --}}
		@if ($task->completed)

		@method('DELETE')
		
		@endif

		@csrf
		<label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">
			<input type="checkbox" name="completed" onChange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}>
				{{ $task->description }}
		</label>
	</form>

</div>
@endforeach

</div>
@endif
<div class="box">
<form method="POST" action="/projects/{{$project->id }}/tasks">
	@csrf
	<div class="field">
		<label class="lable" for="description">New Task</label>
		<dir class="control">
			<input type="text" class="input" name="description" placeholder="New Task" required>
		</dir>		
	</div>
	<div class="field">
		<dir class="control">
			<button type="submit" class="button is-link">Add Task</button>
		</dir>
	</div>

	@include ('errors')

</form>
</div>
@endsection