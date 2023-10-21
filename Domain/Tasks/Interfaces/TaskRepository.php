<?php

namespace Domain\Tasks\Interfaces;

use Domain\Tasks\DTO\TaskDTO;
use Domain\Tasks\Models\Task;
use Illuminate\Database\Eloquent\Builder;

interface TaskRepository
{
    /**
     * @param int $taskId
     * @return Task|null
     */
    public function findById(int $taskId): ?Task;

    public function all();

    /**
     * @param TaskDTO $taskDTO
     * @return Task
     */
    public function save(TaskDTO $taskDTO): Task;

    /**
     * @param TaskDTO $taskDTO
     * @return Task
     */
    public function update(TaskDTO $taskDTO): Task;

    /**
     * @param int $taskId
     * @return bool
     */
    public function delete(int $taskId): bool;

    /**
     * @param int $userId
     * @return Builder
     */
    public function findByUser(int $userId): Builder;
}
