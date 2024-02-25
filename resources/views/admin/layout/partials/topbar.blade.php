<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-end mb-0">

        <li class="d-none d-lg-block">
            <form class="app-search">
                <div class="app-search-box">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." id="top-search">
                        <button class="btn input-group-text" type="submit">
                            <i class="fe-search"></i>
                        </button>
                    </div>
                    <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h5 class="text-overflow mb-2">Found 22 results</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-home me-1"></i>
                            <span>Analytics Report</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-aperture me-1"></i>
                            <span>How can I help you?</span>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-settings me-1"></i>
                            <span>User profile settings</span>
                        </a>

                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                        </div>

                        <div class="notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex align-items-start">
                                    <img class="d-flex me-2 rounded-circle"
                                         {{--                                         src="{{asset('be/assets/images/users/user-2.jpg')}}"--}}
                                         alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                        <span class="font-12 mb-0">UI Designer</span>
                                    </div>
                                </div>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="d-flex align-items-start">
                                    <img class="d-flex me-2 rounded-circle"
                                         {{--                                         src="{{asset('be/assets/images/users/user-5.jpg')}}"--}}
                                         alt="Generic placeholder image" height="32">
                                    <div class="w-100">
                                        <h5 class="m-0 font-14">Jacob Deo</h5>
                                        <span class="font-12 mb-0">Developer</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </form>
        </li>

        <li class="dropdown d-inline-block d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>

        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light" data-bs-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <i class="fe-bell noti-icon"></i>
                <span
                    id="soLuongThongBao" class="badge bg-danger rounded-circle noti-icon-badge notification-test">
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                        <span class="float-end">
                            <a href="" class="text-dark">
{{--                                <small>Clear All</small>--}}
                            </a>
                        </span>Notification
                    </h5>
                </div>
                <div class="noti-scroll" data-simplebar>
                        @foreach($notification as $item)
                    <div class="dropdown-item notify-item" style="background-color: none">
                        {{-- sau khi thông báo được nhấn vào thì thêm vào thẻ div class "opacity-50"--}}
                        <a class="col-12" @if($item->messege === 'Thông báo có lịch đặt mới.') href="{{route('route.booking_blade')}}" @else href="{{route('review.index')}}" @endif >
                            <div class="notify-icon">
                                <img src="{{asset('be/assets/images/users/user-1.jpg')}}"
                                     class="img-fluid rounded-circle" alt=""/>
                            </div>
                            <p class="notify-details">{{str_replace("+84", "", $item->booking->user_phone)}}</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>{{$item->messege}}</small>
                            </p>
                            {{-- nút thông báo xanh nè
                                ẩn nút: dùng (visibility: hidden; position: absolute;); bỏ (display: flex;) trong style của span
                            --}}
{{--                             <span style0
                            {{-- kết thúc nút màu xanh nè --}}

{{--                             nút tick xác nhận thành công nè --}}
{{--                                ẩn nút: dùng (visibility: hidden; position: absolute;); bỏ (display: flex;) trong style của span--}}
{{--                                --}}
                            @if($item->booking->status === 2)
                             <span style="bottom: 25px; position: relative; display: flex; justify-content: flex-end; align-items: center;" id="noti-confirm-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: green;" width="17" height="17" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                            </span>
                            @endif
                            @if($item->booking->status === 3)
                                <span style="bottom: 25px; position: relative; display: flex; justify-content: flex-end; align-items: center;" id="noti-confirm-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" style="color: green;" width="17" height="17" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
                                </svg>
                            </span>
                            @endif
                            {{-- kết thúc nút tick xác nhận thành công nè--}}

                            {{-- nút tick hủy thành công nè
                                ẩn nút: dùng (visibility: hidden; position: absolute;); bỏ (display: flex;) trong style của span
                            --}}

{{--                             <span style="bottom: 25px; position: relative; display: flex; justify-content: flex-end; align-items: center;"  id="noti-cancel-icon">--}}
{{--                                <svg xmlns="http://www.w3.org/2000/svg" style="color: red;" width="17" height="17" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">--}}
{{--                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>--}}
{{--                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>--}}
{{--                                </svg>--}}
{{--                            </span>--}}

                            {{-- kết thúc nút tick hủy thành công nè--}}
                        </a>
                        <div class="col-12 mt-2" id="buttonTopbar" >
                            @if($item->booking->status === 1)
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-5 d-grid gap-2 fs-6">
                                    <button type="button"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;"
                                            class="btn btn-sm btn-outline-success rounded-pill confirm-booking "
{{--                                            onchange="buttonTopbar()"--}}
                                            data-booking-id="{{ $item->booking_id }}"
                                    >Xác nhận
                                    </button>
                                </div>
                                <div class="col-5 d-grid gap-2 fs-6">
                                    <button type="button"
                                            style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .65rem;"
                                            class="btn btn-sm btn-outline-danger rounded-pill
                                             delete-notification
                                            "
                                            data-notification-id="{{ $item->id }}"
                                    >Hủy lịch
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach

                </div>

                <!-- All-->
                <a href="{{route('route.notification')}}"
                   class="dropdown-item text-center text-primary notify-item notify-all">
                    View all
                    <i class="fe-arrow-right"></i>
                </a>

            </div>
        </li>

        <li class="dropdown notification-list topbar-dropdown">
            <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light" data-bs-toggle="dropdown"
               href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <img src="{{asset('be/assets/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                @if(Auth::user()->user_type == 'STYLIST')
                    <span class="pro-user-name ms-1">
                                   Stylist-{{ str_replace('+84', '', Auth::user()->phone_number) }} <i
                            class="mdi mdi-chevron-down"></i>
                                </span>
                @else
                    <span class="pro-user-name ms-1">
                                   Admin-{{ str_replace('+84', '', Auth::user()->phone_number) }} <i
                            class="mdi mdi-chevron-down"></i>
                                </span>
                @endif

            </a>
            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                <a href="" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Tài khoản của tôi</span>
                </a>


                <!-- item-->
                <a href="{{route('index')}}" class="dropdown-item notify-item">
                    <i class="fe-lock"></i>
                    <span>website</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fe-log-out"></i>
                    <span>Đăng xuất</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                <i class="fe-settings noti-icon"></i>
            </a>
        </li>

    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="index.html" class="logo logo-light text-center">
                            <span class="logo-sm">
                                <img src="{{asset('be/assets/images/logobarber.png')}}" alt="" height="120">
                            </span>
            <span class="logo-lg">
                                <img src="{{asset('be/assets/images/logobarber.png')}}" alt="" height="80">
                            </span>
        </a>
        <a href="{{route('route.dashboard')}}" class="logo logo-dark text-center">
                            <span class="logo-sm">
                                <img src="{{asset('be/assets/images/logobarber.png')}}" alt="" height="120">
                            </span>
            <span class="logo-lg">
                                <img src="{{asset('be/assets/images/logobarber.png')}}" alt="" height="80">
                            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
{{--            <input type="checkbox" id="menu-toggle" class="button-menu-mobile">--}}
{{--            <label for="menu-toggle" class="button-menu-mobile-label disable-btn waves-effect">--}}
{{--                <i class="fe-menu"></i>--}}
{{--            </label>--}}
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            @include('admin.layout.partials.title')
            {{--            <h4 class="page-title-main">Dashboard</h4>--}}
        </li>

    </ul>

    <div class="clearfix"></div>

</div>
