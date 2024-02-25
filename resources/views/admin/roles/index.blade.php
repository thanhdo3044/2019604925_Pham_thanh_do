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
                                <h4>Danh sách vai trò</h4>
{{--                                <button type="button"class="btn btn-success waves-effect waves-light jquery-btn-create">--}}
{{--                                    <i class="mdi mdi-plus-circle me-1 "></i> Add new--}}
{{--                                </button>--}}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 jqr-overView">

    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Action Status</th>
                        </tr>
                        </thead>
                        <tbody id="jquery-list">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade show jquery-main-modal" tabIndex="-1" aria-hidden="true">
        @include('admin.roles.modal')
    </div>

@endsection

@section('script')
    <!-- third party js -->
    <script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>
    <script src="{{asset('js/jsAdmin/roleAndPermission.js')}}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="{{asset('js/jsAdmin/toast.js')}}"></script>
@endsection
