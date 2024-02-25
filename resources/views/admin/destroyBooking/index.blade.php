@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    <style>
        .card {
            border: none;
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 4px;
        }

        .confirm {
            color: #e9ecef;
            background-color: red;
            font-size: 10px;
            font-weight: 800;
            width: 120px;
            margin: 0;
        }

        .restore {
            color: #e9ecef;
            background-color: yellowgreen;
            font-size: 10px;
            font-weight: 800;
            width: 130px;
            margin: 0;
        }
    </style>
@endsection
@section('content')
    <div class="modal-header bg-white">
        <h4 class="modal-title" id="myCenterModalLabel">Thanh toán hủy lịch</h4>
        @if (\Gate::check('roles.viewCancelWeb'))
            <a href="https://sandbox.vnpayment.vn/merchantv2/Users/Login.htm?ReturnUrl=%2fmerchantv2%2fHome%2fDashboard.htm"
                class="btn btn-primary">Hoàn tiền</a>
        @else
            <a href="javascript:void(0);" onclick="alert('Bạn không có quyền truy cập')" class="btn btn-primary">Hoàn tiền</a>
        @endif
    </div>
    <br>

    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="row">
                            @if ($item->status == 1)
                                <div class="confirm">Đã xác nhận- hủy lịch</div>
                            @elseif($item->status == 2)
                                <div class="restore">Đã xác nhận- Khôi phục</div>
                            @endif
                            <div class="d-flex justify-content-between">
                                <div class="col-8">
                                    <span>
                                        Booking: <span style="color: red; font-weight: 600;">{{ $item->booking_id }} /
                                            {{ str_replace('+84', '', $item->user_phone) }} /
                                            {{ number_format($item->price, 0, '.', '.') }}đ</span> yêu cầu hủy lịch
                                    </span>
                                </div>
                                <div class="col-4 d-flex justify-content-end">
                                    @if ($item->status == 0)
                                        @if (\Gate::check('roles.restoreMoney'))
                                            <a href="{{ route('confirm', ['id' => $item->booking_id]) }}" class=" me-2"><i
                                                    class="bi bi-check-circle" style="font-size: 30px;"></i></a>
                                        @else
                                            <a href="javascript:void(0);" class=" me-2" onclick="alert('Bạn không có quyền xác nhận.')">
                                                <i class="bi bi-check-circle" style="font-size: 30px;"></i>
                                            </a>
                                        @endif

                                        @if (\Gate::check('roles.restoreBooking'))
                                            <a href="{{ route('restore', ['id' => $item->booking_id]) }}" class="ms-2"><i
                                                    class="bi bi-arrow-repeat " style="font-size: 30px;"></i></a>
                                        @else
                                            <a href="javascript:void(0);" class="ms-2" onclick="alert('Bạn không có quyền xác nhận.')">
                                                <i class="bi bi-arrow-repeat" style="font-size: 30px;"></i>
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection


@section('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection
