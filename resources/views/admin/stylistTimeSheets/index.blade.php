@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{asset('css/service.css')}}">
    <link rel="stylesheet" href="{{asset('be/assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" >
    <link rel="stylesheet" href="{{asset('be/assets/libs/flatpickr/flatpickr.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('be/assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('be/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('be/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>
    <link href="{{asset('be/assets/libs/mohithg-switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('be/assets/libs/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('be/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('be/assets/libs/selectize/css/selectize.bootstrap3.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('be/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
                                <button type="button"class="btn btn-success waves-effect waves-light jquery-btn-create">
                                    <i class="mdi mdi-plus-circle me-1 "></i> Add new
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="jquery-list" class="col-12">



    </div>
    <div class="modal fade show jquery-main-modal" tabIndex="-1" aria-hidden="true">
        @include('admin.stylistTimeSheets.create')
    </div>
    <div class="modal fade show js-img" style="background: rgba(0,0,0,0.5);" tabIndex="-1" aria-hidden="true">

    </div>
@endsection

@section('script')
    <!-- third party js -->
    <script src="{{asset('be/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="{{asset('be/assets/js/pages/datatables.init.js')}}"></script>
    <!-- Plugins js-->
    <script src="{{asset('be/assets/libs/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/spectrum-colorpicker2/spectrum.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/mohithg-switchery/switchery.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/multiselect/js/jquery.multi-select.js')}}"></script>
    <script src="{{asset('be/assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/jquery-mockjax/jquery.mockjax.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script src="{{asset('be/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>
    <!-- <script src="{{asset('be/assets/js/pages/form-advanced.init.js')}}"></script> -->

    <!-- Init js-->

    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <script src="{{asset('js/jsAdmin/stylistTimeSheets.js')}}"></script>
    <script src="{{asset('js/jsAdmin/toast.js')}}"></script>
@endsection
