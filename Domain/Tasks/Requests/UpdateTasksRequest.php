<?php

namespace Domain\Tasks\Requests;

use Domain\Tasks\DTO\TaskDTO;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTasksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'required|int|exists:tasks,id',
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
