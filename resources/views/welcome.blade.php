@extends("layout")

@section('content')
  
  <div id="main" class="container">
    
    <result-dialog type="success">Heyy</result-dialog>
    
    <tasks :list="{{ $tasks }}"></tasks>
  </div>
  
@endsection

@section('templates')

@endsection

@section('scripts')
  <script src="/js/main.js"></script>
@endsection
