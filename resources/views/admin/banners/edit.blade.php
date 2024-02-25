@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')
<div class="modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Sửa Banner</h4>
            <button type="button" class="btn-close jquery-btn-cancel" aria-hidden="true"></button>
        </div>
        <div class="modal-body">


        <form method="POST" action="{{ route('banners.update', [$banner->id]) }}" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                
                <div class="container">

                     <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                            <label for="bannerimage" class="form-label">bannerimage</label>
                                <input type="file" class="form-control" id="bannerimage" name="image" value="{{$banner->image}}" />

                            </div>
                        </div>
                       
                        </div>
                       
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light" data-bs-dismiss="modal">Save</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"
                            > <a href="{{ route('banners.index') }}">Cancel</a>
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