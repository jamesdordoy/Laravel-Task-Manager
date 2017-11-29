@extends("layout")

@section("content")
  
  <div id="main" class="container">
    <h1>Add New Task</h1>
    <task-form 
      task=""
      action="POST">
    </task-form>
  </div>
  
@endsection

@section('templates')
  
  
@endsection

@section('scripts')
  <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
  <script src="/js/add.js"></script>
@endsection
