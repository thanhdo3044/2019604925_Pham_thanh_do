@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')
<div class="modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Sửa timesheet</h4>
            <button type="button" class="btn-close jquery-btn-cancel" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('timesheets.update', [$timesheet->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="hour" class="form-label">hour</label>
                                <input type="number" class="form-control" id="hour" name="hour" value="{{$timesheet->hour}}" min="0" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for "minutes" class="form-label">minutes</label>
                                <input type="number" class="form-control" id="minutes" name="minutes" value="{{$timesheet->minutes}}" min="0" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label for="is_active" class="form-label">Trạng thái</label>
                                <select name="is_active" class="form-control" id="is_active">
                                    <option value="1" {{$timesheet->is_active == 1 ? 'selected': ''}}>Hoạt Động</option>
                                    <option value="0" {{$timesheet->is_active == 0 ? 'selected': ''}}>Không Hoạt Động</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light" data-bs-dismiss="modal">Save</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"> <a href="{{ route('timesheets.index') }}">Cancel</a>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection

@section('script')
<!-- third party js -->

{{-- <script src="{{asset('be/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>--}}
{{-- <script src="{{asset('be/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>--}}
<script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>

@endsection