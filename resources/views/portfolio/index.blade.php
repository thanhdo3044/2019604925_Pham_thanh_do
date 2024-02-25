
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
                        <a href="{{ route('portfolios.create') }}" class="btn btn-primary">Add</a>
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
                          <th>STT</th>
                          <th>Hình ảnh</th>
                          <th>Hoạt động</th>
                        </tr>
                    </thead>
                    <tbody id="jquery-list">
                    <div class="d-none">{{ $index = 1 }}</div>
                    @foreach ($portfolios as $portfolio)
                    <tr>
                    <td>{{ $index++ }}</td>
                    <td><img style="height: 200px; width: 150px;" src="{{ asset('storage/image/'.$portfolio->image)}}" alt=""></td>
            <td><button type="button" class="btn btn-primary"><a style="color: white; text-decoration: none;" href="{{route('portfolios.edit',$portfolio->id)}}">Sửa</a></button>
            <form action="{{route('portfolios.destroy',$portfolio->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Xoá</button>
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
<script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- third party js ends -->

<!-- Datatables init -->
 <script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>

@endsection
