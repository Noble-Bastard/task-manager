<?php

namespace Domain\Tasks\Repositories;

use Domain\Tasks\DTO\TaskDTO;
use Domain\Tasks\Interfaces\TaskRepository;
use Domain\Tasks\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class TaskRepositoryImplementation implements TaskRepository
{

    /**
     * @param int $taskId
     * @return Task|null
     */
    public function findById(int $taskId): ?Task
    {
        /** @var Task $task */
        $task = Task::query()->find($taskId);

        return $task;
    }

    /**
     * @param int $taskId
     * @return bool
     */
    public function delete(int $taskId): bool
    {
        /** @var Task $task */
        $task = Task::query()->find($taskId);

        return $task->delete();
    }

    /**
     * @param int $userId
     * @return Builder
     */
    public function findByUser(int $userId): Builder
    {
        return Task::query()->where('user_id', $userId);
    }

    /**
     * @return mixed
     */
    public function all(): Collection
    {
        // TODO: add caching
        return Task::all();
    }

    /**
     * @param TaskDTO $taskDTO
     * @return Task
     */
    public function update(TaskDTO $taskDTO): Task
    {
        /** @var Task $task */
        $task = Task::query()->find($taskDTO->id);

        $task->title = $taskDTO->title;
        $task->description = $taskDTO->description;
        $task->status = $taskDTO->status;
        $task->user_id = $taskDTO->user_id;

        if (!$task->save()) {
            throw new UnprocessableEntityHttpException('Unprocessable entity');
        }

        return $task;
    }

    /**
     * @param TaskDTO $taskDTO
     * @return Task
     */
    public function save(TaskDTO $taskDTO): Task
    {
        $task = new Task();
        $task->title = $taskDTO->title;
        $task->description = $taskDTO->description;
        $task->status = $taskDTO->status;
        $task->user_id = $taskDTO->user_id;

        if (!$task->save()) {
            throw new UnprocessableEntityHttpException('Unprocessable entity');
        }

        return $task;
    }
}
