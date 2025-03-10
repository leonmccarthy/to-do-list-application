<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    //ADD TASK
    public function addTask(Request $request){

            $validator = Validator::make($request->all(), [
                'taskTitle'=>'required|string|min:3|max:255|unique:tasks',
                'taskDescription'=>'required|string|min:3|max:255',
                'taskPriority'=>'required|string|min:3|max:255',
            ]);

            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }else{
                Task::create([
                    'taskTitle'=>$request->input('taskTitle'),
                    'taskDescription'=>$request->input('taskDescription'),
                    'taskPriority'=>$request->input('taskPriority'),
                    'taskOwner'=>Auth::user()->name,
                ]);

                return redirect()->route('my-tasks')->with('success', 'Task added successfully');
            }
    }

    // VIEW TASKS
    public function viewAllTask(){
        $tasks = Task::where('taskOwner', '=', Auth::user()->name)->get();
        return view('view-to-do-tasks', compact('tasks'));
    }

    // EDIT TASK VIEW
    public function editTaskView($id){
        $task = Task::find($id);
        return view('edit-tasks', compact('task'));
    }

    // EDIT TASK ACTION
    public function editTaskAction(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'taskTitle'=>'required|string|min:3|max:255',
            'taskDescription'=>'required|string|min:3|max:255',
            'taskPriority'=>'required|string|min:3|max:255',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }else{
            Task::where('id', $id)->update([
                'taskTitle'=>$request->input('taskTitle'),
                'taskDescription'=>$request->input('taskDescription'),
                'taskPriority'=>$request->input('taskPriority'),
            ]);

            return redirect()->route('my-tasks')->with('success', 'Task updated successfully!');
        }
    }

    // DELETE TASK
    public function deleteTask($id){
        Task::where('id', $id)->delete();
        return redirect()->route('my-tasks')->with('success', 'Task deleted successfully!');
    }
}
