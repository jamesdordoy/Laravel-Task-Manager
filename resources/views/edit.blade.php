@extends("layout")

@section("content")
  
  <div id="main" class="container">
    <h1>Edit Task</h1>
    
    <task-form 
      task="{{ $task }}"
      action="PUT"
      csrf='{{ csrf_field() }}'>
    </task-form>
    
  </div>
  
@endsection

@section('templates')
  
  
@endsection

@section('scripts')
@endsection
