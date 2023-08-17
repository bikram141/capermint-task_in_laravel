<!DOCTYPE html>
<html lang="en">
    <head>
      @include('admin.layout.header')
    </head>
    <body class="sb-nav-fixed">
      @include('admin.layout.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
             @include('admin.layout.sidebar')
            </div>
         
            <div id="layoutSidenav_content">
               @yield('content')
               
            <br>
               @include('admin.layout.footer')
             
        </div>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> --}}
        <script src="{{asset('admin/js/scripts.js')}}"></script>
      
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/datatables-simple-demo.js')}}"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
        <script type="text/javascript">
          $('#summernote').summernote({
          height: 200
          });
          </script>

    
    </body>
</html>
