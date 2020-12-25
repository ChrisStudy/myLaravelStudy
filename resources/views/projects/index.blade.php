@extends('layouts.app')
@section('title','Projects')
@section('content')
<h1>Projects</h1>
@foreach ($projects as $project)
<li>
	<a href="/projects/{{ $project->id }}">
		{{ $project->title}}
	</a>
</li>
@endforeach
@if (session('message'))

<p>{{ session('message') }}</p>

@endif
@endsection
