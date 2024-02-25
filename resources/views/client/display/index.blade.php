@extends('client.layouts.layout')

@section('content')
    <link rel="stylesheet" href="{{asset('css/main.9e417c19.chunk.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <style>
        .section-body {
            background: #14100c;
            border-radius: 10px;
        }

        .body-content {
            padding: 20px;
        }
        .body-content .content-item {
            color: #fff;
            font-size: 16px;
            margin-bottom: 5px;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .body-content .content-item i {
            margin-right: 15px;
        }

        .section-footer button {
            padding: 5px 10px;
            border-radius: 10px;
            color: #14100c;
            border: 1px solid #14100c;
            font-size: 16px;
            font-weight: 500;
        }
    </style>


    <!-- Parallax Image -->
    <div class="banner-header full-height valign bg-img bg-fixed" data-overlay-dark="5"
         data-background="{{asset('client/img/slider/23.jpg')}}">
        <div class="container">
            <div class="row content-justify-center">
                <div class="col-md-12 text-center">
                    <div class="v-middle">
                        <h5>Đẹp trai, Bản lĩnh, Tự tin</h5>
                        <h1>LỰA CHỌN CỦA PHÁI MẠNH<br>6X-PRO BARBER SHOP.</h1>
                        <h5>Trịnh Văn Bô,Nam Từ Liêm,Hà Nội. Liên hệ: 0865886742</h5>
                        <div class="home__form-input">
                            <div class="form-input__form flex mt-1">
                                @if (Auth::check())
                                    <div class="form__input">
                                        <input placeholder="Nhập SĐT để đặt lịch" type="tel" class="my-input"
                                               value="{{Auth::user()->phone_number}}"
                                               oninput="validatePhoneNumber(this)" required>
                                    </div>
                                    <a class="jqr_routeBooking" data-booking-url="#">
                                        <div class="form__button content-center-middle css_booking" role="presentation">
                                            <button class="btn_booking">
                                                ĐẶT LỊCH NGAY
                                            </button>
                                        </div>
                                    </a>
                                @else
                                    <div class="form__input">
                                        <input placeholder="Nhập SĐT để đặt lịch" id="numberBooking"
                                               name="numberBooking" type="tel" class="my-input" value=""
                                               oninput="validatePhoneNumber(this)" required>
                                    </div>
                                    <div class="form__button content-center-middle css_booking" role="presentation">
                                        <button class="btn_booking" id="sendOTPButton2" type="button"
                                                onclick="sendOTP('numberBooking','button2');">
                                            ĐẶT LỊCH NGAY
                                        </button>
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="sign-in-booking"></div>
        <!-- arrow down -->
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </div>

    @if (Auth::check())
        <div id="user-info" data-user-phone="{{Auth::user()->phone_number}}">
            <!-- Đây là nơi bạn muốn hiển thị thông tin người dùng -->
        </div>
        <div id="user-id" data-iduser-phone="{{Auth::user()->id}}">
            <!-- Đây là nơi bạn muốn hiển thị thông tin người dùng -->
        </div>
    @endif

    <section class="about section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30">
                    <div class="section-head mb-20">
                        <div class="section-subtitle">Thành lập 2020</div>
                        <div class="section-title">6X-Pro Barber-shop</div>
                    </div>
                    <p>Công ty cổ phần thương mại & dịch vụ 6X-Pro Barber-shop là nền tảng (lifestyle platform) phục vụ
                        nhu cầu cắt tóc, gội đầu (relax), spa và cung cấp đa dạng sản phẩm chất lượng cao dành riêng cho
                        nam giới.</p>
                    <p>6X-Pro Barber-shop đầu tư mạnh mẽ vào nền tảng công nghệ giúp nâng cao trải nghiệm dịch vụ, hiệu
                        suất vận hành, đồng thời liên tục nghiên cứu và phát triển các dịch vụ và trải nghiệm mới phù
                        hợp với nhu cầu khách hàng nam giới hiện đại.</p>
                    <ul class="about-list list-unstyled mb-30">
                        <li>
                            <div class="about-list-icon"><span class="ti-check"></span></div>
                            <div class="about-list-text">
                                <p>Chúng tôi là những thợ cắt tóc chuyên nghiệp và được chứng nhận.</p>
                            </div>
                        </li>
                        <li>
                            <div class="about-list-icon"><span class="ti-check"></span></div>
                            <div class="about-list-text">
                                <p>Chúng tôi sử dụng sản phẩm chất lượng để làm cho vẻ ngoài của bạn trở nên hoàn
                                    hảo.</p>
                            </div>
                        </li>
                        <li>
                            <div class="about-list-icon"><span class="ti-check"></span></div>
                            <div class="about-list-text">
                                <p>Chúng tôi quan tâm đến sự hài lòng của khách hàng.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp"><img
                        src="{{asset('client/img/about2.jpg')}}" alt="" class="mt-90 mb-30"></div>
                <div class="col col-md-3 animate-box" data-animate-effect="fadeInUp"><img
                        src="{{asset('client/img/about.jpg')}}" alt=""></div>
            </div>
        </div>
    </section>

    <section class="about section-padding bg-darkbrown">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-30 animate-box" data-animate-effect="fadeInLeft"><img
                        src="{{asset('client/img/about3.jpg')}}" alt=""></div>
                <div class="col-md-7 valign mb-30 animate-box" data-animate-effect="fadeInRight">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-head mb-20">
                                <div class="section-subtitle">3 NĂM KINH NGHIỆM</div>
                                <div class="section-title white">Làm cho mọi người trông thật tuyệt vời kể từ năm 2020
                                </div>
                            </div>
                            <p>Vượt qua giới hạn của tiệm tóc truyền thống, 6X-Pro tạo dựng không gian trải nghiệm hoàn
                                toàn mới với trang thiết bị công nghệ hiện đại.</p>
                            <div class="about-bottom">
                                <img src="client/img/signature.svg" alt=""
                                     class="image about-signature">
                                <div class="about-name-wrapper">
                                    <div class="about-rol">Barber, Người sáng lập</div>
                                    <div class="about-name">Đinh Tuấn Anh</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="services-1 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">Các dịch vụ của chúng tôi</div>
                        <div class="section-title">Chúng tôi cũng cung cấp</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="item">
                        <a href="http://2019604925_pham_thanh_do.test/services-page/1">
                            <span class="icon icon-icon-1-1"></span>
                            <h5>Cắt Tóc</h5>
                            <p>Stylist cắt tóc tạo kiểu (Không gội &amp; massage)</p>
                            <div class="shape">
                                <span class="icon icon-icon-1-1"></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <a href="http://2019604925_pham_thanh_do.test/services-page/2">
                            <span class="icon icon-icon-1-2"></span>
                            <h5>SHINE CUT</h5>
                            <p>Stylist cắt - xả - vuốt sáp tạo kiểu (Không gội &amp; massage)</p>
                            <div class="shape">
                                <span class="icon icon-icon-1-2"></span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <a href="http://2019604925_pham_thanh_do.test/services-page/3">
                            <span class="icon icon-icon-1-3"></span>
                            <h5>ShineCombo cắt gội 15 bước</h5>
                            <p>Cắt Gội Massage 10 bước +5 trải nghiệm độc quyền Công nghệ xông mặt chuẩn SPA Tinh dầu thảo mộc thư giãn Công nghệ súng massage giảm đau nhức vai gáy Nâng cấp quy trình cắt (chỉn chu, trọn vẹn hơn) Đổi mới trải nghiệm gội riêng cho phái mạnh</p>
                            <div class="shape">
                                <span class="icon icon-icon-1-3"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <!-- Testimonials -->--}}
    <section class="background bg-img bg-fixed section-padding pb-0" data-background="client/img/slider/6.jpg"
             data-overlay-dark="4">
        <div class="container">
            <div class="row">
                <!-- Testimonials -->
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="testimonials">
                        <div class="testimonials-box">
                            <div class="owl-carousel owl-theme">
                                <div class="item"> <span>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                    </span>
                                    <p>6X-Pro là một trong những địa chỉ làm tóc nam đẹp nhất Hà Nội hiện nay. Khách
                                        hàng đến đây không chỉ được tận hưởng dịch vụ cắt tóc chất lượng, mà còn được
                                        phục vụ tận tình và chuyên nghiệp. Với không gian sang trọng, hiện đại và đội
                                        ngũ nhân viên tay nghề cao, 6X-Pro chắc chắn sẽ đem đến cho khách hàng không
                                        gian thư giãn và trải nghiệm làm tóc tuyệt vời. Hãy đến và trải nghiệm, bạn sẽ
                                        không thất vọng!</p>
                                    <div class="info">
                                        <div class="author-img"><img src="{{asset('client/img/team/1.jpg')}}" alt="">
                                        </div>
                                        <div class="cont">
                                            <h6>Vũ Duy Khánh</h6> <span>Đánh giá của khách hàng</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item"> <span>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                    </span>
                                    <p>6X-Pro là một trong những địa chỉ làm tóc nam đẹp nhất Hà Nội hiện nay. Khách
                                        hàng đến đây không chỉ được tận hưởng dịch vụ cắt tóc chất lượng, mà còn được
                                        phục vụ tận tình và chuyên nghiệp. Với không gian sang trọng, hiện đại và đội
                                        ngũ nhân viên tay nghề cao, 6X-Pro chắc chắn sẽ đem đến cho khách hàng không
                                        gian thư giãn và trải nghiệm làm tóc tuyệt vời. Hãy đến và trải nghiệm, bạn sẽ
                                        không thất vọng!</p>
                                    <div class="info">
                                        <div class="author-img"><img src="{{asset('client/img/team/2.jpg')}}" alt="">
                                        </div>
                                        <div class="cont">
                                            <h6>Emily White</h6> <span>Customer review</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item"> <span>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                        <i class="star-rating"></i>
                                    </span>
                                    <p>6X-Pro là một trong những địa chỉ làm tóc nam đẹp nhất Hà Nội hiện nay. Khách
                                        hàng đến đây không chỉ được tận hưởng dịch vụ cắt tóc chất lượng, mà còn được
                                        phục vụ tận tình và chuyên nghiệp. Với không gian sang trọng, hiện đại và đội
                                        ngũ nhân viên tay nghề cao, 6X-Pro chắc chắn sẽ đem đến cho khách hàng không
                                        gian thư giãn và trải nghiệm làm tóc tuyệt vời. Hãy đến và trải nghiệm, bạn sẽ
                                        không thất vọng!</p>
                                    <div class="info">
                                        <div class="author-img"><img src="{{asset('client/img/team/3.jpg')}}" alt="">
                                        </div>
                                        <div class="cont">
                                            <h6>Daniel Martin</h6> <span>Customer review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <!-- First Class Services -->--}}
    <div class="first-class-services section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">HẠNG NHẤT</div>
                        <div class="section-title white">Các tính năng của chúng tôi</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="square-flip">
                        <div class="square bg-img" data-background="client/img/barber.jpg">
                            <div class="square-container d-flex align-items-end justify-content-end">
                                <div class="box-title">
                                    <h4>Cạo râu</h4>
                                </div>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                        <div class="square2">
                            <div class="square-container2">
                                <h4>Cạo râu</h4>
                                <p><i>Với bàn tay khéo léo của đội ngũ nghệ nhân cạo râu tài năng, chúng tôi cam kết đưa
                                        ra mỗi đường nét cạo râu không chỉ là một quá trình làm đẹp, mà còn là một tác
                                        phẩm nghệ thuật tinh tế trên khuôn mặt của bạn. Khám phá sự thư thái và tự tin
                                        mới qua từng cú dao lướt nhẹ, và hòa mình vào không khí lịch lãm tại không gian
                                        của chúng tôi.</i></p> <a href="{{ route('index')}}" class="button-2 mt-15">Đặt
                                    lịch ngay<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="square-flip">
                        <div class="square bg-img" data-background="client/img/kids.jpg">
                            <div class="square-container d-flex align-items-end justify-content-end">
                                <div class="box-title">
                                    <h4>Cắt tóc cho trẻ</h4>
                                </div>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                        <div class="square2">
                            <div class="square-container2">
                                <h4>Cắt tóc cho trẻ</h4>
                                <p><i>Hãy đưa con bạn đến và trải nghiệm không khí ấm cúng, nụ cười trẻ thơ, và sự sáng
                                        tạo tại không gian chăm sóc tóc dành riêng cho trẻ em của chúng tôi. Chúng tôi
                                        tin rằng mỗi bức ảnh và kí ức về mái tóc mới của bé sẽ là khoảnh khắc đáng nhớ
                                        trên hành trình lớn lên của họ.</i></p> <a href="{{ route('index')}}"
                                                                                   class="button-2 mt-15">Đặt lịch
                                    ngay<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="square-flip">
                        <div class="square bg-img" data-background="client/img/team/b3.jpg">
                            <div class="square-container d-flex align-items-end justify-content-end">
                                <div class="box-title">
                                    <h4>Đào tạo Barber</h4>
                                </div>
                            </div>
                            <div class="flip-overlay"></div>
                        </div>
                        <div class="square2">
                            <div class="square-container2">
                                <h4>Đào tạo Barber</h4>
                                <p><i>Đội ngũ giáo viên của chúng tôi không chỉ là những chuyên gia hàng đầu trong ngành
                                        barbering, mà còn là những người có tâm huyết chia sẻ kiến thức và kinh nghiệm.
                                        Chúng tôi cam kết hỗ trợ học viên không chỉ trên hành trình học tập, mà còn
                                        trong việc phát triển sự sáng tạo và phong cách cá nhân.</i></p> <a
                                    href="{{ route('team')}}" class="button-2 mt-15">Đội ngũ<span></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <!-- Pricing -->--}}
    <section class="barber-pricing section-padding position-re">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-head text-center">
                            <div class="section-subtitle">Các gói giá</div>
                            <div class="section-title">Giá các dịch vụ</div>
                        </div>
                    </div>
                </div>
                @foreach($data as $item)
                    <div class="col-md-6">
                        <div class="menu-list mb-30">
                            <div class="item">
                                <div class="flex">
                                    <div class="title">{{$item->name}}</div>
                                    <div class="dots"></div>
                                    <div class="price">{{number_format($item->price, 0, ".", ".")}}đ</div>
                                </div>
                                <p><i>{{$item->description}}</i></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
{{--    <!-- Team -->--}}
    <section class="team section-padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">Thợ cắt tóc của chúng tôi</div>
                        <div class="section-title white">Các nhà tạo mẫu tóc</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($stylists as $stylist)
                            <div class="team-card mb-30">
                                <div class="team-img"><img src="{{ asset('storage/'.$stylist->image)}}"
                                                           style="height: 300px;width: 400px;" alt="" class="w-100">
                                </div>
                                <div class="team-content">
                                    <h3 class="team-title"><span>Barber</span></h3>
                                    <p class="team-text">{{$stylist->excerpt}}</p>
                                    <div class="social">
                                        <div class="full-width"><a href="#"><i class="ti-linkedin"></i></a> <a href="#"><i
                                                    class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a>
                                            <a href="#"><i class="ti-instagram"></i></a></div>
                                    </div>
                                    <a href="{{ url('/team-details/' . $stylist->id) }}" class="button-1 mt-15">Team Details<span></span></a>
                                </div>
                                <div class="title-box">
                                    <h3 class="mb-0">{{$stylist->name}}<span>Barber</span></h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <!-- Services - We Also Offer -->--}}

{{--    <!-- News -->--}}
    <section class="news section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">Tin tức mới nhất</div>
                        <div class="section-title white">Tin tức & Bài viết</div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($blogs as $blog)
                            <div class="item">
                                <div class="position-re o-hidden"><img src="{{ asset('storage/image/'.$blog->image)}} "
                                                                       style="height: 350px;width: 560px;" alt="">
                                    <div class="date">
                                        <a href="{{route('detail.blog',$blog->id)}}"> <span>Dec</span> <i>29</i> </a>
                                    </div>
                                </div>
                                <div class="con">
                                <span class="category">
                                    <a href="{{route('detail.blog',$blog->id)}}">Chăm sóc tóc</a>
                                </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <!-- Clients -->--}}
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="owl-carousel owl-theme">
                        <div class="clients-logo">
                            <a href="#"><img src="{{asset('client/img/clients/2.png')}}" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#"><img src="{{asset('client/img/clients/3.png')}}" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#"><img src="{{asset('client/img/clients/4.png')}}" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#"><img src="{{asset('client/img/clients/5.png')}}" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#"><img src="{{asset('client/img/clients/6.png')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('be/assets/libs/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('js/jsClient/home.js')}}"></script>
    <script src="{{asset('js/jsAdmin/toast.js')}}"></script>
@endsection

