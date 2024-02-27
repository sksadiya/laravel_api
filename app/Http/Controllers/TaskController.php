<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function get_all_tasks(Request $request)
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function create_tasks(Request $request)
    {
        $task = Task::create($request->all());
        return response()->json($task);
    }

    public function delete_tasks($id) {
        $task = Task::find($id);
        $task->delete();
        $response = [
            "message"=> "deleted successfully",
            "status"=>200,
            "data"=> $task,
        ];

        return response()->json($response);
    }

    public function update_tasks(Request $request, $id)
    {
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found', 'status' => 404], 404);
        }
        $task->update($request->all());
        $response = [
            "message" => "updated successfully",
            "status" => 200,
            "data" => $task,
        ];
        return response()->json($response);
    }
}
