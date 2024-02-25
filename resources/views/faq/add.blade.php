@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
<script src="https://cdn.ckeditor.com/ckeditor5/37.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')
<div class="modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Thêm câu hỏi</h4>
            <button type="button" class="btn-close jquery-btn-cancel" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
            <form class="d-flex justify-content-between flex-wrap" method="POST" action="{{ route('faqs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-xl-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Câu hỏi</label>
                        <input type="text" class="form-control" id="question" name="question" />
                        @error('question')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Câu trả lời</label>
                        <textarea name="answer" id="description" cols="30" rows="10"></textarea>
                        @error('answer')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                        <!-- <textarea id="editor" name="description" class="description" >{{ old('description') }}</textarea> -->
                    </div>
                </div>
                <div style="float:left" class="w-100 text-center">
                    <button type="submit" class="btn btn-success waves-effect waves-light" data-bs-dismiss="modal">Thêm</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"><a style="color: white" href="{{route('faqs.index')}}">Cancel</a></button>
                </div>
                <script>
                    // Kích hoạt CKEditor trên textarea với id "editor"
                    ClassicEditor
                        .create(document.querySelector('#description'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>
<script>
    // Sử dụng đoạn mã khởi tạo CKEditor tại đây
    ClassicEditor
        .create(document.querySelector('#description'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection


