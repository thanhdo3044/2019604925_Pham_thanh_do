@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{asset('client/img/slider/12.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Thợ cắt tóc của chúng tôi</h5>
                    <h1>Nhà tạo mẫu tóc</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Team -->
    <section class="team-page section-padding">
        <div class="container">
            <div class="row">
                @foreach ($stylists as $stylist)
                <div class="col-md-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="team-page-card mb-60">
                        <div class="team-img"><img src="{{asset('storage/'.$stylist->image)}}" style="height: 300px;width: 400px" alt="" class="w-100"></div>
                        <div class="team-content">
                            <h3 class="team-title">{{$stylist->name}}<span>Barber</span></h3>
                            <p class="team-text">{{$stylist->excerpt}}</p>
                            <div class="social">
                                <div class="full-width"> <a href="#"><i class="ti-linkedin"></i></a> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-instagram"></i></a> </div>
                            </div> <a href="{{ url('/team-details/' . $stylist->id) }}" class="button-1 mt-15">Team Details<span></span></a>
                        </div>
                        <div class="title-box">
                            <h3 class="mb-0">{{$stylist->name}}<span>Barber</span></h3>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </section>
    <!-- Appointment Form -->
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
