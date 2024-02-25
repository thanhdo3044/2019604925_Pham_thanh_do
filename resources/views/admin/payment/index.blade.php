@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-12">
                            <div class="mt-3 mt-md-0">
                                <h1 class="text-center"> Danh sách đơn hàng thanh toán online</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">


                    <div class="row">
                        <div class="col-4 align-self-start">
                        </div>
                        <div class="col-4"></div>

                        <div class="col-4 align-self-end">
                            <form action="{{ route('searchPayment') }}" method="POST">
                                @csrf
                                <div class="input-group mb-4 border rounded-pill p-1">

                                    <input type="search" placeholder="What're you searching for?"
                                        aria-describedby="button-addon4" class="form-control bg-none border-0"
                                        name="searchPayment">
                                    <div class="input-group-prepend border-0">
                                        <button id="button-addon4" type="submit" class="btn btn-link text-info"><i
                                                class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <table id=""
                        class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                        <thead>
                            <tr class="">
                                @foreach ($columns as $key => $column)
                                    <th>{{ $column }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    @foreach ($columns as $key => $column)
                                        <td>
                                            {{ $item->$key }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>

        </div>
    </div>
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


    <script src="{{ asset('js/jsAdmin/service.js') }}"></script>
@endsection
