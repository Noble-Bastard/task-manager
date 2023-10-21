@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" required>

        <label for="description">Description</label>
        <textarea name="description" required></textarea>

        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="todo">Todo</option>
            <option value="completed">Completed</option>
        </select>
        <label>
            <input name="user_id" value="1" hidden="">
        </label>

        <button type="submit">Create Task</button>
    </form>

@endsection
