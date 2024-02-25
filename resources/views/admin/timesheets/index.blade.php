@extends('admin.layout.master')
@section('style')
<link rel="stylesheet" href="{{asset('css/service.css')}}">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between">
                    <div class="col-md-4">
                        <div class="mt-3 mt-md-0">
                        <a href="{{ route('timesheets.create') }}" class="btn btn-primary">Add Timesheet</a>


                            {{-- <a href="{{route('timesheet.create')}}" class="btn btn-success waves-effect waves-light"--}}
                            {{-- ><i--}}
                            {{-- class="mdi mdi-plus-circle me-1"></i> Thêm timesheet--}}
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
            <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')"  class="btn btn-danger" id="deleteAllSelectedRecord" style="margin-bottom: 7px;">Delete all</a>

                <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                    <thead>
                        <tr class="">
                            <th><input type="checkbox" name="" class="" id="select_all_ids" ></th>
                          <th>id</th>
                          <th>hour</th>
                          <th>minutes</th>
                          <th>is_active</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody id="jquery-list">
                      
                    @foreach ($timesheets as $timesheet)
                    <tr id="timesheet_ids{{ $timesheet->id }}">
                        <td><input type="checkbox" name="ids" class="checkbox_ids" id="" value="{{$timesheet->id}}"></td>
                    <td>{{ $timesheet->id }}</td>
                    <td>{{ $timesheet->hour }}</td>
                    <td>{{ $timesheet->minutes }}</td>
                    <td>{{ $timesheet->is_active ? 'Active' : 'Inactive' }}</td>
                    <td>  <a href="{{ route('timesheets.edit', ['id' => $timesheet->id]) }}" class="btn btn-warning">Edit</a>


                    <a onclick="return confirm('Co muon xoa hay khong?')" href="{{ route('timesheets.delete', ['id' => $timesheet->id]) }}" class="btn btn-danger">Delete</a>
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
<script>
   $(function(e) {
    // Ẩn ban đầu khi trang được tải
    $("#deleteAllSelectedRecord").hide();

    $("#select_all_ids").click(function() {
        $('.checkbox_ids').prop('checked', $(this).prop('checked'));
        toggleDeleteButtonVisibility(); // Gọi hàm để kiểm tra việc ẩn hoặc hiển thị nút Delete
    });

    $('.checkbox_ids').click(function() {
        toggleDeleteButtonVisibility(); // Gọi hàm để kiểm tra việc ẩn hoặc hiển thị nút Delete
    });

    function toggleDeleteButtonVisibility() {
        var anyCheckboxChecked = $('.checkbox_ids:checked').length > 0;

        if (anyCheckboxChecked) {
            $("#deleteAllSelectedRecord").show();
        } else {
            $("#deleteAllSelectedRecord").hide();
        }
    }

    $('#deleteAllSelectedRecord').click(function(e) {
        e.preventDefault();
        var all_ids = [];
        $('input:checkbox[name=ids]:checked').each(function() {
            all_ids.push($(this).val());
        });
        $.ajax({
            url: "{{ route('timesheets.delete') }}",
            type: "DELETE",
            data: {
                ids: all_ids,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $.each(all_ids, function(key, val) {
                    $('#timesheet_ids' + val).remove();
                });
                toggleDeleteButtonVisibility(); // Gọi hàm để kiểm tra việc ẩn hoặc hiển thị nút Delete sau khi xóa
            }
        });
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