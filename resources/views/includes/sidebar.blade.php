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
           <li class="nav-item {{ Request::is(['permintaan/*', 'permintaan']) ? 'active' : '' }}">
               <a class="nav-link" data-bs-toggle="collapse" href="#ui-advanced" aria-expanded="false"
                   aria-controls="ui-advanced">
                   <i class="menu-icon mdi mdi-arrow-down-drop-circle-outline"></i>
                   <span class="menu-title">Permintaan</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="ui-advanced">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item {{ Request::is(['permintaan']) ? 'active' : '' }}"> <a
                               class="nav-link btnPermintaan">Request</a>
                       </li>
                       @can('permintaan-approve', Permintaaan::class)
                           <li class="nav-item {{ Request::is(['permintaan/approvedView']) ? 'active' : '' }}"> <a
                                   class="nav-link" href="{{ URL::to('/permintaan/approvedView') }}">Approve</a>
                           </li>
                       @endcan
                   </ul>
               </div>
           </li>
           @can('menu-user', User::class)
               <li class="nav-item nav-category">Master Data</li>
               <li
                   class="nav-item {{ Request::is(['user-role/*', 'user-role', 'role/*', 'permission/*', 'role', 'permission']) ? 'active' : '' }}">
                   <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false"
                       aria-controls="tables">
                       <i class="menu-icon mdi mdi-table"></i>
                       <span class="menu-title">User Management</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="tables">
                       <ul class="nav flex-column sub-menu">
                           @can('menu-userRole', User::class)
                               <li class="nav-item {{ Request::is(['user-role/*', 'user-role']) ? 'active' : '' }}"> <a
                                       class="nav-link" href="{{ route('user-role') }}">User Role</a>
                               </li>
                           @endcan
                           @can('menu-role', Role::class)
                               <li class="nav-item {{ Request::is(['role/*', 'role']) ? 'active' : '' }}"> <a class="nav-link"
                                       href="{{ route('role') }}">Role</a>
                               </li>
                           @endcan
                           @can('menu-permission', Permission::class)
                               <li class="nav-item {{ Request::is(['permission/*', 'permission']) ? 'active' : '' }}"> <a
                                       class="nav-link" href="{{ route('permission') }}">Permission</a></li>
                           @endcan

                       </ul>
                   </div>
               </li>
           @endcan
           @can('menu-master-data', Sperpat::class)
               <li
                   class="nav-item {{ Request::is(['status/*', 'jenis-barang/*', 'inventaris/*', 'departement/*', 'status', 'jenis-barang', 'inventaris', 'departement']) ? 'active' : '' }}">
                   <a class="nav-link" data-bs-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
                       <i class="menu-icon mdi mdi-google-maps"></i>
                       <span class="menu-title">Master Data</span>
                       <i class="menu-arrow"></i>
                   </a>
                   <div class="collapse" id="maps">
                       <ul class="nav flex-column sub-menu">
                           @can('menu-status', Status::class)
                               <li class="nav-item {{ Request::is(['status/*', 'status']) ? 'active' : '' }}"> <a
                                       class="nav-link" href="{{ url('/status') }}">status</a></li>
                           @endcan
                           @can('menu-jenis-barang', Jenis_barang::class)
                               <li class="nav-item {{ Request::is(['jenis-barang/*', 'jenis-barang']) ? 'active' : '' }}"> <a
                                       class="nav-link" href="{{ URL::to('/jenis-barang') }}">Data Barang</a>
                               </li>
                           @endcan
                           @can('menu-inventaris', Inventaris::class)
                               <li class="nav-item {{ Request::is(['inventaris/*', 'inventaris']) ? 'active' : '' }}"> <a
                                       class="nav-link" href="{{ URL::to('/inventaris') }}">Stock Masuk</a>
                               </li>
                               <li class="nav-item {{ Request::is(['inventaris/*', 'inventarisKeluar']) ? 'active' : '' }}"> <a
                                       class="nav-link" href="{{ URL::to('/inventarisKeluar') }}">Stock Keluar</a>
                               </li>
                           @endcan
                           {{-- @can('menu-departement', departement::class)
                               <li class="nav-item {{ Request::is(['departement/*','departement']) ? 'active' : '' }}"> <a class="nav-link"
                                       href="{{ URL::to('/departement') }}">departement</a>
                               </li>
                           @endcan --}}
                       </ul>
                   </div>
               </li>

           @endcan

       </ul>
   </nav>
