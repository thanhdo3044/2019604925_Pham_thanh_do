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
{{--        class="template-customizer-core-css" và  class bất ổn class="template-customizer-theme-css"--}}
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
            @foreach($revenueByYear as $key=>$value)
                <input type="hidden" id="{{$key}}" value="{{$value['total']}}">
            @endforeach
{{--            @dd($resultlastYear);--}}
                @foreach($lastYear as $key=>$value)
                    <input type="hidden" id="lastYear_{{$key}}" value="{{$value['total']}}">
                @endforeach
            <!-- Total Income -->
            <div class="col-md-12 col-lg-8 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Tổng thu nhập</h5>
                                <small class="card-subtitle">Tổng quan về báo cáo hàng năm</small>
                            </div>
                            <div class="card-body">
                                <div id="totalIncomeChart"></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card-header d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title mb-0">Báo cáo</h5>
                                    <small class="card-subtitle">Trung bình hàng tháng. {{ number_format($averageRevenue, 0, ',', '.') }}₫
                                    </small>
                                </div>
                                <div class="dropdown">
                                    <button class="btn p-0" type="button" id="totalIncome" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalIncome">
                                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="report-list">
                                    <div class="report-list-item rounded-2 mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="report-list-icon shadow-sm me-2">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/svg/icons/paypal-icon.svg" width="22" height="22" alt="Paypal">
                                            </div>
                                            <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                                <div class="d-flex flex-column">
                                                    <span>Thu nhập</span>
                                                    <h5 class="mb-0">{{ "₫" . number_format($revenueCurrentMonth['total'] / 1000, 0, ',', '.') . "k" }}</h5>
                                                </div>
                                                @if ($revenueCurrentMonth['total'] > $revenueLastMonth['total'])
                                                    <small class="text-success">
                                                        +{{ "₫" . number_format(($revenueCurrentMonth['total'] - $revenueLastMonth['total']) / 1000, 0, ',', '.') . "k" }}
                                                    </small>

                                                @elseif ($revenueCurrentMonth['total'] < $revenueLastMonth['total'])
                                                    <small class="text-danger">
                                                        -{{ "₫" . number_format(($revenueCurrentMonth['total'] - $revenueLastMonth['total']) / 1000, 0, ',', '.') . "k" }}
                                                    </small>
                                                @else
                                                    <small class="text-muted">
                                                        0
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="report-list-item rounded-2 mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="report-list-icon shadow-sm me-2">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/svg/icons/shopping-bag-icon.svg" width="22" height="22" alt="Shopping Bag">
                                            </div>
                                            <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                                <div class="d-flex flex-column">
                                                    <span>Chi phí</span>
                                                    <h5 class="mb-0">{{ "₫" . number_format($expenseCurrentMonth / 1000, 0, ',', '.') . "k" }}</h5>
                                                </div>
                                                @if ($expenseCurrentMonth > $expenseLastMonth)
                                                    <small class="text-danger">
                                                        +   {{ "₫" . number_format(($expenseCurrentMonth - $expenseLastMonth) / 1000, 0, ',', '.') . "k" }}
                                                    </small>

                                                @elseif ($expenseCurrentMonth < $expenseLastMonth)
                                                    <small class="text-success">
                                                        -{{ "₫" . number_format(($expenseLastMonth - $expenseCurrentMonth) / 1000, 0, ',', '.') . "k" }}
                                                    </small>
                                                @else
                                                    <small class="text-muted">
                                                        0
                                                    </small>
                                                @endif
{{--                                                <small class="text-muted">{{ "₫" . number_format($expenseCurrentMonth / 1000, 0, ',', '.') . "k" }}</small>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="report-list-item rounded-2">
                                        <div class="d-flex align-items-start">
                                            <div class="report-list-icon shadow-sm me-2">
                                                <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/svg/icons/wallet-icon.svg" width="22" height="22" alt="Wallet">
                                            </div>
                                            <div class="d-flex justify-content-between align-items-end w-100 flex-wrap gap-2">
                                                <div class="d-flex flex-column">
                                                    <span>Lợi nhuận</span>
                                                    <h5 class="mb-0">
                                                        {{ "₫" . number_format(($revenueCurrentMonth['total'] - $expenseCurrentMonth) / 1000, 0, ',', '.') . "k" }}
                                                    </h5>
                                                </div>
                                                @if ($profitCurrentMonth > $profitLastMonth)
                                                    <small class="text-success">
                                                        +{{ "₫" . number_format(($profitCurrentMonth - $profitLastMonth) / 1000, 0, ',', '.') . "k" }}
                                                    </small>

                                                @elseif ($profitCurrentMonth < $profitLastMonth)
                                                    <small class="text-danger">
                                                        -{{ "₫" . number_format(($profitLastMonth - $profitCurrentMonth) / 1000, 0, ',', '.') . "k" }}
                                                    </small>
                                                @else
                                                    <small class="text-muted">
                                                        0
                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Total Income -->
            </div>
            <!--/ Total Income -->
            <!-- Performance -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Hiệu suất</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="performanceId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="performanceId">
                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <small>Thu nhập: <span class="fw-medium">
                                        {{ "₫" . number_format($revenueCurrentMonth['total'] / 1000, 0, ',', '.') . "k" }}
                                    </span></small>
                            </div>
                            <div class="col-6">

                            </div>
                        </div>
                    </div>
                    <div id="performanceChart"></div>
                </div>
            </div>
            <!--/ Performance -->

        </div>
        <div class="row">
            <!-- Conversion rate -->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Tỉ lệ chuyển đổi</h5>
                            <small class="text-muted">So với tháng trước</small>
                        </div>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="conversionRate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="conversionRate">
                                <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                                <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                                <a class="dropdown-item" href="javascript:void(0);">Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row align-items-center gap-1 mb-4">
                                <h2 class="mb-2">8.72%</h2>
                                <small class="text-success fw-medium">
                                    <i class='bx bx-chevron-up'></i>
                                    4.8%
                                </small>
                            </div>
                            <div id="conversionRateChart"></div>
                        </div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-4">
                                <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Số lần hiển thị</h6>
                                        <small class="text-muted">12.4k Lượt truy cập</small>
                                    </div>
                                    <div class="user-progress">
                                        <i class='bx bx-up-arrow-alt text-success me-2'></i> <span>12.8%</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4">
                                <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Đã thêm vào giỏ hàng</h6>
                                        <small class="text-muted">32 Sản phẩm trong giỏ hàng</small>
                                    </div>
                                    <div class="user-progress">
                                        <i class='bx bx-down-arrow-alt text-danger me-2'></i> <span>- 8.5% </span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex mb-4">
                                <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Thủ tục thanh toán</h6>
                                        <small class="text-muted">21 Kiểm tra sản phẩm</small>
                                    </div>
                                    <div class="user-progress">
                                        <i class='bx bx-up-arrow-alt text-success me-2'></i> <span>9.12%</span>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <div class="d-flex w-100 flex-wrap justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Đã mua</h6>
                                        <small class="text-muted">12 Đơn đặt</small>
                                    </div>
                                    <div class="user-progress">
                                        <i class='bx bx-up-arrow-alt text-success me-2'></i> <span>2.83%</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Conversion rate -->

            <div class="col-md-12 col-lg-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3 col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{asset('be/assetsCopy/img/icons/unicons/cc-warning.png')}}" alt="Credit Card" class="rounded">
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt5">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Doanh thu</span>
                                <h3 class="card-title text-nowrap mb-2">{{ "₫" . number_format($revenueCurrentMonth['total'] / 1000, 0, ',', '.') . "k" }}</h3>
                                @if ($revenueCurrentMonth['total'] > $revenueLastMonth['total'])
                                    <small class="text-success fw-medium"><i class='bx bx-up-arrow-alt'></i>+{{number_format($percentChange[0]['percentage'],2) }}%</small>
                                @elseif ($revenueCurrentMonth['total'] < $revenueLastMonth['total'])
                                    <small class="text-danger fw-medium"><i class='bx bx-down-arrow-alt'></i> {{ number_format($percentChange[0]['percentage'],2) }}%</small>
                                @else
                                    <small class="text-muted fw-medium"><i class='bx bx-minus'></i> 0%</small>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block fw-medium">Việc đặt lịch</span>
                                <h3 class="card-title mb-2">482k</h3>
                                <span class="badge bg-label-info mb-3">+34%</span>
                                <small class="text-muted d-block">Mục tiêu</small>
                                <div class="d-flex align-items-center">
                                    <div class="progress w-75 me-2" style="height: 8px;">
                                        <div class="progress-bar bg-info" style="width: 78%" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span>78%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between gap-3">
                                    <div class="d-flex align-items-start flex-column justify-content-between">
                                        <div class="card-title">
                                            <h5 class="mb-0">Chi phí</h5>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div class="mt-auto">
                                                <h3 class="mb-2">$84.7k</h3>
                                                <small class="text-danger text-nowrap fw-medium"><i class='bx bx-down-arrow-alt'></i> 8.2%</small>
                                            </div>
                                        </div>
                                        <span class="badge bg-label-secondary rounded-pill">Năm 2023</span>
                                    </div>
                                    <div id="expensesBarChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Balance -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">Tổng số dư</h5>
                        <div class="dropdown">
                            <button class="btn p-0" type="button" id="totalBalance" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalBalance">
                                <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-start">
                            <div class="d-flex pe-4">
                                <div class="me-3">
                                    <span class="badge bg-label-warning p-2"><i class="bx bx-wallet text-warning"></i></span>
                                </div>
                                <div>
                                    <h6 class="mb-0">$2.54k</h6>
                                    <small>Ví</small>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-3">
                                    <span class="badge bg-label-secondary p-2"><i class="bx bx-dollar text-secondary"></i></span>
                                </div>
                                <div>
                                    <h6 class="mb-0">$4.2k</h6>
                                    <small>Paypal</small>
                                </div>
                            </div>
                        </div>
                        <div id="totalBalanceChart" class="border-bottom mb-3"></div>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">Bạn đã bán được nhiều hơn <span class="fw-medium">57.6%</span>.<br>Kiểm tra huy hiệu mới trong hồ sơ của bạn.</small>
                            <div>
                                <span class="badge bg-label-warning p-2"><i class="bx bx-chevron-right text-warning scaleX-n1-rtl"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Balance -->
            <div class="col-md-6 col-lg-8 mb-4 mb-md-0">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table text-nowrap">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Payment</th>
                                <th>Order Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('be/assetsCopy/img/products/oneplus-lg.png')}}" alt="Oneplus" height="32" width="32" class="me-2">
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium lh-1">OnePlus 7Pro</span>
                                            <small class="text-muted">OnePlus</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-primary rounded-pill badge-center p-3 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span> Smart Phone</td>
                                <td>
                                    <div class="text-muted lh-1"><span class="text-primary fw-medium">$120</span>/499</div>
                                    <small class="text-muted">Partially Paid</small>
                                </td>
                                <td><span class="badge bg-label-primary">Confirmed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('be/assetsCopy/img/products/magic-mouse.png')}}" alt="Apple" height="32" width="32" class="me-2">
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium lh-1">Magic Mouse</span>
                                            <small class="text-muted">Apple</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-warning rounded-pill badge-center p-3 me-2"><i class="bx bx-mouse bx-xs"></i></span> Mouse</td>
                                <td>
                                    <div class="lh-1"><span class="text-primary fw-medium">$149</span></div>
                                    <small class="text-muted">Fully Paid</small>
                                </td>
                                <td><span class="badge bg-label-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('be/assetsCopy/img/products/imac-pro.png')}}" alt="Apple" height="32" width="32" class="me-2">
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium lh-1">iMac Pro</span>
                                            <small class="text-muted">Apple</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-info rounded-pill badge-center p-3 me-2"><i class="bx bx-desktop bx-xs"></i></span> Computer</td>
                                <td>
                                    <div class="text-muted lh-1"><span class="text-primary fw-medium">$0</span>/899</div>
                                    <small class="text-muted">Unpaid</small>
                                </td>
                                <td><span class="badge bg-label-danger">Cancelled</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('be/assetsCopy/img/products/note10.png')}}" alt="Samsung" height="32" width="32" class="me-2">
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium lh-1">Note 10</span>
                                            <small class="text-muted">Samsung</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-primary rounded-pill badge-center p-3 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span> Smart Phone</td>
                                <td>
                                    <div class="lh-1"><span class="text-primary fw-medium">$149</span></div>
                                    <small class="text-muted">Fully Paid</small>
                                </td>
                                <td><span class="badge bg-label-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('be/assetsCopy/img/products/iphone.png')}}" alt="Apple" height="32" width="32" class="me-2">
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium lh-1">iPhone 11 Pro</span>
                                            <small class="text-muted">Apple</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-primary rounded-pill badge-center p-3 me-2"><i class="bx bx-mobile-alt bx-xs"></i></span> Smart Phone</td>
                                <td>
                                    <div class="lh-1"><span class="text-primary fw-medium">$399</span></div>
                                    <small class="text-muted">Fully Paid</small>
                                </td>
                                <td><span class="badge bg-label-success">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('be/assetsCopy/img/products/mi-tv.png')}}" alt="Xiaomi" height="32" width="32" class="me-2">
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium lh-1">Mi LED TV 4X</span>
                                            <small class="text-muted">Xiaomi</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-danger rounded-pill badge-center p-3 me-2"><i class="bx bx-tv bx-xs"></i></span> Smart TV</td>
                                <td>
                                    <div class="text-muted lh-1"><span class="text-primary fw-medium">$349</span>/2499</div>
                                    <small class="text-muted">Partially Paid</small>
                                </td>
                                <td><span class="badge bg-label-primary">Confirmed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('be/assetsCopy/img/products/logitech-mx.png')}}" alt="Logitech" height="32" width="32" class="me-2">
                                        <div class="d-flex flex-column">
                                            <span class="fw-medium lh-1">Logitech MX</span>
                                            <small class="text-muted">Logitech</small>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-label-warning rounded-pill badge-center p-3 me-2"><i class="bx bx-mouse bx-xs"></i></span> Mouse</td>
                                <td>
                                    <div class="lh-1"><span class="text-primary fw-medium">$89</span></div>
                                    <small class="text-muted">Fully Paid</small>
                                </td>
                                <td><span class="badge bg-label-primary">Completed</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> View Details</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')

    <!-- Vendors JS -->
    <script src="{{asset('be/assetsCopy/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <!-- Main JS -->
    <script src="{{asset('be/assetsCopy/js/main.js')}}"></script>
    <!-- Page JS -->
    <script src="{{asset('be/assetsCopy/js/app-ecommerce-dashboard.js')}}"></script>

@endsection


