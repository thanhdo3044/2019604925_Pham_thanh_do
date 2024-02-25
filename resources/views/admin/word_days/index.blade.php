@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')


<div class="container bg-white">
    <div class="row">
        <div class="col-12">
            <div class="modal-header bg-white">
                <a href="{{route('workDay.create')}}" class="btn btn-success waves-effect waves-light"><i class="mdi mdi-plus-circle me-1"></i> Ngày làm việc</a>
                
            </div>
        </div>
    </div>
</div>
<br>
<div class="container bg-white">
    <div class="row">
        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
            <thead>
                <tr class="">
                    @foreach($columns as $key => $column)
                    <th>{{$column}}</th>
                    @endforeach
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    @foreach($columns as $key => $column)
                    <td>

                        @if(in_array($key, ['image']))
                        <img src="/storage/{{$item->image}}" alt="img" srcset="" width="150" height="100">
                        @else
                        {{$item->$key}}
                        @endif
                    </td>
                    @endforeach


                    <td class="text-center">
                        <div class="btn-group dropdown">
                            <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none " data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="svg-icon svg-icon-primary svg-icon-2x"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#8950fc" />
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{route('workday.edit', ['id'=> $item->id])}}" class="dropdown-item js-btn-update">
                                    Cập nhật
                                </a>
                                <a class="dropdown-item btn-delete" onclick="return confirm('Bạn Có Chắc Chắn Xóa')" href="{{route('workday.delete', ['id'=> $item->id])}}">
                                    Xóa
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection


@section('script')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection