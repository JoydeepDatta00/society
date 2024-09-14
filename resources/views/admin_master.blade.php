<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    @include('links.head')
</head>

<body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">



        @include('body.header')

        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->
        @include('body.sidebar')



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            @yield('admin')
            <!-- End Page-content -->


            @include('body.footer')

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->

    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    @include('links.footerlink')

    <!-- Toster -->


</body>

</html>
