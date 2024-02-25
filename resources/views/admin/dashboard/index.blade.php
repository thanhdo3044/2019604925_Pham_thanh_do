@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Daily Sales</h4>

                    <div class="widget-chart text-center">
                        <div id="dailySales" dir="ltr" style="height: 245px"
                                 class="morris-chart"></div>
                        <ul class="list-inline chart-detail-list mb-0">
                            <li class="list-inline-item">
                                <h5 style="color: #ff8acc "><i class="fa fa-circle me-1"></i>Users</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 style="color: #5b69bc"><i class="fa fa-circle me-1"></i>Bookings</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 style="color: #35b8e0"><i class="fa fa-circle me-1"></i>Booking Results</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Statistics</h4>
                    <div id="dataSixMonths" dir="ltr" style="height: 280px" class="morris-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0">Tổng doanh thu</h4>
                    <div id="monthlyRevenue" dir="ltr" style="height: 280px" class="morris-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-3">Nhân viên</h4>
                    <div class="inbox-widget">

                    </div>
                </div>
            </div>

        </div><!-- end col -->

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mt-0 mb-3">Lịch đặt mới nhất</h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>User</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Stylist</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div><!-- end col -->

    </div>
@endsection

@section('script')
    <script src="{{asset('be/assets/libs/moment/min/moment.min.js')}}"></script>
    <!-- knob plugin -->
    <script src="{{asset('be/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
    <!--Morris Chart-->
    <script src="{{asset('be/assets/libs/morris.js06/morris.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/raphael/raphael.min.js')}}"></script>
    <!-- Dashboar init js-->
    <script src="{{asset('be/assets/js/pages/dashboard.init.js')}}"></script>
    <script>
        $(document).ready(function (){
            $.ajax({
                url: '/api/dailySales',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    Morris.Donut({
                        element: 'dailySales',
                        data: [
                            {label: "Users", value: res.totalUser},
                            {label: "Bookings", value: res.totalBooking},
                            {label: "Booking Results", value: res.totalResult},
                        ],
                        colors: ["#ff8acc","#5b69bc","#35b8e0"]

                    });
                },
                error: function ( error) {
                    console.log(error);
                }
            });

            $.ajax({
                url: '/api/dataSixMonths',
                method: 'GET',
                dataType: 'json',
                success: function (res) {

                    Morris.Bar({
                        element: 'dataSixMonths',
                        data: res,
                        xkey: 'month',
                        ykeys: ['user_count', 'stylist_count'],
                        labels: ['Users', 'Stylists']
                    });
                },
                error: function ( error) {
                    console.log(error);
                }
            });

            $.ajax({
                url: '/api/monthlyRevenue',
                method: 'GET',
                dataType: 'json',
                success: function (res) {

                    Morris.Area({
                        element: 'monthlyRevenue',
                        data: res,
                        xkey: 'month',
                        ykeys: ['revenue'],
                        labels: ['revenue'],
                        hideHover: 'auto',
                        parseTime: false
                    });
                },
                error: function ( error) {
                    console.log(error);
                }
            });

            $.ajax({
                url: '/api/latestStylist',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    const latestStylist = document.querySelector('.inbox-widget')
                    latestStylist.innerHTML = '';
                    for (const value of res) {
                        latestStylist.innerHTML += `<div class="inbox-item">
                                                        <a href="#">
                                                            <div class="inbox-item-img"><img src="${value.image}" class="rounded-circle" alt=""></div>
                                                            <h5 class="inbox-item-author mt-0 mb-1">${value.name}</h5>
                                                            <p class="inbox-item-text">${value.excerpt}</p>
                                                            <p class="inbox-item-date">${ moment(value.created_at).format('LT')}</p>
                                                        </a>
                                                    </div> `;
                    }
                },
                error: function ( error) {
                    console.log(error);
                }
            });

            $.ajax({
                url: '/api/latestBooking',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    const latestBooking = document.querySelector('.table tbody');
                    latestBooking.innerHTML = '';
                    for (const value of res.data) {
                        latestBooking.innerHTML += `<tr>
                                                        <td>${value.id}</td>
                                                        <td>${value.user}</td>
                                                        <td>${value.date}</td>
                                                        <td>${value.status}</td>
                                                        <td>${value.stylist}</td>
                                                    </tr>
                                                    `;
                    }
                },
                error: function ( error) {
                    console.log(error);
                }
            });


        })


    </script>
@endsection

