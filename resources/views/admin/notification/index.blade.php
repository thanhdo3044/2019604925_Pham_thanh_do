@extends('admin.layout.master')

@section('link_css')
    <link href="{{ asset('be/assets/libs/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md">
                            <div class="mt-3 mt-md-0">
                                <h3 class="text-center">Tất cả thông báo </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-2 mb-2">
        <div class="col-8 border border-success-subtle rounded border-2 align-items-center bg-white">
            <div class="row mt-2 mb-2 align-items-center">
                <div class="col-1">
                    <input class="form-check-input" type="checkbox" value="" id="selectAll"
                           onchange="toggleCheckboxes()">
                </div>
                <div class="col-5">
                    <label class="form-check-label col-9 fs-4 fw-bolder" for="flexCheckDefault"> Chọn tất cả </label>
                </div>
                <div class="col-6" id="btnContainer" style="display: none;">
                    <div class="row">
                        <div class="col-6 d-grid gap-3" onclick="confirmAll()">
                            <button type="button" class="btn btn-outline-success rounded-pill">Xác nhận tất cả
                                lịch
                            </button>
                        </div>
                        <div class="col-6 d-grid gap-2" onclick="cancelAll()">
                            <button type="button" class="btn btn-outline-danger rounded-pill">Hủy tất cả lịch</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="appointmentForm">
        @foreach($notifications as $items)
            <div class="row justify-content-center mt-2 mb-2">
                <div class="col-8 border border-success-subtle rounded border-2 align-items-center bg-white">
                    <div class="row mt-2 mb-2 align-items-center">
                        <div class="col-1">
                            <input class="form-check-input input-form" type="checkbox" value="" id="flexCheckDefault">
                        </div>
                        <div class="col-3">
                            <label class="form-check-label col-9"
                                   for="flexCheckDefault">{{str_replace("+84", "", $items->booking->user_phone)}}</label>
                        </div>
                        <div class="col-4">
                            <label class="form-check-label col-9" for="flexCheckDefault">{{$items->messege}}</label>
                        </div>
                        @if($items->booking->status === 1)
                            <div class="col-2 d-grid gap-2">
                                <button type="button" class="btn btn-success rounded-pill confirm-booking"
                                        id="successButton"
                                        onclick="confirmAppointment(this)"
                                        data-booking-id="{{ $items->booking_id }}"
                                >Xác nhận
                                </button>
                            </div>
                            <div class="col-2 d-grid gap-2">
                                <button type="button" class="btn btn-danger rounded-pill delete-notification"
                                        id="cancelButton"
                                        onclick="cancelAppointment(this)"
                                        data-notification-id="{{ $items->id }}"
                                >Hủy
                                    lịch
                                </button>
                            </div>
                        @endif
                        @if($items->booking->status === 2)
                            <div class="col-4 d-grid gap-2">
                                <button type="button" class="btn btn-success rounded-pill"
                                        disabled
                                >Đã xác nhận
                                </button>
                            </div>
                        @endif
                        @if($items->booking->status === 3)
                            <div class="col-4 d-grid gap-2">
                                <button type="button" class="btn btn-success rounded-pill"
                                        disabled
                                >Đã cắt thành công
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </form>
@endsection

@section('script')
    <!-- plugin js -->
    <script src="{{ asset('be/assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/fullcalendar/main.min.js') }}"></script>

    <!-- Calendar init -->
    <script src="{{ asset('be/assets/js/pages/calendar.init.js') }}"></script>
    <script src="{{ asset('js/jsAdmin/toast.js')}}"></script>
@endsection
