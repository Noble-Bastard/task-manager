<?php

namespace Domain\Tasks\Requests;

use Domain\Tasks\DTO\TaskDTO;
use Illuminate\Foundation\Http\FormRequest;

class StoreTasksRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required|int|exists:users,id',
            'status' => 'required|string',
        ];
    }


    /**
     * @return TaskDTO
     */
    public function toDto(): TaskDTO
    {
        return new TaskDTO(...$this->validated());
    }
}
