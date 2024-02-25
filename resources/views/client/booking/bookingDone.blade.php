@extends('client.layouts.layout')

@section('style')


<link rel="stylesheet" href="https://30shine.com/static/css/8.dd6dd3b5.chunk.css">
<link rel="stylesheet" href="https://30shine.com/static/css/main.9e417c19.chunk.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{asset('css/main.9e417c19.chunk.css')}}">
<link rel="stylesheet" href="{{asset('client/css/booking.css')}}">
@endsection

@section('content')
<!-- Booking -->
<div class="fix-hed">

</div>
<div id="booking_id" data-booking_id="{{$booking_id}}"></div>
<section class="info-box section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="booking-done" id="booking-done">
                    <div class="bg-white p-4 mb-2.5 jqr-booking-done">
                        <div class="text-2xl color-green-11b14b font-semibold md:pt-6 pt-2 pb-6 flex">
                            Đặt Lịch Thành Công
                            <span role="img" aria-label="success">🎉</span>
                        </div>
                        <hr>
                        <div class="text-2xl color-green-11b14b font-semibold md:pt-6 pt-2 pb-6 flex">
                            <img src="{{ asset('client/img/6xpro.jpg')}}" alt="" height="150" class="border">
                        </div>
                        <div>
                            <b>
                                Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Nam Từ Liêm, Hà Nội
                            </b>
                        </div>


                        <br>
                        <div class="d-flex justify-content-center p-2">
                            <a href="https://www.google.com/maps/place/FPT+Polytechnic/@21.0373391,105.7464079,17z/data=!3m1!4b1!4m6!3m5!1s0x31345515f14a641f:0xe7f2a647f98416cb!8m2!3d21.0373341!4d105.7489828!16s%2Fg%2F11hygrsyrb?entry=ttu" class=" p-2 border text-dark">Chỉ đường <i class="bi bi-geo-alt-fill"></i></a>
                        </div>
                        <hr>

                        <p class="font-normal color-111111">
                            Hẹn anh/chị ( <b>{{str_replace('+84', '',$bookings->user_phone)}}</b> ) vào lúc: <br>
                            <b>{{$bookings->timeSheet->hour}}:{{$bookings->timeSheet->minutes}} | {{$bookings->date}}.</b>
                        </p>
                    </div>
                    <div class="bg-white p-4 mb-2.5 jqr-booking-done">
                        <div class="divide-y divide-gray-300">
                            <div class="row">
                                <div class="text-sm font-normal color-111111 pb-1"><b>Stylist : {{$stylist->name}}</b></div> <br>
                                <div class="text-sm font-light pb-2">Để cùng anh tạo nên kiểu tóc ưng ý nhất, em có một vài gợi ý mới nhất dưới đây anh tham khảo nhé! </div>
                            </div>
                            <div class="">
                                <div class="row">
                                    <a href="{{ route('services') }}" class="text-sm font-normal color-111111 pb-1">
                                        <div class=""><i class="bi bi-brightness-high-fill"></i> Khám phá những kiểu tóc hot <i class="bi bi-chevron-double-right"></i></div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="bg-white p-4 mb-2.5 jqr-booking-done">
                        <h5 class="font-normal color-111111">Chi tiết lịch đặt</h5>
                        <div class="divide-y divide-gray-300">
                            <div class="">
                                <div class="text-sm font-normal color-111111 pb-1">Dịch vụ</div>
                                @foreach($combo as $value)
                                <div class="text-sm font-light pb-2 booking-service__group-wrap-item">{{$value->service->name}}</div>
                                @endforeach
                                <div class="text-sm font-light pb-4 text-danger" style="font-size: 17px;">Tổng tiền anh cần thanh toán: {{number_format($bookings->price, 0,'.','.')}}đ

                                @if($payment)
                                <br>
                                <label for="" style="color:brown;"><b>Đã thanh toán chuyển khoản - Mã giao dịch: {{$payment->code_vnpay}}</b> </label>

                                @endif
                                </div>
                                <hr>
                                <b>Thông tin gửi xe</b>
                                <div>
                                    <img src="https://toppng.com/public/uploads/preview/motorcycle-icon-11562943268vracxoczhd.png" alt="" style="width: 20px; height: 20px;"> Gửi xe máy miễn phí tại salon
                                </div>
                            </div>




                        </div>
                    </div>
                    <div class="bg-white p-4 mb-2.5 jqr-booking-done">
                        <div class="flex pb-4">
                            <div>
                                <div class="text-lg font-semibold">Hướng dẫn đổi/hủy lịch đặt</div>
                                <div class="text-sm font-light pt-4">Nếu anh đến muộn quá <span class="font-weight">10 phút</span>
                                    chúng em sẽ dời lịch đặt sang khung giờ sau để anh có thời gian trải nghiệm thoải
                                    mái hơn.
                                </div>
                            </div>
                        </div>
                        <div class="divide-y divide-gray-300 -my-4">
                                @if($payment)
                                <button class="block flex item-center w-full py-4 jqr-change-payment">
                                    <div class="flex text-sm font-normal color-111111">Đổi lịch</div>
                                </button>   
                                @else
                                <button class="block flex item-center w-full py-4 jqr-change">
                                    <div class="flex text-sm font-normal color-111111">Đổi lịch</div>
                                </button>
                                @endif
                            
                            <button class="block flex item-center w-full py-4 jqr-destroy">
                                <div class="flex text-sm font-normal color-111111">Hủy lịch</div>
                            </button>
                        </div>
                    </div>
                    <div></div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="{{asset('js/jsClient/bookingDone.js')}}"></script>
@endsection
