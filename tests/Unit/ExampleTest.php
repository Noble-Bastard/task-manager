<?php

namespace Tests\Unit;

use App\Models\User;
use Domain\Tasks\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexMethod()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('your_password_here'),
        ]);
        $this->actingAs($user);

        $task = Task::create([
            'title' => 'Sample Task',
            'description' => 'Task description',
            'status' => 'todo',
            'user_id' => $user->id,
        ]);

        // Test filtering by status
        $response = $this->get('/tasks?status=completed');
        $response->assertStatus(200);
        $response->assertViewHas('tasks', Task::where('user_id', $user->id)->where('status', 'completed')->paginate(10));

        // Test filtering by created_at
        $response = $this->get('/tasks?created_at=2023-01-15');
        $response->assertStatus(200);
        $response->assertViewHas('tasks', Task::where('user_id', $user->id)->whereDate('created_at', '2023-01-15')->paginate(10));

        // Test no filters
        $response = $this->get('/tasks');
        $response->assertStatus(200);
        $response->assertViewHas('tasks', Task::where('user_id', $user->id)->paginate(10));
    }

    public function testStoreMethod()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('your_password_here'),
        ]);
        $this->actingAs($user);


        $taskData = [
            'title' => 'New Task',
            'description' => 'Task description',
            'status' => 'todo',
            'user_id' => $user->id
        ];

        $response = $this->post('/tasks', $taskData);
        $response->assertStatus(200);
        $response->assertViewIs('tasks.show');
        $this->assertDatabaseHas('tasks', $taskData);
    }

    public function testShowMethod()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('your_password_here'),
        ]);
        $this->actingAs($user);

        $task = Task::create([
            'title' => 'Sample Task',
            'description' => 'Task description',
            'status' => 'todo',
            'user_id' => $user->id,
        ]);

        $response = $this->get('/tasks/' . $task->id);
        $response->assertStatus(200);
        $response->assertViewIs('tasks.show');
        $response->assertViewHas('task', $task);
    }

    public function testUpdateMethod()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('your_password_here'),
        ]);
        $this->actingAs($user);

        $task = Task::create([
            'title' => 'Sample Task',
            'description' => 'Task description',
            'status' => 'todo',
            'user_id' => $user->id,
        ]);

        $newData = [
            'id' => $task->id,
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'status' => 'completed',
            'user_id' => $user->id
        ];

        $response = $this->post('/tasks/update', $newData);
        $response->assertStatus(200);
        $response->assertViewIs('tasks.show');
        $this->assertDatabaseHas('tasks', $newData);
    }

    public function testDestroyMethod()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('your_password_here'),
        ]);
        $this->actingAs($user);

        $task = Task::create([
            'title' => 'Sample Task',
            'description' => 'Task description',
            'status' => 'todo',
            'user_id' => $user->id,
        ]);

        $response = $this->delete('/tasks/' . $task->id);
        $response->assertRedirect('/tasks');
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }


}
