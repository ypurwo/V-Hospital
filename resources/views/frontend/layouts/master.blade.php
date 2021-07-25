<!--Include Header Here-->
@include('frontend.layouts.header')
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
{{-- <body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns"> --}}

    <!-- BEGIN: Header-->
    @include('frontend.layouts.navheader')
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    @include('frontend.layouts.sidebar')
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
        @yield('content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('frontend.layouts.footer')

</body>
<!-- END: Body-->

</html>