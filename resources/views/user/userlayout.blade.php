<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>User Dashboard - Lumbini Amusement Park & Resort</title>
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
  <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css'); }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('vendor/select2/dist/css/select2.min.css'); }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css'); }}" rel="stylesheet" >
  <link href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css'); }}" rel="stylesheet" type="text/css">
  <link href="{{ URL::asset('css/user.min.css'); }}" rel="stylesheet">
  <script src="{{ URL::asset('vendor/jquery/jquery.min.js'); }}"></script>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
         Cpanel
        </div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item {{ request()->is('buytickets') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('buytickets') }}">
          <i class="fas fa-money-check"></i>
          <span>Buy tickets</span></a>
      </li>
      <li class="nav-item {{ request()->is('mytickets') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('mytickets') }}">
          <i class="fas fa-ticket-alt"></i>
          <span>My Tickets</span>
        </a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item" style="margin-top: 15em">
        <a class="nav-link">
          <span><img src="{{ URL::asset('img/logo/logo.png') }}" alt="Logo" style="height: 120px;display: block;margin: auto;"></span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link">
          <span><i class="fa fa-phone"></i> 985-7039218 </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link">
          <span><i class="fa fa-envelope"></i> info@lumbinifunpark.com </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link">
          <span><i class="fa fa-map-marker"></i> Belhaiya-1, Bhairahawa </span>
        </a>
      </li>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span style="margin-right: 10px;"> {{ date('F d (D), Y', strtotime(Carbon\Carbon::now())) }} </span>
                <span style="margin-right: 10px;"> {{ Auth::user()->name }} </span> <img class="img-profile rounded-circle" src="{{ URL::asset('img/boy.png'); }}" style="max-width: 60px">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/passwords/change">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
              <a href="{{ route('logout') }}" class="btn btn-info" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </div>
          </div>
        </div>
      </div>

        @yield('content')

      </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <script> document.write(new Date().getFullYear()); </script> - Developed by
              <b><a href="https://entiresoln.com/" target="_blank">Entire Business Solutions Pvt. Ltd.</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ URL::asset('vendor/select2/dist/js/select2.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js'); }}"></script>
  <script src="{{ URL::asset('vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js'); }}"></script>
  <script src="{{ URL::asset('js/user.min.js'); }}"></script>
</body>

</html>
