<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('admin.shares.head')

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    @include('admin.shares.top')
    @include('admin.shares.menu')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <section id="dashboard-ecommerce">
                    <div class="row match-height">
                        @yield('title')
                    </div>
                    <div class="row match-height">
                        @yield('content')
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('admin.shares.foot')
    @include('admin.shares.bot')
    @yield('js')
</body>
</html>
