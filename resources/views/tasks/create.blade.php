@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save Task</button>
    </form>
@endsection
