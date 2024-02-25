@extends('admin.layout.master')
@section('style')
    <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-admin-template/">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('be/assetsCopy/vendor/fonts/boxicons.css')}}" />
    <link rel="stylesheet" href="{{asset('be/assetsCopy/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{asset('be/assetsCopy/vendor/fonts/flag-icons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('be/assetsCopy/vendor/css/rtl/core.css')}}"  />
{{--    class="template-customizer-core-css" và  class bất ổn class="template-customizer-theme-css"  --}}
    <link rel="stylesheet" href="{{asset('be/assetsCopy/vendor/css/rtl/theme-default.css')}}"  />
    <link rel="stylesheet" href="{{asset('be/assetsCopy/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('be/assetsCopy/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('be/assetsCopy/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('be/assetsCopy/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->
    <!-- Helpers -->
    <script src="{{asset('be/assetsCopy/vendor/js/helpers.js')}}"></script>
    <script src="{{asset('be/assetsCopy/vendor/js/template-customizer.js')}}"></script>
    <script src="{{asset('be/assetsCopy/js/config.js')}}"></script>
@endsection
@section('content')
    <div class="flex-grow-1 container-p-y">
        <div class="row">
            <!-- Customer Ratings -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="col-md-8 w-100">
                        <div class="card-header d-flex align-items-center justify-content-between mb-4">
                            <h5 class="card-title m-0 me-2">Dịch vụ hàng đầu theo <span class="text-primary">doanh số</span></h5>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @php
                                    $images = [
                                        'be/assetsCopy/img/icons/unicons/oneplus.png',
                                        'be/assetsCopy/img/icons/unicons/watch-primary.png',
                                        'be/assetsCopy/img/icons/unicons/surface.png',
                                        'be/assetsCopy/img/icons/unicons/iphone.png',
                                        'be/assetsCopy/img/icons/unicons/earphone.png',
                                    ];
                                @endphp
                                @foreach($totalPrices as $index => $totalPrice)
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            @if(isset($images[$index]))
                                                <img src="{{ asset($images[$index]) }}" alt="image-{{ $index }}">
                                            @endif
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">{{ $totalPrice['name'] }}</h6>
                                                {{-- <small class="text-muted d-block mb-1">{{ $totalPrice['description'] }}</small> --}}
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-1">
                                                <span class="fw-medium">{{ number_format($totalPrice['total_price'], 0, ',', '.') }} VNĐ</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Customer Ratings -->
            <!-- Overview & Sales Activity -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="col-md-8 w-100">
                        <div class="card-header d-flex align-items-center justify-content-between mb-4">
                            <h5 class="card-title m-0 me-2">Dịch vụ hàng đầu theo <span class="text-primary">số lượng</span></h5>
                        </div>
                        <div class="card-body">
                            <ul class="p-0 m-0">
                                @php
                                    $images = [
                                        'be/assetsCopy/img/icons/unicons/laptop-secondary.png',
                                        'be/assetsCopy/img/icons/unicons/computer.png',
                                        'be/assetsCopy/img/icons/unicons/watch.png',
                                        'be/assetsCopy/img/icons/unicons/oneplus-success.png',
                                        'be/assetsCopy/img/icons/unicons/pixel.png',
                                    ];
                                @endphp
                                @foreach($totalOccurrences as $index => $totalOccurrence)
                                    <li class="d-flex mb-4 pb-1">
                                        <div class="avatar flex-shrink-0 me-3">
                                            @if(isset($images[$index]))
                                                <img src="{{ asset($images[$index]) }}" alt="image-{{ $index }}">
                                            @endif
                                        </div>
                                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="me-2">
                                                <h6 class="mb-0">{{$totalOccurrence['name']}}</h6>
{{--                                                <small class="text-muted d-block mb-1">{{$totalOccurrence['description']}}</small>--}}
                                            </div>
                                            <div class="user-progress d-flex align-items-center gap-3">
                                                <span class="fw-medium badge bg-label-success">{{$totalOccurrence['total_occurrences']}}</span>
{{--                                                <span class="badge bg-label-success">+12.4%</span>--}}
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Overview & Sales Activity -->
            <div class="col-12 col-md-12 col-lg-4">
                <div class="row">
                    <div class="col-sm-6 col-md-3 col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body pb-0">
                                <span class="d-block fw-medium mb-1">Phiên</span>
                                <h3 class="card-title mb-2">2,845</h3>
                            </div>
                            <div id="sessionsChart" class="mb-3"></div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between mb-4">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('be/assetsCopy/img/icons/unicons/cube-secondary.png') }}" alt="cube" class="rounded">
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1">Đặt lịch</span>
                                <h4 class="card-title fs-5 mb-2">{{ number_format($revenueCurrentMonth['total'], 0, ',', '.') }} VNĐ</h4>
{{--                                <h4 class="card-title fs-5 mb-2">500.000.000 VNĐ</h4>--}}
                                @if ($percentChange !== null)
                                    @if ($revenueCurrentMonth['total'] > $revenueLastMonth['total'])
                                        <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i>+{{number_format($percentChange[0]['percentage'],2) }}%</small>
                                    @elseif ($revenueCurrentMonth['total'] < $revenueLastMonth['total'])
                                        <small class="text-danger fw-medium"><i class='bx bx-down-arrow-alt'></i> {{ number_format($percentChange[0]['percentage'],2) }}%</small>
                                    @else
                                        <small class="text-muted fw-medium"><i class='bx bx-minus'></i> 0%</small>
                                    @endif
                                @else
                                    <small class="text-muted fw-medium"><i class='bx bx-minus'></i> N/A</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-column">
                                        <div class="card-title mb-auto">
                                            <h5 class="mb-0">Khách hàng tiềm năng được tạo</h5>
                                            <small>Báo cáo hàng tháng</small>
                                        </div>
                                        <div class="chart-statistics">
                                            <div data-last_month=""></div>
                                            <input type="hidden" class="userCounts_lastMonth" value="{{$lastMonthData['count']}}">
                                            <input type="hidden" class="userCounts_currentMonth" value="{{$currentMonthData['count']}}">
                                            <input type="hidden" class="percentChangeUser" value="{{number_format($percentChangeUser,2) }}">

                                            <h3 class="card-title mb-1">{{$currentMonthData['count']}}</h3>
                                            @if ($userCounts !== null)
                                                @if ($currentMonthData['count'] > $lastMonthData['count'])
                                                    <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i>+{{number_format($percentChangeUser,2) }}%</small>
                                                @elseif ($currentMonthData['count'] < $lastMonthData['count'])
                                                    <small class="text-danger fw-medium"><i class='bx bx-down-arrow-alt'></i> {{ number_format($percentChangeUser,2) }}%</small>
                                                @else
                                                    <small class="text-muted fw-medium"><i class='bx bx-minus'></i> 0%</small>
                                                @endif
                                            @else
                                                <small class="text-muted fw-medium"><i class='bx bx-minus'></i> N/A</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="leadsReportChart">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Sales Analytics -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div>
                            <h5 class="card-title m-0 me-2 mb-2">Phân tích đặt lịch</h5>
                            <span class="badge bg-label-success me-1">+42.6%</span> <span>Than last year</span>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <div id="salesAnalyticsChart"></div>
                    </div>
                </div>
            </div>
            <!--/ Sales Analytics -->
            <!-- Earning Reports -->
            <div class="col-md-6 col-lg-4 col-xl-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Báo cáo thu nhập</h5>
                            <small class="text-muted">Tổng quan về thu nhập hàng tuần</small>
                        </div>
                    </div>
                    <div class="card-body pb-0">
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-primary"><i class='bx bx-trending-up'></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Net Profit</h6>
                                        <small class="text-muted">12.4k Sales</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-medium">$1,619</small><i class='bx bx-chevron-up text-success ms-1'></i> <small class="text-muted">18.6%</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-success"><i class='bx bx-dollar'></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total Income</h6>
                                        <small class="text-muted">Sales, Affiliation</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-medium">$3,571</small><i class='bx bx-chevron-up text-success ms-1'></i> <small class="text-muted">39.6%</small>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded bg-label-secondary"><i class='bx bx-credit-card'></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Total Expenses</h6>
                                        <small class="text-muted">ADVT, Marketing</small>
                                    </div>
                                    <div class="user-progress">
                                        <small class="fw-medium">$430</small><i class='bx bx-chevron-up text-success ms-1'></i> <small class="text-muted">52.8%</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div id="reportBarChart"></div>
                    </div>
                </div>
            </div>
            <!--/ Earning Reports -->



            <!-- Sales Stats -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between mb-30">
                        <h5 class="card-title m-0 me-2">Thống kê lịch đặt</h5>
                    </div>
                    <div id="salesStats"></div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <div class="d-flex align-items-center lh-1 mb-3 mb-sm-0">
                                <span class="badge badge-dot bg-success me-2"></span> Tỉ lệ chuyển đổi
                            </div>
                            <div class="d-flex align-items-center lh-1 mb-3 mb-sm-0">
                                <span class="badge badge-dot bg-label-secondary me-2"></span> Tổng số yêu cầu
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sales Stats -->
        </div>
    </div>
@endsection

@section('script')

    <!-- Vendors JS -->
    <script src="{{asset('be/assetsCopy/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('be/assetsCopy/js/main.js')}}"></script>
    <!-- Page JS -->
    <script src="{{asset('be/assetsCopy/js/dashboards-crm.js')}}"></script>

@endsection


