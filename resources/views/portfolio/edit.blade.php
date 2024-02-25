@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')
<div class="modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Sửa <h4>
            <button type="button" class="btn-close jquery-btn-cancel" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <form class="d-flex justify-content-between flex-wrap" method="POST" action="{{ route('portfolios.update', [$portfolio->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-xl-6">
                    <div class="input-group">
                        <input type="file" value="{{old('image')?? $portfolio->image}}" class="form-control" id="inputGroupFile04" name="image" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        @error('image')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div style="margin-top:20px; float:left" class="w-100 text-center">
                    <button type="submit" class="btn btn-success waves-effect waves-light" data-bs-dismiss="modal">Sửa</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"><a style="color: white" href="{{route('portfolios.index')}}">Cancel</a></button>
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