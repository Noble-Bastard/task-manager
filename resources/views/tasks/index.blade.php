@extends('layouts.app')

@section('content')
    <h1>Tasks List</h1>

    <ul>
        @foreach ($tasks as $task)
            <li>
                <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
@endsection
