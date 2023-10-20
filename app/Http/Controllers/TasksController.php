<?php

namespace App\Http\Controllers;

use Domain\Tasks\Interfaces\TaskService;
use Domain\Tasks\Requests\StoreTasksRequest;
use Domain\Tasks\Requests\UpdateTasksRequest;
use Domain\Tasks\Resources\TaskResource;
use Illuminate\Database\Eloquent\Collection;

class TasksController extends Controller
{
    public function __construct(private readonly TaskService $taskService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->taskService->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTasksRequest $request
     * @return TaskResource
     */
    public function store(StoreTasksRequest $request): TaskResource
    {
        $taskDTO = $request->toDto();
        $task = $this->taskService->create($taskDTO);

        return new TaskResource($task);
    }

    /**
     * Display the specified resource.
     *
     * @param int $taskId
     * @return TaskResource
     */
    public function show(int $taskId): TaskResource
    {
        $task = $this->taskService->getTask($taskId);

        return new TaskResource($task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTasksRequest $request
     * @return TaskResource
     */
    public function update(UpdateTasksRequest $request): TaskResource
    {
        $taskDTO = $request->toDto();
        $task = $this->taskService->update($taskDTO);

        return new TaskResource($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $taskId
     * @return array
     */
    public function destroy(int $taskId): array
    {
        $status = $this->taskService->delete($taskId);

        return ['success' => $status];
    }
}
