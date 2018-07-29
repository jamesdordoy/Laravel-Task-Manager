@extends("layout")

@section("content")
  <task-form 
    :users="{{ $users }}"
    action="POST">
  </task-form>
@endsection

@section('templates')
  
  
@endsection

@section('scripts')

@endsection
