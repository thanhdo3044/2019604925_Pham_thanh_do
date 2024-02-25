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
                                <h1>Thùng Rác - User</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body"><table id="example"
                           class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                        <thead>
                        <tr class="">
                            @foreach($columns as $key => $column)
                                <th>{{$column}}</th>
                            @endforeach
                            <th>Action status</th>
                        </tr>
                        </thead>
                        <tbody id="jquery-list">

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
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="{{asset('js/jsAdmin/userTrash.js')}}"></script>
    <script src="{{asset('js/jsAdmin/toast.js')}}"></script>
@endsection


