<!doctype html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="sidebar-mini">

    <!-- Page Loader -->
    {{-- <div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ URL::asset('assets/images/pusri.png') }}" width="200"></div>
        <p>Please wait...</p>
    </div>
</div> --}}
    <!-- Overlay For Sidebars -->

    <div class="container-scroller">

        @include('includes.header')


        <div class="container-fluid page-body-wrapper">
            @include('includes.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')

                </div>
                @include('includes.footer')
            </div>
        </div>
    </div>

    </div>

    <!-- Javascript -->
    @include('includes.script')
</body>

</html>
