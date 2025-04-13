<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest\CreateRequest;
use App\Http\Requests\TaskRequest\UpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        return Task::where('user_id', Auth::id())->get();
    }

    public function store(CreateRequest $request)
    {
        // use permissions policy to check if user can create task
        // $this->authorize('create', Task::class);
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        $task = Task::create($validated);

        return new TaskResource($task);
    }

    public function update(UpdateRequest $request, Task $task)
    {
        // use permissions policy to check if user can update task
        // $this->authorize('update', $task);

        $validated = $request->validated();

        $task->update($validated);

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        // use permissions policy to check if user can delete task
        // $this->authorize('delete', $task);
        $task->delete();

        return response()->json(['message' => 'Task deleted.']);
    }
}
