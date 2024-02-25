@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
                                <h1>Thùng Rác</h1>
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
                    <table id="example"
                           class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                        <thead>
                        <tr class="">
                            @foreach($columns as $key => $column)
                                <th>{{$column}}</th>
                            @endforeach
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody id="jquery-list">

                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>


@endsection

@section('script')
    <!-- third party js -->
{{--    <script src="{{asset('be/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>--}}
{{--    <script src="{{asset('be/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>--}}
    <script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
{{--    <script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>--}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="{{asset('js/jsAdmin/trashService.js')}}"></script>
    <script src="{{asset('js/jsAdmin/toast.js')}}"></script>
@endsection


