<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use App\Http\Resources\Task as TaskResource;

class TaskController extends Controller
{
  
  /**
     * Display a listing of the resource.
     *
     * @return Response
     */
  public function index(){
    
    $tasks = Task::latest()->get();

    return view('welcome', compact('tasks'));
  }

  public function create(){
    return view('add');
  }

  public function store(Request $request){
    $this->validate($request, [
      'title' => 'required',
      'description' => 'required'
    ]);
    
    $task = new Task;
    
    $task->title = $request->input("title");
    $task->body = $request->input("description");
    $task->save();
    
    return redirect("/")->with("success", "Task Created");
  }
  
  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
      $task = Task::findOrFail($id);

      return view('edit')->withTask($task);
    }
    
    public function show ($id)
    {
        return new TaskResource(Task::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
      $this->validate($request, [
        'title' => 'required',
        'description' => 'required'
      ]);
      
      Task::find($id)->update($request->all());
      
      return redirect("/")->with('success','Article updated successfully');
    }
}
