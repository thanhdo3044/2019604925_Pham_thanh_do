<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8"/>
    <title>Dashboard | Adminto - Responsive Admin Dashboard Template</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description"/>
    <meta content="Coderthemes" name="author"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('be/assets/images/logovop.png')}}">

    @yield('link_css')
    <!-- App css -->
    <link href="{{asset('be/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style"/>

    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{asset('be/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"/>
{{--    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />--}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>


<!-- body start -->
<body class="loading" data-layout-color="light" data-layout-mode="default" data-layout-size="fluid"
      data-topbar-color="light" data-leftbar-position="fixed" data-leftbar-color="light" data-leftbar-size='default'
      data-sidebar-user='true'>
@yield('style')
<!-- Begin page -->
<div id="wrapper">


    <!-- Topbar Start -->
    @include('admin.layout.partials.topbar')
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.layout.partials.sidebar')

    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

{{--                <div id="app">--}}

{{--                </div>--}}
                @yield('content')
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->

        <!-- Footer Start -->
        @include('admin.layout.partials.footer')
        <!-- end Footer -->

    </div>
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
@include('admin.layout.partials.right_sidebar')

<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor -->
<script src="{{asset('be/assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('be/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('be/assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('be/assets/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('be/assets/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('be/assets/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
<script src="{{asset('be/assets/libs/feather-icons/feather.min.js')}}"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')
<script src="{{asset('js/jsAdmin/notification.js')}}"></script>

<script src="{{asset('be/assets/js/app.min.js')}}"></script>
<script>
    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#cmt_anh").change(function () {
            readURL(this, '#anh_the_preview');
        });

    });
    </script>
</body>
</html>
