<?php

namespace Domain\Tasks\Services;

use Domain\Tasks\DTO\TaskDTO;
use Domain\Tasks\Interfaces\TaskRepository;
use Domain\Tasks\Interfaces\TaskService;
use Domain\Tasks\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class TaskServiceImplementation implements TaskService
{

    public function __construct(private readonly TaskRepository $taskRepository)
    {
    }

    public function getTask(int $id): ?Task
    {
        return $this->taskRepository->findById($id);
    }

    public function create(TaskDTO $taskDTO): Task
    {
        return $this->taskRepository->save($taskDTO);
    }

    public function delete(int $taskId): bool
    {
        return $this->taskRepository->delete($taskId);
    }

    public function getByUserId(int $id): Builder
    {
        return $this->taskRepository->findByUser($id);
    }

    public function all(): Collection
    {
        return $this->taskRepository->all();
    }

    /**
     * @param TaskDTO $taskDTO
     * @return Task
     */
    public function update(TaskDTO $taskDTO): Task
    {
        return $this->taskRepository->update($taskDTO);
    }
}
