@extends('layouts.dashboard')
@section('content')
    
    <!-- Content -->
    <clients-index></clients-index>
    <!-- End Content -->
    
@endsection
@section('scripts')

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
@endsection