<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perpustakaan</title>
        
        <link rel="shortcut icon" type="image/png" href="{{ asset('admin/assets/img/LogoPerpus.png') }}"/>
        <script src="{{asset('https://unpkg.com/leaflet@1.8.0/dist/leaflet.js')}}" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-black bg-black">
            <!-- Navbar Brand-->
            
            <a class="navbar-brand ps-4" href="/"> <img src="{{asset('admin/assets/img/LogoPerpus.png')}}" width="30px" > <span>Library</span> </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-black" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        @if (Auth::user()->level == "admin")
                            <div class="sb-sidenav-menu-heading">Dashboard
                            </div>
                            <a class="nav-link" href="/">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i>
                                </div>
                                Dashboard
                            </a>
                            @endif
                            @if (Auth::user()->level == "admin")
                            <div class="sb-sidenav-menu-heading">Master</div>
                            <a class="nav-link" href="/buku">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Buku 
                            </a>
                            @endif
                            @if (Auth::user()->level == "admin")
                            <a class="nav-link" href="/pinjam">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Peminjaman
                            </a>
                            @endif
                            @if (Auth::user()->level == "admin")
                                <a class="nav-link" href="/user">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></i></div>
                                    User 
                                </a>
                            @endif
                            @if (Auth::user()->level == "user")
                            <div class="sb-sidenav-menu-heading">Peminjaman
                            </div>
                            <a class="nav-link" href="/pinjam_user">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
                                Peminjaman Buku
                            </a>
                            @endif
                        </div>

                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            
                    </div>
                        <div class="sb-sidenav-footer bg-black">
                            <div class="small">Selamat Datang</div>
                            {{ Auth::user()->name }}
                        </div>
                </nav>
            </div>
                        <div id="layoutSidenav_content">
                                @yield('content')
                        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/scripts.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('admin/js/datatables-simple-demo.js')}}"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

          <!-- Page level plugins -->
          <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js" integrity="sha512-U3hGSfg6tQWADDQL2TUZwdVSVDxUt2HZ6IMEIskuBizSDzoe65K3ZwEybo0JOcEjZWtWY3OJzouhmlGop+/dBg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          @yield('table')
          @yield('js')
          
    </body>
</html>
