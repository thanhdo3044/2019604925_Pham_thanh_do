@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="6" data-background="{{asset('client/img/slider/9.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Thư viện ảnh </h5>
                    <h1>Các kiểu tóc của chúng tôi</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Image Gallery -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">Kiểu tóc</div>
                        <div class="section-title">Thư viện</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- 3 columns -->
                @foreach($portfolio->slice(0, 3) as $item)
                <div class="col-md-4 gallery-item">
                    <a href="" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img">
                                <img src="{{ asset('storage/image/'.$item->image)}}" style="height: 380px;width: 500px" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- 2 columns -->
                @foreach($portfolio->slice(3,2) as $item)
                <div class="col-md-6 gallery-item">
                    <a href="" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img">
                                <img src="{{ asset('storage/image/'.$item->image)}}" alt="" style="width: 700px;height: 500px;">
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
                <!-- 3 columns -->
                @foreach($portfolio->slice(5, 3) as $item)
                <div class="col-md-4 gallery-item">
                    <a href="" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img">
                                <img src="{{ asset('storage/image/'.$item->image)}}" style="height: 380px;width: 400px" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Video Gallery -->
    {{-- <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head text-center">
                        <div class="section-subtitle">Portfolio</div>
                        <div class="section-title">Video Gallery</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- 2 columns -->
                <div class="col-md-6">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/8.jpg" alt="">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/9.jpg" alt="Vimeo">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                <!-- 3 columns -->
                <div class="col-md-4">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/11.jpg" alt="YouTube">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/13.jpg" alt="YouTube">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="vid-area mb-30">
                        <div class="vid-icon"> <img src="client/img/slider/16994304259.jpg" alt="YouTube">
                            <a class="video-gallery-button vid" href="https://youtu.be/e2x0UXVU2yg"> <span class="video-gallery-polygon">
                                    <i class="ti-control-play"></i>
                                </span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection
