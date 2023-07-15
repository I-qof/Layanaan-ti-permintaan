   <!-- partial -->
   <!-- partial:partials/_sidebar.html -->
   <nav class="sidebar sidebar-offcanvas" id="sidebar">
       <ul class="nav">
           <li class="nav-item {{ Request::is(['/home']) ? 'active' : '' }}">
               <a class="nav-link" href="{{ URL::to('/home') }}">
                   <i class="mdi mdi-grid-large menu-icon"></i>
                   <span class="menu-title">Dashboard</span>
               </a>
           </li>

           <li class="nav-item nav-category">Layanaan</li>
           @can('menu-aduan', Aduan::class)
           <li class="nav-item ">
               <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                   aria-controls="ui-basic">
                   <i class="menu-icon mdi mdi-floor-plan"></i>
                   <span class="menu-title">Pengaduan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="ui-basic">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item">
                           <a class="nav-link"
                               href="
                               {{ route('aduan') }}
                               ">Request</a>
                       </li>
                       {{-- <li class="nav-item"> <a class="nav-link"
                               href="
                               {{ URL::to('/aduan/report') }}
                               ">Laporan</a>
                       </li> --}}

                   </ul>
               </div>
           </li> 
           @endcan


           {{-- <li class="nav-item">
               <a class="nav-link" data-bs-toggle="collapse" href="#ui-advanced" aria-expanded="false"
                   aria-controls="ui-advanced">
                   <i class="menu-icon mdi mdi-arrow-down-drop-circle-outline"></i>
                   <span class="menu-title">Permintaan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="ui-advanced">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/permintaan/view') }}">Request</a>
                       </li>
                       <li class="nav-item"> <a class="nav-link" href="{{ URL::to('/permintaan/report') }}">Laporan</a>
                       </li>
                   </ul>
               </div>
           </li> --}}
           @can('menu-user', User::class)
               <li class="nav-item nav-category">Master Data</li>
               <li class="nav-item">
                   <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                       aria-controls="tables">
                       <i class="menu-icon mdi mdi-table"></i>
                       <span class="menu-title">User Management</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="tables">
                       <ul class="nav flex-column sub-menu">
                           @can('menu-userRole', User::class)
                               <li class="nav-item"> <a class="nav-link" href="{{ url('user-role/view') }}">User Role</a>
                               </li>
                           @endcan
                           @can('menu-role', Role::class)
                               <li class="nav-item"> <a class="nav-link" href="{{ url('role/view') }}">Role</a>
                               </li>
                           @endcan
                           @can('menu-permission', Permission::class)
                               <li class="nav-item"> <a class="nav-link" href="{{ url('permission/view') }}">Permission</a></li>
                           @endcan

                       </ul>
                   </div>
               </li>
           @endcan
           @can('menu-master-data', Sperpat::class)
               <li class="nav-item ">
                   <a class="nav-link" data-bs-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
                       <i class="menu-icon mdi mdi-google-maps"></i>
                       <span class="menu-title">Master Data</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="maps">
                       <ul class="nav flex-column sub-menu">
                           @can('menu-status', Status::class)
                               <li class="nav-item {{ Request::is(['status/*']) ? 'active' : '' }}"> <a class="nav-link"
                                       href="{{ url('/status/view') }}">status</a></li>
                           @endcan
                           @can('menu-jenis-barang', Jenis_barang::class)
                               <li class="nav-item {{ Request::is(['jenis-barang/*']) ? 'active' : '' }}"> <a class="nav-link"
                                       href="{{ URL::to('/jenis-barang/view') }}">Jenis Barang</a>
                               </li>
                           @endcan
                           @can('menu-inventaris', Inventaris::class)
                               <li class="nav-item {{ Request::is(['inventaris/*']) ? 'active' : '' }}"> <a class="nav-link"
                                       href="{{ URL::to('/inventaris/view') }}">Inventaris</a>
                               </li>
                           @endcan
                           @can('menu-sperpat', Sperpat::class)
                               <li class="nav-item {{ Request::is(['sperpat/*']) ? 'active' : '' }}"> <a class="nav-link"
                                       href="{{ URL::to('/sperpat/view') }}">sperpat</a>
                               </li>
                           @endcan
                       </ul>
                   </div>
               </li>

           @endcan

       </ul>
   </nav>
