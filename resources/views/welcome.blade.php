@extends("layout")

@section('content')
  
  <div id="main" class="container">
    
    @if (session("success"))
      <result-dialog type="success">Values Added</result-dialog>
    @endif
    
    <tasks :list="{{ $tasks }}"></tasks>
  </div>
  
@endsection

@section('templates')

@endsection

@section('scripts')
  <script src="/js/main.js"></script>
@endsection
