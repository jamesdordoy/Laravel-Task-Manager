<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

use App\Http\Resources\Task as TaskResource;

class TaskController extends Controller
{
  
  public function home(){
    
    $tasks = Task::latest()->get();

    return view('welcome', compact('tasks'));
  }
  
  public function create(){
    return view('add');
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
  
  /**
     * Display a listing of the resource.
     *
     * @return Response
     */
  public function index(){
    
    return Task::latest()->get();
  }
  
  public function show ($id){
      return new TaskResource(Task::find($id));
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
     * Update the given Task.
     *
     * @param  Request  $request
     * @param  string  $id
     * @return Response
     */
    public function update(Request $request, $id){
      
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }
        
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->body = $request->input('body');
        if ($task->save()) {
            return $task;
        }
        throw new HttpException(400, "Invalid data");
    }
    
    public function destroy($id)
    {
        if (!$id) {
            throw new HttpException(400, "Invalid id");
        }
        $task = Task::find($id);
        $task->delete();
        return response()->json([
            'message' => 'task deleted',
        ], 200);
    }
}
