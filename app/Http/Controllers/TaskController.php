<?php

namespace App\Http\Controllers;

use App\Http\Repositories\TaskRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private TaskRepository $taskRepository;
    private UserRepository $userRepository;

    public function __construct(TaskRepository $taskRepository, UserRepository $userRepository)
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $tasks = $this->taskRepository->getAllTasks();
        return response()->json($tasks);
    }

    public function show($id)
    {
        $task = $this->taskRepository->getTaskById($id);
        return response()->json($task);
    }

    public function store(Request $request)
    {
        $this->taskRepository->addTask($request->all());
    }

    public function update(Request $request, $id)
    {
        $this->taskRepository->updateTask($request->all(), $id);
    }

    public function destroy($id)
    {
        $this->taskRepository->deleteTask($id);
    }

    public function taskDetail($id)
    {
        $arg = ['task' => $this->taskRepository->getTaskById($id)[0]];
        if (auth()->check())
            $arg['username'] = $this->userRepository->getAuthUserNameById();
        return view('task.update-task', $arg);
    }

    public function updateTask(Request $request, $id)
    {
        $this->taskRepository->updateTask($request->all(), $id);
        return redirect()->route('update-task', $id);
    }
}
