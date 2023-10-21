@extends('layouts.app')

@section('content')
    <h1>Tasks List</h1>

    <!-- Filter Form -->
    <form method="get">
        <div class="form-group">
            <label for="status">Filter by Status:</label>
            <select name="status" id="status">
                <option value="">All</option>
                <option value="todo">Todo</option>
                <option value="completed">Completed</option>
            </select>
        </div>
        <div class="form-group">
            <label for="created_at">Filter by Date:</label>
            <input type="date" name="created_at" id="created_at">
        </div>
        <button type="submit" class="btn btn-primary">Apply Filters</button>
    </form>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tasks as $task)
            <tr>
                <th scope="row">{{ $task->id }}</th>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>
                    <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $tasks->links() }}

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
@endsection
