@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('css/service.css')}}">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col">
                            <div class="mt-3 mt-md-0 text-center">
                                <h2>※ Thống kê chi tiết ※</h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col justify-content-between">
            <div class="card" style="background-color: rgb(13 148 136); color: #fff">
                <div class="card-body">
                    <div class="text-center">
                        <svg stroke="currentColor" class="fs-3" fill="currentColor" stroke-width="0" version="1.1" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 5l-8-4-8 4 8 4 8-4zM8 2.328l5.345 2.672-5.345 2.672-5.345-2.672 5.345-2.672zM14.398 7.199l1.602 0.801-8 4-8-4 1.602-0.801 6.398 3.199zM14.398 10.199l1.602 0.801-8 4-8-4 1.602-0.801 6.398 3.199z"></path>
                        </svg>
                        <p class="fs-5">Hôm nay <br> <?= number_format($todayTotalPrice, 0, ".", "."); ?>đ</p>
                        <div class="row text-xs" style="font-size: 11px;">
                            <div class="col-4 ">Đã hoàn thành <br> {{ $todayCompletedCounts }}</div>
                            <div class="col-5 ">Chưa hoàn thành <br> {{ $todayPendingCounts }}</div>
                            <div class="col-3 ">Đã <br> hủy <br> {{ $todayCanceledCounts }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col justify-content-between">
            <div class="card" style="background-color: rgb(251 146 60); color: #fff">
                <div class="card-body">
                    <div class="text-center">
                        <svg stroke="currentColor" class="fs-3" fill="currentColor" stroke-width="0" version="1.1" viewBox="0 0 16 16" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 5l-8-4-8 4 8 4 8-4zM8 2.328l5.345 2.672-5.345 2.672-5.345-2.672 5.345-2.672zM14.398 7.199l1.602 0.801-8 4-8-4 1.602-0.801 6.398 3.199zM14.398 10.199l1.602 0.801-8 4-8-4 1.602-0.801 6.398 3.199z"></path>
                        </svg>
                        <p class="fs-5">Hôm qua <br><?= number_format($yesterdayTotalPrice, 0, ".", "."); ?>đ</p>
                        <div class="row text-xs" style="font-size: 11px;">
                            <div class="col-4 ">Đã hoàn thành <br> {{ $yesterdayCompletedCounts }}</div>
                            <div class="col-5 ">Chưa hoàn thành <br> {{ $yesterdayPendingCounts }}</div>
                            <div class="col-3 ">Đã <br> hủy <br> {{ $yesterdayCanceledCounts }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card" style="background-color: rgb(59 130 246); color: #fff; height: 183px">
                <div class="card-body justify-content-between">
                    <div class="text-center fs-2">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                        <p class="fs-3">Tháng này <br> <?= number_format($thisMonthTotalPrice, 0, ".", "."); ?>đ</p>
                        <p class="fs-5">{{ $startOfMonth }} - {{ $endOfMonth }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card" style="background-color: rgb(8 145 178); color: #fff; height: 183px">
                <div class="card-body justify-content-between">
                    <div class="text-center fs-2">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                        <p class="fs-3">Tháng trước <br> <?= number_format($lastMonthTotalPrice, 0, ".", "."); ?>đ</p>
                        <p class="fs-5">{{ $startOfLastMonth }} - {{ $endOfLastMonth }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="card" style="background-color: rgb(5 150 105); color: #fff; height: 183px">
                <div class="card-body justify-content-between">
                    <div class="text-center fs-2">
                    <svg stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                        <p class="fs-3">Tổng <br> <?= number_format($totalPrice, 0, ".", "."); ?>đ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form class="row mt-2 mb-2" action="{{ url('/admin/statistical') }}"  id="statistical-filler">
        <!-- <div class="row mt-2 mb-2">
            <div class="col-4">
                <label class="form-label">Ngày bắt đầu</label>
                <input class="form-control" type="date" id="startDate">
            </div>
            <div class="col-4">
                <label class="form-label">Ngày kết thúc</label>
                <input class="form-control" type="date" id="endDate">
            </div>
            <div class="col-2">
                <label class="form-label">.</label>
                <button type="submit" class="btn btn-success w-100" id="btn-statistical-filter">Lọc kết quả</button>
            </div>
            <div class="col-2">
                <label class="form-label">.</label>
                <button type="reset" class="btn btn-warning w-100">Reset</button>
            </div>
        </div> -->
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Thống kê theo ngày</h3>
                        <hr>
                        <div id="chartBooking" style="height: 250px;"></div>
                        <script>
                            var chartBooking = new Morris.Bar({
                                // ID of the element in which to draw the chart.
                                element: 'chartBooking',
                                padding: 10,
                                lineColors: ['#819C79', '#FC8710','#FF6541','#A4ADD3'],
                                behaveLikeLine: true,
                                gridEnabled: false,
                                gridLineColor: '#dddddd',
                                hideHover: 'auto',
                                axes: true,
                                resize: true,
                                smooth:true,
                                pointSize: 0,
                                lineWidth: 0,
                                fillOpacity:0.85,
                                data: [
                                    <?php foreach($chartBooking as $key){ ?>
                                    {
                                        'time': <?=$key->order_date ?>,
                                        'booked': <?=$key->completed_total ?>,
                                        'pending': <?=$key->pending_total ?>,
                                        'canceled': <?=$key->canceled_total ?>
                                    },
                                    <?php } ?>
                                ],
                                xkey: 'time',
                                redraw: true,
                                ykeys: ['booked', 'pending', 'canceled'],
                                labels: ['Hoàn thành', 'Chưa hoàn thành', 'Bị hủy']
                            })
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Thống kê tuần hiện tại</h3>
                        <hr>
                        <div id="chart7DaysBooking" style="height: 250px;"></div>
                        <script>
                            var chart7DaysBooking = new Morris.Bar({
                                // ID of the element in which to draw the chart.
                                element: 'chart7DaysBooking',
                                padding: 10,
                                lineColors: ['#819C79', '#FC8710','#FF6541','#A4ADD3'],
                                behaveLikeLine: true,
                                gridEnabled: false,
                                gridLineColor: '#dddddd',
                                hideHover: 'auto',
                                axes: true,
                                resize: true,
                                smooth:true,
                                pointSize: 0,
                                lineWidth: 0,
                                fillOpacity:0.85,
                                data: [
                                    <?php foreach($chart7DaysBooking as $key){ ?>
                                    {time: '<?=$key->order_date ?>', booked: <?=$key->completed_total ?>, pending: <?=$key->pending_total ?>, canceled: <?=$key->canceled_total ?>},
                                    <?php } ?>
                                ],
                                xkey: 'time',
                                redraw: true,
                                ykeys: ['booked', 'pending', 'canceled'],
                                labels: ['Hoàn thành', 'Chưa hoàn thành', 'Bị hủy'],
                            });
                        </script>
                    </div>
                </div>
            </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                        <thead>
                            <!-- <tr>
                                <th colspan="6">Thống kê theo ngày</th>
                            </tr> -->
                            <tr>
                                <th>Ngày</th>
                                <th>Tổng đơn đã hoàn thành</th>
                                <th>Tổng đơn chưa hoàn thành</th>
                                <th>Tổng đơn đã hủy</th>
                                <th>Tổng đơn</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderSummary as $summary)
                                <tr>
                                    <td>{{ $summary->order_date }}</td>
                                    <td>{{ $summary->completed_total }}</td>
                                    <td>{{ $summary->pending_total }}</td>
                                    <td>{{ $summary->canceled_total }}</td>
                                    <td>{{ $summary->booked_total }}</td>
                                    <td><?= number_format($summary->daily_revenue, 0, ".", "."); ?>đ</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>Tổng</td>
                                <td>{{ $bookedBooking }}</td>
                                <td>{{ $notBookedBooking }}</td>
                                <td>{{ $cancelledBooking }}</td>
                                <td>{{ $totalBooking }}</td>
                                <td><?= number_format($totalPrice, 0, ".", "."); ?>đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-7">
            <table class="table text-center">
                <tr>
                    <th colspan="2"><h3>Các bài viết có số lượt xem cao</h3></th>
                </tr>
                <tr>
                    <td>BẠN SINH VIÊN IT LỘT XÁC THÀNH HOT BOY VẠN NGƯỜI MÊ</td>
                    <td><i>1.235 Lượt xem</i></td>
                </tr>
                <tr>
                    <td>BẠN SINH VIÊN IT LỘT XÁC THÀNH HOT BOY VẠN NGƯỜI MÊ</td>
                    <td><i>1.235 Lượt xem</i></td>
                </tr>
                <tr>
                    <td>BẠN SINH VIÊN IT LỘT XÁC THÀNH HOT BOY VẠN NGƯỜI MÊ</td>
                    <td><i>1.235 Lượt xem</i></td>
                </tr>
                <tr>
                    <td>BẠN SINH VIÊN IT LỘT XÁC THÀNH HOT BOY VẠN NGƯỜI MÊ</td>
                    <td><i>1.235 Lượt xem</i></td>
                </tr>
            </table>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div id="chartBlogs" style="height: 250px;"></div>
                    <script>
                        var chartBlogs = new Morris.Bar({
                            // ID of the element in which to draw the chart.
                            element: 'chartBlogs',

                            data: [
                                {nameBlog: 'A1', view: 21668, click: 40000},
                                {nameBlog: 'A2', view: 15780, click: 40000},
                                {nameBlog: 'A3', view: 12920, click: 30000},
                                {nameBlog: 'A4', view: 12920, click: 40000},
                                {nameBlog: 'A5', view: 12920, click: 40000},
                                {nameBlog: 'A6', view: 12920, click: 50000},
                            ],

                            xkey: 'nameBlog',
                            ykeys: ['view','click'],
                            labels: ['Views Blog', 'Click']
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <!-- third party js -->
    <script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Datatables init -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('js/jsAdmin/toast.js')}}"></script>
    <!-- <script src="{{asset('js/jsAdmin/statistical.js')}}"></script> -->
@endsection


