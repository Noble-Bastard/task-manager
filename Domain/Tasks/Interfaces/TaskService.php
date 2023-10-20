<?php

namespace Domain\Tasks\Interfaces;

use Domain\Tasks\DTO\TaskDTO;
use Domain\Tasks\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskService
{
    /**
     * @param int $id
     * @return Task|null
     */
    public function getTask(int $id): ?Task;

    /**
     * @param TaskDTO $taskDTO
     * @return Task
     */
    public function create(TaskDTO $taskDTO): Task;

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
     * @param int $id
     * @return Task|null
     */
    public function getByUserId(int $id): ?Task;

    /**
     * @return Collection
     */
    public function all(): Collection;
}
