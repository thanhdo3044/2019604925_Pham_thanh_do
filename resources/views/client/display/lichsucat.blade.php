@extends('client.layouts.layout')

@section('style')
    <link rel="stylesheet" href="{{asset('client/css/lichsucat.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.9e417c19.chunk.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/booking.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&amp;display=swap">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')
    <div class="fix-hed" style=" width: 100% ; height: 100px;background: #14100D;">


    </div>
    @if(@session('Lỗi!'))
        <script>
            swal("Lỗi!", "{{ Session::get('Lỗi!') }}", 'error', {
                button: true,
                button: "OK ",
                dangerModel: true,
            })
        </script>
    @endif
    @if(@session('success'))
        <script>
            swal("success", "{{ Session::get('success') }}", 'success', {
                button: true,
                button: "OK ",
            })
        </script>
    @endif






    <section class="info-box section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6" id="jqr-displayBooking">
                    <div class="new-top-navigator pointer " style="background-color: #14100c; color: #fff;"><span
                            class="text-center">Lịch Sử Đã Cắt</span></div>
                    @if(Auth::check())

                        @if(Auth::user()->phone_number && isset($bookings->status) == 3)

                            <div class="main-screen">

                                <div class="" id="serviceAttributeId">
                                    <div class="font-medium text-lg mb-3">
                                        <h5 class="text-center text-dark"
                                            style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Mời
                                            anh/chị đánh giá chất lượng phục vụ</h5>
                                        <br>
                                        <p class="text-center text-dark">Phản hồi của anh/chị sẽ giúp chúng em cải thiện
                                            chất lượng dịch vụ tốt hơn</p>
                                        <br>
                                    </div>
                                    <div class="cursor-pointer flex item-center rounded justify-content-center "
                                         style="height: 2.75rem; padding-left: 0.625rem; padding-right: 0.625rem;"
                                         aria-hidden="true">

                                        <form action="{{route('client.lichsucat')}}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{$bookings->id}}" name="booking_id">
                                            <fieldset class="rating fs-1">
                                                <input type="radio" id="star5" name="rating" value="5"/><label
                                                    class="full" for="star5" title="🤩 - 5 stars"></label>
                                                <input type="radio" id="star4" name="rating" value="4"/><label
                                                    class="full" for="star4" title="😍 - 4 stars"></label>
                                                <input type="radio" id="star3" name="rating" value="3"/><label
                                                    class="full" for="star3" title="😃 - 3 stars"></label>
                                                <input type="radio" id="star2" name="rating" value="2"/><label
                                                    class="full" for="star2" title="🥺 - 2 stars"></label>
                                                <input type="radio" id="star1" name="rating" value="1"/><label
                                                    class="full" for="star1" title="😡 - 1 star"></label>
                                            </fieldset>

                                    </div>
                                    <br>
                                    <div class="block__box">
                                        <div class="mt-4">
                                            <div class="flex flex-wrap -mx-1.5">
                                                <textarea name="comment" id="" cols="20" rows="5"
                                                          class="border border-dark text-dark"></textarea>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="new-affix-v2">

                                <div class="flex space-between text-center content-step ">
                                    <button type="submit" class="right button-next pointer btn">Hoàn tất</button>
                                </div>
                                </form>
                            </div>
                        @else
                            <div style="background-color: #fff; padding: 10px; " class="d-flex justify-content-center">
                                <b class="text-center" style="font-family: 'Outfit', sans-serif; font-size: 20px;">Anh
                                    chị chưa đăng kí dịch vụ nào bên em. <br> Anh chị bấm đăng kí bên dưới 👇 để trải
                                    nghiêm dịch vụ bên em ạ !</b>
                                <br>
                            </div>
                            <div style="background-color: #fff; padding: 10px;" class="d-flex justify-content-center">
                                <a href="{{route('client.booking', ['phone'=>str_replace('+84', '', Auth::user()->phone_number)])}}" class="btn btn-primary">Đăng kí ngay</a>
                                
                            </div>

                        @endif
                        <br>




                        @foreach($reviewIds as $reviewId)
                            <div
                                style="background-color: #fff; border-radius: 10px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                                <div class="row">
                                    <div class="col-5" style="margin-left: 30px;">
                                    @foreach($reviewId->results->take(1) as $result)
                                            
                                        <img src="/storage/{{$result->image}}" alt="" style="font-size: 130px; height: 230px;">
                                    @endforeach
                                    </div>
                                    <div class="col-6" style="margin-top: 40px;">
                                        <h6 style="display: inline-block;">Số điện thoại
                                            đặt:</h6> {{$reviewId->user_phone}}
                                        <br>
                                        <h6 style="display: inline-block;"> Ngày đặt:</h6> {{$reviewId->date}}
                                        <br>
                                        <h6 style="display: inline-block;"> Giờ đặt:</h6> {{$reviewId->timeSheet->hour}}
                                        :{{$reviewId->timeSheet->minutes}}
                                        <br>
                                        <a href="{{route('client.detailhistory',['id'=>$reviewId->id])}}"
                                           class="btn btn-primary m-3">Chi tiết</a>

                                    </div>
                                </div>


                            </div>
                            <br>
                        @endforeach
                    </div>
                @else
                    <div style="background-color: #fff; padding: 10px; " class="d-flex justify-content-center">
                        <b class="text-center" style="font-family: 'Outfit', sans-serif; font-size: 20px;">Anh chị chưa đăng kí dịch vụ nào bên em. <br> Anh chị bấm đăng kí bên dưới 👇 để trải nghiêm dịch vụ bên em ạ !</b>

                        <br>
                    </div>
                    <div style="background-color: #fff; padding: 10px;" class="d-flex justify-content-center">
                        <a href="{{route('client.display.index')}}" class="btn btn-primary">Đăng kí ngay</a>

                    </div>

                @endif
            </div>
        </div>
    </section>

    <script>
        //
        // function autoload() {
        //     location.reload();
        // }

        //
        //
        $('.stars i').on('click', function () {
            $('.stars span, .stars i').removeClass('active');

            $(this).addClass('active');
            $('.stars span').addClass('active');
        });
    </script>

@endsection
