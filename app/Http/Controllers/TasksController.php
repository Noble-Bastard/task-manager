<?php

namespace App\Http\Controllers;

use Domain\Tasks\Interfaces\TaskService;
use Domain\Tasks\Requests\StoreTasksRequest;
use Domain\Tasks\Requests\UpdateTasksRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TasksController extends Controller
{
    /**
     * @param TaskService $taskService
     */
    public function __construct(private readonly TaskService $taskService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $tasks = $this->taskService->all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTasksRequest $request
     * @return Application|Factory|View
     */
    public function store(StoreTasksRequest $request): View|Factory|Application
    {
        $taskDTO = $request->toDto();
        $task = $this->taskService->create($taskDTO);

        return view('tasks.show', compact('task'));
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('tasks.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $taskId
     * @return Application|Factory|View
     */
    public function show(int $taskId): View|Factory|Application
    {
        $task = $this->taskService->getTask($taskId);

        return view('tasks.show', compact('task'));
    }

    /**
     * @param int $taskId
     * @return Factory|View|Application
     */
    public function edit(int $taskId): Factory|View|Application
    {
        $task = $this->taskService->getTask($taskId);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTasksRequest $request
     * @return Application|Factory|View
     */
    public function update(UpdateTasksRequest $request): View|Factory|Application
    {
        $taskDTO = $request->toDto();
        $task = $this->taskService->update($taskDTO);

        return view('tasks.show', compact('task'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $taskId
     * @return RedirectResponse
     */
    public function destroy(int $taskId): RedirectResponse
    {
        // TODO: handle status and display flash message
        $status = $this->taskService->delete($taskId);

        return redirect()->route('tasks.index');
    }

}
