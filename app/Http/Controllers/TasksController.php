<?php

namespace App\Http\Controllers;

use Domain\Tasks\Models\Task;
use Domain\Tasks\Requests\StoreTasksRequest;
use Domain\Tasks\Requests\UpdateTasksRequest;
use Domain\Tasks\Resources\TaskResource;
use Illuminate\Http\Response;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TaskResource[]
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTasksRequest $request
     * @return TaskResource
     */
    public function store(StoreTasksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Task $tasks
     * @return TaskResource
     */
    public function show(Task $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $tasks
     * @return TaskResource
     */
    public function edit(Task $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Domain\Tasks\Requests\UpdateTasksRequest  $request
     * @param Task $tasks
     * @return TaskResource
     */
    public function update(UpdateTasksRequest $request, Task $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $tasks
     * @return TaskResource
     */
    public function destroy(Task $tasks)
    {
        //
    }
}
