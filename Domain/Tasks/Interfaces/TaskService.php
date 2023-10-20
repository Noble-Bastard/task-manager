<?php

namespace Domain\Tasks\Interfaces;

use App\Models\User;
use Domain\Tasks\Models\Task;

interface TaskService
{
    /**
     * @param int $id
     * @return Task|null
     */
    public function getTask(int $id): ?Task;

    /**
     * @param Task $task
     * @return Task
     */
    public function create(Task $task): Task;

    /**
     * @param Task $task
     * @return bool
     */
    public function delete(Task $task): bool;

    /**
     * @param int $id
     * @return Task|null
     */
    public function getByUserId(int $id): ?Task;
}
