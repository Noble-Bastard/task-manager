<?php

namespace Domain\Tasks\Interfaces;

use Domain\Tasks\DTO\TaskDTO;
use Domain\Tasks\Models\Task;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

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
     * @return Builder
     */
    public function getByUserId(int $id): Builder;

    /**
     * @return Collection
     */
    public function all(): Collection;
}
