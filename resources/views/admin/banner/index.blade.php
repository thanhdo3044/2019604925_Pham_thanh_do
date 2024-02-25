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
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
                                @if (\Gate::check('roles.createBanner'))
                                    <a href="{{ route('banner.create') }}">
                                        <button type="button"
                                            class="btn btn-success waves-effect waves-light jquery-btn-create">
                                            <i class="mdi mdi-plus-circle me-1"></i> Thêm Banner
                                        </button>
                                    </a>
                                @else
                                    <button type="button"
                                        class="btn btn-success waves-effect waves-light jquery-btn-create" disabled>
                                        <i class="mdi mdi-plus-circle me-1"></i> Thêm Banner
                                    </button>
                                @endif
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
                            <a href="#" class="btn btn-warning" id="deleteAllSelect"
                                style="display: none; width: 150px; border-radius: 20px;">DeleteAllSelect</a>
                        </div>
                        <div class="col-4"></div>

                        <div class="col-4 align-self-end">
                            <form action="{{ route('searchBanner') }}" method="POST">
                                @csrf
                                <div class="input-group mb-4 border rounded-pill p-1">

                                    <input type="search" placeholder="What're you searching for?"
                                        aria-describedby="button-addon4" class="form-control bg-none border-0"
                                        name="searchBanner">
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
                                <th><input type="checkbox" name="ids" class="checkbox_ids" id="selectAll_ids"
                                        value=""></th>
                                <th>STT</th>
                                @foreach ($columns as $key => $column)
                                    <th>{{ $column }}</th>
                                @endforeach
                                <!-- <th>Trạng thái hoạt động</th> -->
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <div class="d-none">{{ $index = 1 }}</div>
                            @foreach ($data as $item)
                                <tr id="banner_ids{{ $item->id }}">
                                    
                                    <td><input type="checkbox" class="checkbox_ids" name="ids"
                                            id="myCheckbox{{ $item->id }}" value="{{ $item->id }}"></td>
                                            <td>{{ $index++ }}</td>
                                    @foreach ($columns as $key => $column)
                                        <td>

                                            @if (in_array($key, ['image']))
                                                <img src="{{ $item->image ? asset('img/' . $item->image) : '' }}"
                                                    alt="" width="150" height="100">
                                            @else
                                                {{ $item->$key }}
                                            @endif
                                        </td>
                                    @endforeach



                                    <td class="text-center">
                                        <div class="btn-group dropdown">
                                            <a href="javascript: void(0);"
                                                class="table-action-btn dropdown-toggle arrow-none "
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <span
                                                    class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                        height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                            fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24" />
                                                            <path
                                                                d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                                fill="#8950fc" />
                                                        </g>
                                                    </svg>
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                @if (\Gate::check('roles.editBanner'))
                                                    <a href="{{ route('edit.banner', ['id' => $item->id]) }}" class="dropdown-item js-btn-update">
                                                        <button style="border: 0px; background-color: #fff;" >
                                                            Cập nhật
                                                        </button>
                                                    </a>
                                                @else
                                                    <a class="dropdown-item js-btn-update">
                                                        <button style="border: 0px; background-color: #fff;"
                                                            disabled>Cập nhật</button>
                                                    </a>
                                                @endif
                                                @if (\Gate::check('roles.deleteBanner'))
                                                    <a class="dropdown-item btn-delete"
                                                        href="{{ route('destroy.banner', ['id' => $item->id]) }}">
                                                        <button style="border: 0px; background-color: #fff;"
                                                            onclick="return confirm('Bạn Có Chắc Chắn Xóa')">Xóa</button>
                                                    </a>
                                                @else
                                                    <a class="dropdown-item btn-delete">
                                                        <button style="border: 0px; background-color: #fff;"
                                                            disabled>Xóa</button>
                                                    </a>
                                                @endif

                                            </div>
                                        </div>
                                    </td>
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
    <script>
        $(function(e) {

            $("#selectAll_ids").click(function() {
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));

            });
            $("#deleteAllSelect").click(function(e) {
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function() {
                    all_ids.push($(this).val());

                });
                $.ajax({
                    url: "{{ route('checkDelete') }}",
                    type: "DELETE",
                    data: {
                        ids: all_ids,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $.each(all_ids, function(key, val) {
                            $('#banner_ids' + val).remove();
                            Swal.fire(
                                'Good job!',
                                'You clicked the button!',
                                'success'
                            )
                        })
                    }
                });
            })
        });

        document.getElementById("deleteAllSelect").onclick = function() {
            var result = window.confirm("Bạn có chắc chắn xóa ?");

            if (result) {
                location.reload();

            }
        };
        // function autoload() {
        //     location.reload();
        // };

        document.addEventListener("DOMContentLoaded", function() {
            var checkboxes = document.querySelectorAll(".checkbox_ids")
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener("change", function() {
                    var a = document.getElementById("deleteAllSelect")
                    if (this.checked) {
                        a.style.display = "block";
                    } else {
                        a.style.display = "none";
                    }
                })
            })
        });



        function isChecked(checkboxes) {
            for (var i = 0; i < chekboxes.lenght; i++) {
                if (chekboxes[i].checked) {
                    return true;
                }

            }
            return false;
        };


        const searchButton = document.getElementById('search-button');
        const searchInput = document.getElementById('search-input');
        searchButton.addEventListener('click', () => {
            const inputValue = searchInput.value;
            alert(inputValue);
        });
    </script>
@endsection
