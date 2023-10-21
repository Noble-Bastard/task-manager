@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>
    <a href="{{ route('tasks.index') }}">Главная</a>
    <form method="POST" action="{{ route('tasks.update') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $task->description }}</textarea>
        </div>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="todo" {{$task->status == 'todo' ? 'selected' : ''}}>todo</option>
            <option value="completed" {{$task->status == 'completed' ? 'selected' : ''}}>completed</option>
        </select>
        <label>
            <input name="user_id" value="{{ $task->user_id }}" hidden="">
        </label>
        <label>
            <input name="id" value="{{ $task->id }}" hidden="">
        </label>

        <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
@endsection
