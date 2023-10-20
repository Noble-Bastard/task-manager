<?php

namespace Domain\Tasks\Repositories;

use App\Models\User;
use Domain\Tasks\Interfaces\TaskRepository;
use Domain\Tasks\Models\Task;

class TaskRepositoryImplementation implements TaskRepository
{

    /**
     * @param int $id
     * @return Task|null
     */
    public function findById(int $id): ?Task
    {
        // TODO: Implement findById() method.
    }

    /**
     * @param Task $task
     * @return Task
     */
    public function save(Task $task): Task
    {
        // TODO: Implement save() method.
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
     * @param User $user
     * @return Task|null
     */
    public function findByUser(User $user): ?Task
    {
        // TODO: Implement findByUser() method.
    }
}
