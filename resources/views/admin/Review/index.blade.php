@extends('admin.layout.master')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    <style>
        .card {
            border: none;
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 4px;
        }

        .reply {
            margin-left: 12px;
        }

        .reply small {
            color: #b7b4b4;
        }

        .reply small:hover {
            color: green;
            cursor: pointer;
        }

        .reply-form {
            display: none;
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="modal-header bg-white">
        <h4 class="modal-title" id="myCenterModalLabel">Rating and Comment</h4>
    </div>
    <br>

    <div class="container">
        <div class="row">
            @foreach ($data as $item)
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="row">
                            <div class="d-flex justify-content-between">
                                <div class="col-1 mr-3">
                                    
                                </div>
                                <div class="col-8">
                                    <span>
                                        <small class="fw-bolder text-red fs-5">
                                            {{ str_replace('+84', '', $item->booking->user->phone_number) }}
                                        </small>({{ str_replace('+84', '', $item->booking->user_phone) }}):
                                        <br>

                                        <small class="font-weight-bold text-dark">
                                            {{ $item->comment }}.
                                        </small>
                                    </span>
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <small>{{ $item->created_at }}</small>
                                </div>
                            </div>



                        </div>
                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                            @if (\Gate::check('roles.replyReview'))
                                <div class="reply d-flex px-4">
                                    <small class="reply-trigger">Reply</small>
                                </div>
                            @else
                            <style>
                                .disabled-div {
                                    pointer-events: none; /* Tắt sự kiện chuột */
                                    opacity: 0.6; /* Làm mờ để thể hiện trạng thái disabled */
                                }
                            </style>
                                <div class="reply d-flex px-4 disabled-div">
                                    <small class="reply-trigger">Reply</small>
                                </div>
                            @endif
                            <div class="icons align-items-center">
                                @for ($j = 0; $j < $item->rating; $j++)
                                    <i class="fa fa-star text-warning"></i>
                                @endfor

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-11">
                                <div class="reply-form">
                                    <form class="form" id="formReview" action="{{ route('replyReview') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <label for="replyContent" class="form-label">Your Reply:</label>
                                            <textarea class="form-control" id="replyContent" name="reply" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary updateReply"><i
                                                class="bi bi-send-check"></i></button>
                                    </form>
                                </div>
                                <hr>
                                <div class="replies-container">
                                    <?php if ($item->reply) {
                                        echo '<i class="ti ti-corner-down-right-double fw-bolder fs-5"></i>';
                                    } ?> {{ $item->reply }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all elements with the class "reply-trigger"
            var replyTriggers = document.querySelectorAll('.reply-trigger');

            // Iterate over each reply trigger
            replyTriggers.forEach(function(replyTrigger) {
                // Add a click event listener to each reply trigger
                replyTrigger.addEventListener('click', function() {
                    // Find the parent card element
                    var card = replyTrigger.closest('.card');

                    // Toggle the display of the reply form within the card
                    var replyForm = card.querySelector('.reply-form');
                    if (replyForm) {
                        replyForm.style.display = replyForm.style.display === 'none' ? 'block' :
                            'none';
                    }
                });
            });


        });
    </script>
@endsection


@section('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- third party js -->
    <!-- <script src="{{ asset('be/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('be/assets/libs/pdfmake/build/vfs_fonts.js') }}"></script> -->
    <!-- third party js ends -->

    <!-- Datatables init -->
    <!-- <script src="{{ asset('be/assets/js/pages/datatables.init.js') }}"></script> -->


    <!-- <script src="{{ asset('js/jsAdmin/service.js') }}"></script> -->
@endsection
