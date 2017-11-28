<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TaskController extends Controller
{
  public function index(){
    
    $tasks = Task::latest()->get();

    return view('welcome', compact('tasks'));
  }

  public function create(){
    return view('add');
  }

  public function store(){
    
  }
}
