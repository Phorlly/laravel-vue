<x-laravel-ui-adminlte::adminlte-layout>

    <body class="hold-transition sidebar-collapse layout-top-nav">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
                <div class="container">
                    <a href="" class="navbar-brand">
{{--                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>--}}
                        <span class="brand-text font-weight-bold">KH-NOODLE</span>
                    </a>

                    <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                        <!-- Left navbar links -->
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('app') }}" class="nav-link  @yield('app')">
                                     <i class="nav-icon fas fa-indent"></i>
                                     <span class="size font-weight-bold">គ្រប់គ្រងម្ហូប</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="nav-icon fas fa-unlock-alt"></i>
                                    <span class="size font-weight-bold">ចាកចេញ</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                 @yield('content')
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- ./wrapper -->
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
