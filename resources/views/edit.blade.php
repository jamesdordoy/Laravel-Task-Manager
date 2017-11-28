@extends("layout")

@section("content")
  
  <div id="main" class="container">
    <h1>Edit Task</h1>
    <task-form task="{{ $task }}" action="edit" csrf='{{ csrf_field() }}'></task-form>
    
  </div>
  
@endsection

@section('templates')
  
  
@endsection

@section('scripts')
  <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
  <!-- <script src="/js/edit.js"></script> -->
@endsection
