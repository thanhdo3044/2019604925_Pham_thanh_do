@extends('client.layouts.layout')

@section('style')
<link rel="stylesheet" href="{{asset('client/css/lichsucat.css')}}">
<link rel="stylesheet" href="{{asset('css/main.9e417c19.chunk.css')}}">
<link rel="stylesheet" href="{{asset('client/css/booking.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>
    .popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        text-align: center;
        z-index: 999;
    }

    .popup img {
        max-width: 40%;
        max-height: 80%;
        margin: 5% auto;
        display: block;
    }
</style>
@endsection

@section('content')
<div class="fix-hed" style=" width: 100% ; height: 100px;background: #14100D;">



</div>
<section class="info-box section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" id="jqr-displayBooking">
                <div class="new-top-navigator pointer " style="background-color: #14100c; color: #fff;"><span class="text-center">Chi tiết lịch cắt</span></div>
                <div class="main-screen">

                    <div class="row">
                        <div class="col-5">
                            <h6 class="text-center">Album ảnh</h6>
                            @foreach($image as $images)
                            <img src="/storage/{{$images->image}}" alt="" style="width: 50px; height: 50px; margin: 5px;" class="smallImage">

                            
                            @endforeach
                            <div id="popup" class="popup" style="display: none;">
                                <img id="largeImage" src="" alt="Large Image">
                            </div>

                            <script>
                                var smallImages = document.querySelectorAll(".smallImage");
                                var popup = document.getElementById("popup");
                                var largeImage = document.getElementById("largeImage");

                                smallImages.forEach(function(smallImage) {
                                    smallImage.addEventListener("click", function() {
                                        var imagePath = smallImage.getAttribute("src");
                                        largeImage.setAttribute("src", imagePath);
                                        popup.style.display = "block";
                                    });
                                });

                                popup.addEventListener("click", function() {
                                    popup.style.display = "none";
                                });
                            </script>

                        </div>
                        <div class="col-7">
                            <b>Combo:</b>@foreach ($combo as $service)
                            {{$service->service->name}},
                            @endforeach <br>
                            <b>Stylist:</b> {{$stylist->name}}<br>
                            <b>Ngày đặt:</b> {{$bookings->date}} | {{$bookings->timeSheet->hour}}:{{$bookings->timeSheet->minutes}} <br>
                            <b>Đánh Giá:</b> {{isset($reviews->rating) ? $reviews->rating.'⭐' : 'Chưa đánh giá'}} <br>
                            <b>Nhận xét:</b> <br>
                            <div style="float: left; width: 90%; background-color: #bdc3c7; border-radius: 10px; padding: 10px;margin: 5px;">{{isset($reviews->comment) ? $reviews->comment : 'Chưa đánh giá' }}</div>
                            <div style="float: right; width: 90%; background-color: #bdc3c7; border-radius: 10px; padding: 10px; height: auto;"><b>CSKH:</b> {{isset($reviews->reply) ? $reviews->reply : ''}}</div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="text-star">Tổng tiền:</h6>
                        </div>

                        <div class="col-6">
                            <h6 class="text-end">{{number_format($bookings->price, 0,'.','.')}}đ<br>
                                <div style="font-size: 15px; color: red;">{{ isset($payment->booking_id) ? 'Đã thanh toán chuyển khoản.' : 'Đã thanh toán tại quầy.'}}</div>
                            </h6>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>


@endsection