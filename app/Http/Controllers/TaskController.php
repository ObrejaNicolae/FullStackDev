<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function tasks(){
        $tasks = Task::all();
        return response()->json([
            'tasks' =>$tasks,
            'message'=>"Tasks",
            'code'=>200
        ]);
    }
    public function getTask($id){
        $tasks = Task::find($id);
        return response()->json($tasks);
    }
    public function saveTask(Request $request){
        $task = new Task;
        $task->name = $request->name;
        $task->description = $request->description;
        $task->save();
        return response()->json([
            'message'=>'Task Created Successfully',
            'code'=>200
        ]);
    }
    public function deleteTask($id){
        $task = Task::find($id);
        if($task){
            $task->delete();
            return response()->json([
                'message'=>'Task deleted Successfully',
                'code'=>200
            ]);
        }else{
            return response()->json([
                'message'=>"Task with id:$id does not exists" ,
            ]);
        }
    }
    public function updateTask(Request $request, $id){
        $task = DB::table('tasks')->where('id', $id)->first();
        if ($task) {
            DB::table('tasks')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
    
            return response()->json([
                'message' => 'Task Updated Successfully',
                'code' => 200
            ]);
        } else {
            return response()->json([
                'message' => "Task with id: $id does not exist",
            ]);
        }
    }
    
}
