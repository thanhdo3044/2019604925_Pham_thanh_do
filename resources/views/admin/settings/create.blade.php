@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')
<div class="modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Thêm setting</h4>
            <button type="button" class="btn-close jquery-btn-cancel" aria-hidden="true"></button>
        </div>
        <div class="modal-body">


            <form method="POST" action="{{ route('settings.store') }}" enctype="multipart/form-data">
                @csrf

                
                <div class="container">

                    < <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="key" class="form-label">key</label>
                                <input type="number" class="form-control" id="key" name="key" />

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="value" class="form-label">Value</label>
                                <input type="text" class="form-control" id="value" name="value" />


                            </div>
                        </div>
                       
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light" data-bs-dismiss="modal">Save</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"
                            > <a href="{{ route('settings.index') }}">Cancel</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".jquery-btn-cancel").click(function () {
            // Find the closest modal and close it
            $(this).closest(".modal").modal("hide");
        });
    });
</script>

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