@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>

    <form method="POST" action="{{ route('tasks.update', $task->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $task->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection
