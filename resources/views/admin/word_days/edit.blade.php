@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')


<div class="modal-dialog modal-full-width">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h4 class="modal-title" id="myCenterModalLabel">Thêm dịch vụ</h4>

        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <div class="modal-body">
                    <form action="{{route('workday.update', ['id'=>request()->route('id')])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Key</label>
                                <input type="date" class="form-control" name="day" value="{{$data->day}}" required/>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Is_active</label>
                                <select class="form-select" aria-label="Default select example" name="is_active">
                                    <option {{$data->is_active == 1 ? 'selected': ''}} value="1">Hoạt động</option>
                                    <option {{$data->is_active == 0 ? 'selected': ''}} value="0">Không hoạt động</option>
                                </select>
                            </div>
                            <div class="w-100 text-center">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Save
                                </button>
                            </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>




@endsection


@section('script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection