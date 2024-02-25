@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="client/img/slider/4.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Chúng tôi có gì</h5>
                    <h1>Dịch vụ của chúng tôi</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Services -->
    <section class="services-1 section-padding">
        <div class="container">
            <div class="row">
                @foreach($data as $item)
                    <div class="col-md-4">
                        <div class="item">
                            <a href="{{route('services-page', $item)}}">
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
                                <div class="shape">
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
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- First Class Services -->
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
    <!-- Clients -->
    <section class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="owl-carousel owl-theme">
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/2.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/3.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/4.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/5.png" alt=""></a>
                        </div>
                        <div class="clients-logo">
                            <a href="#0"><img src="client/img/clients/6.png" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection





