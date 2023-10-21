<?php

namespace App\Policies;

use App\Models\User;
use Domain\Tasks\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TasksPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        // You can implement your authorization logic here.
        // For example, allow all authenticated users to create tasks.
        return true;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Task $tasks
     * @return Response|bool
     */
    public function update(User $user)
    {
        return true;

    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Task $tasks
     * @return Response|bool
     */
    public function delete(User $user, Task $tasks)
    {
        return true;

    }
}
