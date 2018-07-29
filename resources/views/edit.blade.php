@extends("layout")

@section("content")

  <h1>Edit Task</h1>
    
  <task-form 
    task="{{ $task }}"
    action="PUT">
  </task-form>
  
@endsection

@section('templates')
  
  
@endsection

@section('scripts')
@endsection
