@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">

                            <a href="#" class="dropdown-item">Action</a>

                            <a href="#" class="dropdown-item">Another action</a>

                            <a href="#" class="dropdown-item">Something else</a>

                            <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0">Daily Sales</h4>

                    <div class="widget-chart text-center">
                        <div id="morris-donut-example" dir="ltr" style="height: 245px"
                                 class="morris-chart"></div>
                        <ul class="list-inline chart-detail-list mb-0">
                            <li class="list-inline-item">
                                <h5 style="color: #ff8acc "><i class="fa fa-circle me-1"></i>Series A</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 style="color: #5b69bc"><i class="fa fa-circle me-1"></i>Series B</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">

                            <a href="#" class="dropdown-item">Action</a>

                            <a href="#" class="dropdown-item">Another action</a>

                            <a href="#" class="dropdown-item">Something else</a>

                            <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <h4 class="header-title mt-0">Statistics</h4>
                    <div id="morris-bar-example" dir="ltr" style="height: 280px" class="morris-chart"></div>
                </div>
            </div>
        </div>

        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">

                            <a href="#" class="dropdown-item">Action</a>

                            <a href="#" class="dropdown-item">Another action</a>

                            <a href="#" class="dropdown-item">Something else</a>

                            <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <h4 class="header-title mt-0">Total Revenue</h4>
                    <div id="morris-line-example" dir="ltr" style="height: 280px" class="morris-chart"></div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- knob plugin -->
    <script src="{{asset('be/assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
    <!--Morris Chart-->
    <script src="{{asset('be/assets/libs/morris.js06/morris.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/raphael/raphael.min.js')}}"></script>
    <!-- Dashboar init js-->
    <script src="{{asset('be/assets/js/pages/dashboard.init.js')}}"></script>
@endsection

