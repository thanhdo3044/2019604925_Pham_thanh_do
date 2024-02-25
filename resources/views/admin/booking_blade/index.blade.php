@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body taskboard-box">

                    <h4 class="header-title mt-0 mb-3 text-primary">Quản lí lịch đặt</h4>

                    <ul class="sortable-list list-unstyled taskList" id="upcoming">
                        @foreach ($data as $item)
                            <li>
                                <div class="kanban-box">
                                    <div class="checkbox-wrapper float-start">
                                        <div class="form-check form-check-success ">
                                            <input class="form-check-input" type="checkbox" id="singleCheckbox2"
                                                value="option2" aria-label="Single checkbox Two">
                                            <label></label>
                                        </div>
                                    </div>

                                    <div class="kanban-detail">
                                        @if ($item->status == 1)
                                            <span class="badge float-end bg-danger">Chờ xác nhận
                                            </span>
                                        @endif
                                        @if ($item->status == 2)
                                            <span class="badge float-end bg-warning">Đang chờ cắt
                                            </span>
                                        @endif
                                        @if ($item->status == 3)
                                            <span class="badge float-end bg-success">Đã cắt
                                            </span>
                                        @endif
                                        @if ($item->status == 0)
                                            <span class="badge float-end bg-secondary">Đã hủy
                                            </span>
                                        @endif
                                        <h5 class="mt-0"><a href="{{ route('route.booking_blade.detail', $item->id) }}"
                                                class="text-dark">Khách hàng: {{ $item->user_phone }}</a></h5>
                                        <h5>Stylist: {{ $item->stylist->name }}</h5>
                                        <h5>Thời gian : {{ $item->timesheet->hour }}h - {{ $item->timesheet->minutes }}
                                            ph</h5>
                                        <h5>Ngày : {{ $item->date }}</h5>
                                        <h5>Yêu cầu đặc biệt: {{ $item->special_requirements }}</h5>
                                        <h5 style="color: {{ $item->is_consultant == 1 ? 'green' : 'red' }};">
                                            Yêu cầu tư vấn: {{ $item->is_consultant == 1 ? 'Có' : 'Không' }}
                                        </h5>

                                        <h5 style="color: {{ $item->is_accept_take_a_photo == 1 ? 'green' : 'red' }};">
                                            Chụp ảnh sau khi cắt để làm mẫu cho lần
                                            sau: {{ $item->is_accept_take_a_photo == 1 ? 'Có' : 'Không' }}
                                        </h5>
                                            <h5 style="color: {{$item->pttt == 2 ? "green" : "red" }};">
                                                Trạng thái thanh toán
                                                sau: {{$item->pttt == 2 ? "Đã thanh toán" : "Thanh toán tại quầy" }}
                                            </h5>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div><!-- end col -->
    </div><!-- end row -->
@endsection


@section('script')
    <!-- third party js -->
    <script src="{{ asset('be/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{ asset('be/assets/js/pages/datatables.init.js') }}"></script>


    {{--    <script src="{{asset('js/jsAdmin/booking.js')}}"></script> --}}
@endsection
