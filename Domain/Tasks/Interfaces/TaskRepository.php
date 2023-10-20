<?php

namespace Domain\Tasks\Interfaces;

use App\Models\User;
use Domain\Tasks\Models\Task;

interface TaskRepository
{
    /**
     * @param int $id
     * @return Task|null
     */
    public function findById(int $id): ?Task;

    /**
     * @param Task $task
     * @return Task
     */
    public function save(Task $task): Task;

    /**
     * @param Task $task
     * @return bool
     */
    public function delete(Task $task): bool;

    /**
     * @param User $user
     * @return Task|null
     */
    public function findByUser(User $user): ?Task;
}
