@extends('client.layouts.layout')
@section('style')
<link rel="stylesheet" href="{{asset('css/main.9e417c19.chunk.css')}}">
<link rel="stylesheet" href="{{asset('client/css/booking.css')}}">
<link rel="stylesheet" href="@sweetalert2/themes/dark/dark.css">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection
@section('content')

@if(@session('default'))
<script>
    swal( "Oops" ,  "Thanh toán thất bại!" ,  "error" )
</script>
@endif

<div id="user_phone" data-user_phone="+84{{ request()->query('phone') }}"></div>

<div id="user-info" data-user_id="{{(Auth::check()) ? Auth::id(): '0'}}"></div>
<div class="fix-hed">

</div>
<section class="info-box section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" id="jqr-displayBooking">
                <div class="new-top-navigator pointer " style="background-color: #14100c; color: #fff;"><span class="text-center">Đặt lịch giữ chỗ</span></div>
                <div class="main-screen">

                    <div class="main-screen__block main-screen__block--done" id="serviceAttributeId">
                        <div class="font-medium text-lg mb-3">1. Chọn dịch vụ</div>
                        <div class="cursor-pointer flex item-center bg-f7f7f7 rounded" style="height: 2.75rem; padding-left: 0.625rem; padding-right: 0.625rem;" aria-hidden="true">
                            <div class="relative mr-2.5 lg:mr-3.5" style="margin-right: 0.625rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M10.0001 12.1209L7.68308 14.4379C8.04548 15.2925 8.09936 16.2466 7.83546 17.1366C7.57157 18.0266 7.00635 18.7971 6.23666 19.316C5.46698 19.835 4.54076 20.0701 3.61675 19.981C2.69274 19.892 1.82847 19.4843 1.17207 18.8279C0.515665 18.1715 0.108001 17.3072 0.0189446 16.3832C-0.0701123 15.4592 0.164983 14.533 0.683938 13.7633C1.20289 12.9936 1.97339 12.4284 2.86339 12.1645C3.75338 11.9006 4.70745 11.9545 5.56208 12.3169L7.88008 9.99988L2.21008 4.33288C2.02428 4.14715 1.87689 3.92663 1.77633 3.68393C1.67577 3.44123 1.62401 3.18109 1.62401 2.91838C1.62401 2.65566 1.67577 2.39552 1.77633 2.15282C1.87689 1.91012 2.02428 1.6896 2.21008 1.50388L2.91808 0.796875L10.0001 7.87988L17.0811 0.797875L17.7891 1.50488C17.9749 1.6906 18.1223 1.91112 18.2228 2.15382C18.3234 2.39652 18.3752 2.65666 18.3752 2.91937C18.3752 3.18209 18.3234 3.44222 18.2228 3.68493C18.1223 3.92763 17.9749 4.14815 17.7891 4.33388L12.1201 9.99988L14.4371 12.3169C15.2917 11.9545 16.2458 11.9006 17.1358 12.1645C18.0258 12.4284 18.7963 12.9936 19.3152 13.7633C19.8342 14.533 20.0693 15.4592 19.9802 16.3832C19.8912 17.3072 19.4835 18.1715 18.8271 18.8279C18.1707 19.4843 17.3064 19.892 16.3824 19.981C15.4584 20.0701 14.5322 19.835 13.7625 19.316C12.9928 18.7971 12.4276 18.0266 12.1637 17.1366C11.8998 16.2466 11.9537 15.2925 12.3161 14.4379L10.0001 12.1199V12.1209ZM4.00008 17.9999C4.53051 17.9999 5.03922 17.7892 5.4143 17.4141C5.78937 17.039 6.00008 16.5303 6.00008 15.9999C6.00008 15.4694 5.78937 14.9607 5.4143 14.5857C5.03922 14.2106 4.53051 13.9999 4.00008 13.9999C3.46965 13.9999 2.96094 14.2106 2.58587 14.5857C2.21079 14.9607 2.00008 15.4694 2.00008 15.9999C2.00008 16.5303 2.21079 17.039 2.58587 17.4141C2.96094 17.7892 3.46965 17.9999 4.00008 17.9999ZM16.0001 17.9999C16.5305 17.9999 17.0392 17.7892 17.4143 17.4141C17.7894 17.039 18.0001 16.5303 18.0001 15.9999C18.0001 15.4694 17.7894 14.9607 17.4143 14.5857C17.0392 14.2106 16.5305 13.9999 16.0001 13.9999C15.4696 13.9999 14.9609 14.2106 14.5859 14.5857C14.2108 14.9607 14.0001 15.4694 14.0001 15.9999C14.0001 16.5303 14.2108 17.039 14.5859 17.4141C14.9609 17.7892 15.4696 17.9999 16.0001 17.9999Z" fill="#3D3D3D" />
                                </svg>
                            </div>
                            <button class="pr-0.5 overflow-hidden whitespace-nowrap overflow-ellipsis w-full text-sm color-111111 jqr-showAllService">
                                Xem tất cả dịch vụ hấp dẫn
                            </button>
                            <div class="ml-auto w-2.5" style="margin-left: auto;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10" fill="none">
                                    <path d="M5.3335 5L0.333496 10L0.333496 0L5.3335 5Z" fill="black" />
                                </svg>
                            </div>
                        </div>
                        <p class="jqr-validateService disabled d-none mg-top-10 validateBooking">Mời bạn chọn dịch vụ để chọn giờ cắt</p>
                        <div class="block__box">
                            <div class="mt-4">
                                <div class="flex flex-wrap -mx-1.5">

                                </div>
                            </div>
                        </div>
                        <div class="text-sm font-light text-[#11B14B]">
                        </div>
                    </div>
                    <div class="main-screen__block main-screen__block--active">
                        <div class="next-item"></div>
                        <div class="block" id="service-time">
                            <div class="font-medium text-lg mb-3">2. Chọn ngày, giờ &amp; stylist</div>
                            <div class="stylist" id="stylist">
                                <div class="stylist__dropdown flex pointer jqr-ChooseStylist" role="presentation">
                                    <span class="flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="19" viewBox="0 0 14 19" fill="none">
                                            <path d="M5.05913 11.9551C5.63496 11.7798 6.16683 12.2506 6.16683 12.8525V15.8335C6.16683 16.2937 6.53992 16.6668 7.00016 16.6668C7.4604 16.6668 7.8335 16.2937 7.8335 15.8335V12.8509C7.8335 12.2495 8.3647 11.7788 8.94013 11.9536C11.3676 12.6907 13.2089 14.7753 13.5928 17.3369C13.6747 17.8831 13.2191 18.3335 12.6668 18.3335H1.33351C0.781221 18.3335 0.325818 17.8833 0.408355 17.3372C0.598829 16.0769 1.14795 14.8901 2.00017 13.9237C2.8225 12.9912 3.88375 12.313 5.05913 11.9551ZM7.00016 10.8335C4.23766 10.8335 2.00016 8.596 2.00016 5.8335C2.00016 3.071 4.23766 0.833496 7.00016 0.833496C9.76266 0.833496 12.0002 3.071 12.0002 5.8335C12.0002 8.596 9.76266 10.8335 7.00016 10.8335Z" fill="#111" />
                                        </svg>
                                    </span>
                                    <span class="nameStylist">Chọn Stylist</span>
                                    <span class="flex item-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M12.72 15.78C12.5795 15.9207 12.3888 15.9999 12.19 16H11.81C11.6116 15.9977 11.4217 15.9189 11.28 15.78L6.15 10.64C6.10314 10.5936 6.06594 10.5383 6.04056 10.4773C6.01517 10.4164 6.00211 10.351 6.00211 10.285C6.00211 10.219 6.01517 10.1537 6.04056 10.0928C6.06594 10.0318 6.10314 9.97652 6.15 9.93004L6.86 9.22004C6.90563 9.17348 6.96008 9.13649 7.02018 9.11123C7.08028 9.08598 7.14482 9.07297 7.21 9.07297C7.27519 9.07297 7.33973 9.08598 7.39983 9.11123C7.45993 9.13649 7.51438 9.17348 7.56 9.22004L12 13.67L16.44 9.22004C16.4865 9.17318 16.5418 9.13598 16.6027 9.1106C16.6636 9.08521 16.729 9.07214 16.795 9.07214C16.861 9.07214 16.9264 9.08521 16.9873 9.1106C17.0482 9.13598 17.1035 9.17318 17.15 9.22004L17.85 9.93004C17.8969 9.97652 17.9341 10.0318 17.9595 10.0928C17.9848 10.1537 17.9979 10.219 17.9979 10.285C17.9979 10.351 17.9848 10.4164 17.9595 10.4773C17.9341 10.5383 17.8969 10.5936 17.85 10.64L12.72 15.78Z" fill="#767676" />
                                        </svg>
                                    </span>
                                </div>

                                <!--                                    messenger-->
                                <div class="bot-message bot-message__stylist fade-in jqr-messageStylist">

                                </div>
                                <!--                                    messenger-->

                                <div class="content fade-in jqr-contentStylist">
                                    <div class="left jqr-randomStylist" role="presentation">
                                        <div>
                                            <div class="user-default relative cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
                                                    <path d="M12.9998 2.1665C10.8572 2.1665 8.7627 2.80187 6.98116 3.99225C5.19963 5.18263 3.8111 6.87457 2.99115 8.8541C2.1712 10.8336 1.95666 13.0119 2.37467 15.1133C2.79267 17.2148 3.82445 19.1451 5.33952 20.6602C6.85459 22.1752 8.7849 23.207 10.8864 23.625C12.9878 24.043 15.166 23.8285 17.1456 23.0085C19.1251 22.1886 20.817 20.8 22.0074 19.0185C23.1978 17.237 23.8332 15.1425 23.8332 12.9998C23.8332 11.5772 23.553 10.1685 23.0085 8.8541C22.4641 7.53974 21.6661 6.34548 20.6602 5.33951C19.6542 4.33355 18.4599 3.53557 17.1456 2.99114C15.8312 2.44672 14.4225 2.1665 12.9998 2.1665V2.1665ZM12.9998 5.4165C13.6426 5.4165 14.271 5.60711 14.8054 5.96423C15.3399 6.32134 15.7565 6.82892 16.0025 7.42278C16.2484 8.01664 16.3128 8.67011 16.1874 9.30055C16.062 9.93099 15.7525 10.5101 15.2979 10.9646C14.8434 11.4191 14.2643 11.7287 13.6339 11.8541C13.0034 11.9795 12.35 11.9151 11.7561 11.6691C11.1623 11.4231 10.6547 11.0066 10.2976 10.4721C9.94045 9.93765 9.74984 9.30929 9.74984 8.6665C9.74984 7.80455 10.0923 6.9779 10.7017 6.36841C11.3112 5.75891 12.1379 5.4165 12.9998 5.4165V5.4165ZM19.0882 17.5065C18.3827 18.4566 17.4646 19.2284 16.4074 19.7602C15.3502 20.2919 14.1832 20.5689 12.9998 20.5689C11.8164 20.5689 10.6495 20.2919 9.59228 19.7602C8.53509 19.2284 7.61701 18.4566 6.91151 17.5065C6.80464 17.3486 6.74136 17.1652 6.72804 16.975C6.71473 16.7848 6.75185 16.5944 6.83567 16.4232L7.06317 15.9465C7.32583 15.3898 7.74119 14.9191 8.26094 14.5892C8.78068 14.2593 9.38342 14.0838 9.99901 14.0832H16.0007C16.6079 14.084 17.2028 14.2549 17.7179 14.5766C18.233 14.8983 18.6476 15.3578 18.9148 15.9032L19.164 16.4123C19.2499 16.585 19.2881 16.7774 19.2748 16.9697C19.2615 17.1621 19.197 17.3474 19.0882 17.5065Z" fill="#767676" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div>
                                            <span>6XPRO <br> Chọn Hộ Anh</span>
                                        </div>
                                    </div>
                                    <div class="right relative">

                                        <div class="swiper-container swiper-container-initialized swiper-container-horizontal" style=" overflow: auto">
                                            <div class="swiper-wrapper jqr-show-stylist" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block__box">
                                    <div class="relative" id="datebookId">
                                        <div class="cursor-pointer flex item-center h-11 rounded px-2.5 " aria-hidden="true">

                                            <input type="date" class="form-control" name="date" id="jqr-selectedDate" min="<?php echo date('Y-m-d'); ?>">
                                        </div>



                                        <div class="filter drop-shadow bg-white absolute top-11 w-full z-20 opacity-0 "></div>
                                    </div>
                                </div>
                                <p class="jqr-validateDate disabled d-none mg-top-10 validateBooking">Mời bạn chọn ngày cắt để chọn giờ cắt</p>
                                <div class="block suggestion-salon">
                                    <div class="mt-2">
                                        <div class="flex item-center " role="presentation">
                                            <div class="suggestion-salon__text jqr-name">
                                                <div>Ngày mai còn rất nhiều giờ trống, click để đổi sang
                                                    ngày mai bạn nhé!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box-time" id="box-time">
                                    <div class="relative">
                                        <div class="swiper-container swiper-container-initialized swiper-container-horizontal" style=" overflow: auto">
                                            <div class="swiper-wrapper jqr-timesheet" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px);">

                                            </div>
                                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                        </div>

                                    </div>
                                </div>
                                <div id=""></div>
                            </div>
                        </div>
                        <div class="text-base">
                            <div class="">
                                <p class="fw-bold fs-5"><i class="bi bi-credit-card"></i> Phương thức thanh toán</p>
                                <div class="form-check">
                                    <input type="radio" class="" id="" name="pttt" value="1">
                                    <label class="form-check-label" for="radio1">Thanh toán tại quầy</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="" id="" name="pttt" value="2" checked>
                                    <label class="form-check-label" for="radio2">Thanh toán online</label>
                                </div>
                            </div>
                            <div class="flex space-between is_height">
                                <p class="fw-bold fs-5">Yêu cầu đặc biệt</p>
                            </div>
                            <div class="note__input">
                                <textarea placeholder="VD: Tư vấn kiểu tóc..." class="ant-input" style="font-family: inherit; height: 35px;font-weight: 300;border-color: rgb(145, 118, 90);border-top: none;border-left: none;border-right: none;border-radius: 0;margin-bottom: 0;padding: 5px;"></textarea>
                            </div>
                            <div class="flex space-between is_height">
                                <p class="fw-bold fs-5">Yêu cầu tư vấn</p>
                                <label class="switch ">
                                    <input type="checkbox" checked>
                                    <span class="slider round jqr-consultant"></span>
                                </label>
                            </div>
                            <p class="jqr-textConsultant">Bạn cho phép chúng mình giới thiệu về các dịch vụ tốt nhất dành cho bạn.</p>
                            <div class="flex space-between is_height">
                                <p class="fw-bold fs-5">Chụp ảnh sau khi cắt</p>
                                <label class="switch">
                                    <input type="checkbox" checked>
                                    <span class="slider round jqr-accept_take_a_photo"></span>
                                </label>
                            </div>
                            <p class="jqr-acceptTakeAPhoto">Bạn cho phép chụp hình lưu lại kiểu tóc, để lần sau không phải mô tả lại cho thợ khác.</p>
                        </div>
                    </div>
                </div>
                <div class="new-affix-v2">
                    <div class="flex space-between text-center content-step time-line ">
                        <div class="right button-next pointer btn-inactive jqr-completed" role="presentation">
                            <span>Hoàn tất</span>
                        </div>
                        <span class="sub-description">Cắt xong trả tiền, huỷ lịch không sao</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')
<script src="{{asset('be/assets/libs/mohithg-switchery/switchery.min.js')}}"></script>
<script src="{{asset('js/jsClient/booking.js')}}"></script>
@endsection
