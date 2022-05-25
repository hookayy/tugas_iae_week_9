<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SinDu | @yield('title')</title>  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">    
  <link rel="stylesheet" href="{{ asset('css/font-awesome/all.min.css') }}">
  <script src="https://kit.fontawesome.com/f1223f01a6.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="{{ asset('css/overlayScrollbars/OverlayScrollbars.min.css') }}">   
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
  <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">          
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">  
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">      
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>      
      </ul>      
      <ul class="navbar-nav ml-auto">                        
        <li class="nav-item">
          <a class="nav-link" href="/">
            Direktorat Kemahasiswaan
          </a>
        </li>
      </ul>
    </nav>    
    <aside class="main-sidebar sidebar-dark-primary bg-indigo elevation-4">    
      <div class="sidebar">      
        <div class="text-center mt-4">
          <img src="{{ asset('img/admin.png') }}" class="rounded-circle elevation-2 img-cover" alt="User Image" width="50px" height="50px" >
          <a href="#" class="d-block mt-2" style="font-size:13px; color:white; font-weight:bold;">Admin Kemahasiswaan</a>
          <a href="#" class="d-block" style="font-size:11px; color:white; font-weight:lighter;"></a>
        </div>      
        <nav class="mt-3">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" >                
            <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('kesehatan') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>Kesehatan Mahasiswa</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('keaktifan') }}" class="nav-link">
                <i class="nav-icon fas fa-user-friends"></i>                
                <p>Keaktifan</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('kelulusan') }}" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>                
                <p>Kelulusan</p>
              </a>
            </li> 
            <li class="nav-item">
              <a href="{{ route('registrasi') }}" class="nav-link">
                <i class="nav-icon fas fa-donate"></i>                
                <p>Registrasi</p>
              </a>
            </li> 
          </ul>
        </nav>        
      </div>
    </aside>    
    <div class="content-wrapper">  
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>@yield('title-page')</h1>
            </div>          
          </div>
        </div>
      </section>
      <section class="content">
        <div class="container">
          @yield('content')  
        </div>        
      </section>    
    </div>      
  </div>
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/sidebar.js') }}"></script>
<script src="{{ asset('/js/demo.js') }}"></script>
<script src="{{ asset('/js/bs-custom-file-input.min.js') }}"></script>
<script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.0.js" integrity="sha256-0Nkb10Hnhm4EJZ0QDpvInc3bRp77wQIbIQmWYH3Y7Vw=" crossorigin="anonymous"></script>
</script>
</body>

</html>