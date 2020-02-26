<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request){
       

        $task = new Task;

        $this->validate($request,[
            'email'=>'required|max:100|min:10',
        ]);
        $task->task=$request->email;
        $task->save();

        $data=Task::all();
        //dd($data);
        return view('tasks')->with('email',$data);

}

public function updatetaskasfriend($id){
    $task=Task::find($id);
    $task->isfriend=1;
    $task->save();
    return redirect()->back();
}

public function updatetasksnotfriend($id){
    $task=Task::find($id);
    $task->isfriend=0;
    $task->save();
    return redirect()->back();

}
public function deletefriend($id){
    $task=Task::find($id);
    
    $task->delete();
    return redirect()->back();

}

    
}
