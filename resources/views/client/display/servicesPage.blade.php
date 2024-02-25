@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5"
         data-background="{{asset('client/img/slider/2.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Chi tiết dịch vụ</h5>
                    <h1>Cắt tóc</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Page -->
    <section class="barber-pricing section-padding">
        <div class="container">
            <div class="row">
                <!-- Content -->

                <div class="col-md-7 mb-30">
                    <div class="section-head mb-15">
                        <div class="section-subtitle">{{$model->category->name}}</div>
                        <div class="section-title">{{$model->name}}</div>
                    </div>
                    <p>{{$model->description}}</p>

                    <!-- Pricing -->
                    <div class="menu-list mb-10">
                        <div class="item">
                            <div class="flex">
                                <div class="title">{{$model->name}}</div>
                                <div class="dots"></div>
                                <div class="price"> {{number_format($model->price, 0, ".", ".")}}đ</div>

                            </div>
                        </div>
                    </div>

                    <!-- Image Gallery -->
                    <div class="row">
                        @foreach($model->images as $item)
                            <div class="col-md-4 gallery-item">
                                <a href="client/img/slider/1.jpg" title="" class="img-zoom">
                                    <div class="gallery-box">

                                        <div class="gallery-img"><img src="{{asset('storage/'.$item->url)}}" class="img-fluid mx-auto d-block" alt="work-img">
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-md-4 offset-md-1 sidebar-side">
                    <aside class="sidebar blog-sidebar mb-60">
                        <div class="sidebar-widget services">
                            <div class="widget-inner">
                                <div class="sidebar-title">
                                    <h4>Tất cả các dịch vụ</h4>
                                </div>
                                @foreach($data as $item)
                                <ul>

                                    <li><a href="{{route('services-page', $item)}}">{{$item->name}}</a></li>

                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Other Services -->
    <section class="services-1 section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-head">
                        <div class="section-subtitle">Dịch vụ của chúng tôi</div>
                        <div class="section-title">Các dịch vụ khác</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">
                        @foreach($data as $item)
                        <div class="item mb-0">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
