@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{asset('client/img/slider/1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>6X-Pro Barber-shop</h5>
                    <h1>Lịch sử hình thành</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- About -->
    <section class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30">
                    <div class="section-head mb-20">
                        <div class="section-subtitle">Thành lập 2020</div>
                        <div class="section-title">6X-Pro Barber-shop </div>
                    </div>
                    <p>Công ty cổ phần thương mại & dịch vụ 6X-Pro Barber-shop là nền tảng (lifestyle platform) phục vụ nhu cầu cắt tóc, gội đầu (relax), spa và cung cấp đa dạng sản phẩm chất lượng cao dành riêng cho nam giới.</p>
                    <p>6X-Pro Barber-shop đầu tư mạnh mẽ vào nền tảng công nghệ giúp nâng cao trải nghiệm dịch vụ, hiệu suất vận hành, đồng thời liên tục nghiên cứu và phát triển các dịch vụ và trải nghiệm mới phù hợp với nhu cầu khách hàng nam giới hiện đại.</p>
                    <ul class="about-list list-unstyled mb-30">
                        <li>
                            <div class="about-list-icon"> <span class="ti-check"></span> </div>
                            <div class="about-list-text">
                                <p>Chúng tôi là những thợ cắt tóc chuyên nghiệp và được chứng nhận.</p>
                            </div>
                        </li>
                        <li>
                            <div class="about-list-icon"> <span class="ti-check"></span> </div>
                            <div class="about-list-text">
                                <p>Chúng tôi sử dụng sản phẩm chất lượng để làm cho vẻ ngoài của bạn trở nên hoàn hảo.</p>
                            </div>
                        </li>
                        <li>
                            <div class="about-list-icon"> <span class="ti-check"></span> </div>
                            <div class="about-list-text">
                                <p>Chúng tôi quan tâm đến sự hài lòng của khách hàng.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col col-md-3"> <img src="client/img/about2.jpg" alt="" class="mt-90 mb-30"> </div>
                <div class="col col-md-3"> <img src="client/img/about.jpg" alt=""> </div>
            </div>
        </div>
    </section>
    <!-- Services Box -->
    <section class="services-box section-padding pt-0">
        <div class="container">
            <div class="row">
                @foreach($data->slice(0, 3) as $item)
                <div class="col-md-4">
                    <div class="item">
                        <a href="services-page.html">
                            @if ($item->id == 1)
                            <span class="icon icon-icon-1-1"></span>
                        @elseif ($item->id == 2)
                            <span class="icon icon-icon-1-2"></span>
                        @elseif ($item->id == 3)
                            <span class="icon icon-icon-1-3"></span>
                        @elseif ($item->id == 4)
                            <span class="icon icon-icon-1-4"></span>
                        @elseif ($item->id == 5)
                            <span class="icon icon-icon-1-6"></span>
                        @elseif ($item->id == 6)
                            <span class="icon icon-icon-1-8"></span>
                        @elseif ($item->id == 7)
                            <span class="icon icon-icon-1-9"></span>
                        @elseif ($item->id == 8)
                            <span class="icon icon-icon-1-18"></span>
                        @elseif ($item->id == 9)
                            <span class="icon icon-icon-1-10"></span>
                        @else
                            <span class="icon icon-icon-1-9"></span>
                        @endif
                            <h5>{{$item->name}}</h5>
                            <p>{{$item->description}}</p>
                        </a>
                    </div>
                </div>
                @endforeach  
            </div>
        </div>
    </section>
    <!-- Our History -->
    <section class="about section-padding bg-darkbrown">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mb-30 animate-box" data-animate-effect="fadeInLeft"> <img src="client/img/about3.jpg" alt=""> </div>
                <div class="col-md-7 valign mb-30 animate-box" data-animate-effect="fadeInRight">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-head mb-20">
                                <div class="section-subtitle">3 NĂM KINH NGHIỆM</div>
                                <div class="section-title white">Làm cho mọi người trông thật tuyệt vời kể từ năm 2020</div>
                            </div>
                            <p>Vượt qua giới hạn của tiệm tóc truyền thống, 6X-Pro tạo dựng không gian trải nghiệm hoàn toàn mới với trang thiết bị công nghệ hiện đại.</p>
                            <div class="about-bottom"> <img src="client/img/signature.svg" alt="" class="image about-signature">
                                <div class="about-name-wrapper">
                                    <div class="about-rol">Barber, Nguòi sáng lập</div>
                                    <div class="about-name">Đinh Tuấn Anh</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video -->
    <section class="section-padding video-wrapper video bg-img bg-fixed" data-overlay-dark="4" data-background="client/img/slider/5.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="section-head text-center">
                        <div class="section-title white">Xem video quảng cáo tiệm cắt tóc của chúng tôi</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <a class="vid" href="https://youtu.be/e2x0UXVU2yg">
                        <div class="vid-butn"> <span class="icon"><i class="ti-control-play"></i></span> </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Team -->
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">THỢ CẮT TÓC CỦA CHÚNG TÔI</div>
                        <div class="section-title white">Các nhà tạo mẫu tóc</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($stylists as $stylist)
                        <div class="team-card mb-30">
                            <div class="team-img"><img src="{{ asset('storage/'.$stylist->image)}}" style="height: 300px;width: 400px" alt="" class="w-100"></div>
                            <div class="team-content">
                                <h3 class="team-title">{{$stylist->name}}<span>Barber</span></h3>
                                <p class="team-text">{{$stylist->excerpt}}</p>
                                <div class="social">
                                    <div class="full-width"> <a href="#"><i class="ti-linkedin"></i></a> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-instagram"></i></a> </div>
                                </div> <a href="team-details.html" class="button-1 mt-20">Team Details<span></span></a>
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

@endsection
