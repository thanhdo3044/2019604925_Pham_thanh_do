<table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
    <thead>
        <tr class="">
            @foreach($columns as $key => $column)
            <th>{{$column}}</th>

            @endforeach
            <th>Image</th>
            <th>action</th>

        </tr>
    </thead>
    <tbody>
        @foreach($service as $item)
        
        <tr>
            
            @foreach($columns as $key => $column)
            
            <td>
                @if(in_array($key, ['image']))
                <img src="" alt="">
                @else
                {{$item->$key}}
                @endif
            </td>
            
            @endforeach
            
            <td>

                <!-- Modal trigger button -->
                <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modalId">
                  image
                </button>
                
                <!-- Modal Body -->
                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">{{$item->name}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Body
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <!-- Optional: Place to the bottom of scripts -->
                <script>
                    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                
                </script>
            </td>

            <td class="text-center">
                <div class="btn-group dropdown">
                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none " data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#8950fc" />
                                </g>
                            </svg>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="" class="dropdown-item js-btn-update">
                            Cập nhật
                        </a>
                        <a class="dropdown-item btn-delete" href="#">
                            Xóa
                        </a>
                        
                        
                        
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>