<!doctype html>
<html lang="en">

<head>
    @include('includes.css')
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                @include('includes.logo')
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    @include('includes.sidebar')
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                @include('includes.header')
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                <!--  Row 1 -->
                @yield('container')
                @include('includes.footer')
            </div>
        </div>
    </div>
    @include('includes.script')
</body>

</html>
