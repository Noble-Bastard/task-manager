@extends('layouts.app')

@section('content')
    <h1>Task Details</h1>
    <a href="{{ route('tasks.index') }}">Главная</a>
    <h2>{{ $task->title }}</h2>
    <p>{{ $task->description }}</p>
    <p>{{ $task->status }}</p>

    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit Task</a>
    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Task</button>
    </form>
@endsection
