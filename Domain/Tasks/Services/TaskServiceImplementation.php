<?php

namespace Domain\Tasks\Services;

use Domain\Tasks\Interfaces\TaskService;
use Domain\Tasks\Models\Task;

class TaskServiceImplementation implements TaskService
{

    /**
     * @param int $id
     * @return Task|null
     */
    public function getTask(int $id): ?Task
    {
        // TODO: Implement getTask() method.
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function create(Task $task): Task
    {
        // TODO: Implement create() method.
    }

    /**
     * @param Task $task
     * @return bool
     */
    public function delete(Task $task): bool
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param int $id
     * @return Task|null
     */
    public function getByUserId(int $id): ?Task
    {
        // TODO: Implement getByUserId() method.
    }
}
