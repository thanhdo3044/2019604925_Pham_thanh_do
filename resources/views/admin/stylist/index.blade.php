@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
@endsection
@section('content')
    @can('roles.editMember')
        <input type="hidden" class="jqr-roleEdit" value="true">
    @endcan
    @can('roles.deleteMember')
        <input type="hidden" class="jqr-roleDelete" value="true">
    @endcan
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
                                @if (\Gate::check('roles.createMember'))
                                    <button type="button"
                                        class="btn btn-success waves-effect waves-light jquery-btn-create">
                                        <i class="mdi mdi-plus-circle me-1"></i> Thêm nhân viên
                                    </button>
                                @else
                                    <button type="button" class="btn btn-success waves-effect waves-light" disabled>
                                        <i class="mdi mdi-plus-circle me-1"></i> Thêm nhân viên
                                    </button>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form class="d-flex flex-wrap align-items-center justify-content-sm-end">
                                <label for="status-select" class="me-2">Sort By</label>
                                <div class="me-sm-2">
                                    <select class="form-select my-1 my-md-0" id="status-select">
                                        <option selected="">All</option>
                                        <option value="1">Name</option>
                                        <option value="2">Post</option>
                                        <option value="3">Followers</option>
                                        <option value="4">Followings</option>
                                    </select>
                                </div>
                                <label for="inputPassword2" class="visually-hidden">Search</label>
                                <div>
                                    <input type="search" class="form-control my-1 my-md-0" id="inputPassword2"
                                        placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="jquery-list">

    </div>



    <div class="modal fade show jquery-main-modal" tabIndex="-1" aria-hidden="true">
        @include('admin.stylist.modal')
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

    <script src="{{ asset('js/jsAdmin/toast.js') }}"></script>
    <script src="{{ asset('js/jsAdmin/stylist.js') }}"></script>
@endsection
