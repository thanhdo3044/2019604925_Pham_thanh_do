
@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/decoupled-document/ckeditor.js"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <div class="mt-3 mt-md-0">
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary">Add Blog</a>


                            {{-- <a href="{{route('timesheet.create')}}" class="btn btn-success waves-effect waves-light"--}}
                            {{-- ><i--}}
                            {{-- class="mdi mdi-plus-circle me-1"></i> Thêm Blog--}}
                            {{-- </a>--}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

            <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                    <thead>
                        <tr class="">
                          <th>id</th>
                          <th>Title</th>
                          <th>image</th>
                          <th>Description</th>

                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody id="jquery-list">

                    @foreach ($blogs as $blog)
                    <tr>
                    <td>{{ $blog->id }}</td>
                    <td>{{ $blog->title }}</td>
                    <td><img style="height: 200px; width: 150px;" src="{{ asset('storage/image/'.$blog->image)}}" alt=""></td>
                    <td>{{ strip_tags($blog->description) }}</td>
                    <td>
            <button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="{{route('blogs.edit',$blog->id)}}">Sửa blog</a></button>
            <form action="{{route('blogs.destroy',$blog->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Xoá blog</button>
                </form>
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
