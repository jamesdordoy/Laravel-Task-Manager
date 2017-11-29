@extends("layout")

@section('content')
  
  <div id="main" class="container">
    
    @if (session("success"))
      <result-dialog type="success">Values Added</result-dialog>
    @endif
    
    <tasks :json="{{ $tasks }}"></tasks>
  </div>
  
@endsection

@section('templates')

@endsection

@section('scripts')
@endsection
