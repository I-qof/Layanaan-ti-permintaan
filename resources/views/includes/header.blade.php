 <!-- partial:partials/_navbar.html -->
 <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
     <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
         <div>
             <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                 <span class="icon-menu"></span>
             </button>
         </div>
         <div>
             <a class="navbar-brand brand-logo" href="index.html">
                 <img src="{{ URL::asset('assets/images/pusrilogo.png') }}" alt="logo" />
             </a>
             <a class="navbar-brand brand-logo-mini" href="index.html">
                 <img src="{{ URL::asset('assets/images/pusrilogo.png') }}" alt="logo" />
             </a>
         </div>
     </div>
     <div class="navbar-menu-wrapper d-flex align-items-top">
         <ul class="navbar-nav">
             <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                 <h1 class="welcome-text">Halo, <span class="text-black fw-bold">{{ Auth::user()->name }}</span></h1>
                 <h3 class="welcome-sub-text">Selamat datang kembali, mari lihat aduan kamu! </h3>
             </li>
         </ul>
         <ul class="navbar-nav ms-auto">
             
             <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                 <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                     aria-expanded="false">
                     <img class="img-xs rounded-circle" src="{{ URL::asset('assets/images/pusrilogo.png') }}" style="width: 40px;height: 40px;" alt="Profile image"> </a>
                 <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                     <div class="dropdown-header text-center">
                         <img class="img-md rounded-circle" src="{{ URL::asset('assets/images/pusrilogo.png') }}" style="width: 40px;height: 40px;" alt="Profile image">
                         <p class="mb-1 mt-3 font-weight-semibold">{{ Auth::user()->name }}</p>
                         <p class="fw-light text-muted mb-0">{{ Auth::user()->email }}</p>
                     </div>
                     {{-- <a class="dropdown-item"><i
                             class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span
                             class="badge badge-pill badge-danger">1</span></a> --}}
                     
                     <a class="dropdown-item" href="{{ url('/') }}"><i
                             class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i>Menu Utama</a>
                     <a class="dropdown-item " href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();"><i
                             class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign
                         Out</a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                 </div>
             </li>
         </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
             data-bs-toggle="offcanvas">
             <span class="mdi mdi-menu"></span>
         </button>
     </div>
 </nav>
