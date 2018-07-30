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
  public function index()
  {
    return Task::with('user')->latest()->get();
  }
  
  public function home(){
    
    $tasks = Task::with(['assignedTo'])->latest()->get();
    $taskData = $tasks->toArray();

    foreach ($taskData as $key => $task) {
        $taskData[$key]['user'] = $task['assigned_to']; 
    } 

    return view('home', [
        'tasks' => json_encode($taskData),
    ]);
  }
  
  public function create(){

    return view('add', [
        'users' => \App\User::orderBy("name", "asc")->get(),
    ]);
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
  

  public function show($id){
      return new TaskResource(Task::find($id));
  }

  public function store(Request $request){

    $this->validate($request, [
      'title' => 'required',
      'description' => 'required',
      'assigned_id' => 'required',
    ]);
    
    $task = new Task;
    
    $task->title = $request->input("title");
    $task->body = $request->input("description");
    $task->creator_id = \Auth::user()->id;
    $task->assigned_to_id = $request->input("assigned_id");
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
    
    
    public function complete(Request $request, $id){
      if (!$id) {
          throw new HttpException(400, "Invalid id");
      }
      
      $task = Task::find($id);
      $task->completed = 1;
      
      if ($task->save()) {
          return $task;
      }
      throw new HttpException(400, "Invalid data");
      
    }
    
    public function unComplete(Request $request, $id){
      if (!$id) {
          throw new HttpException(400, "Invalid id");
      }
      
      $task = Task::find($id);
      $task->completed = 0;
      
      if ($task->save()) {
          return $task;
      }
      throw new HttpException(400, "Invalid data");
      
    }
}
