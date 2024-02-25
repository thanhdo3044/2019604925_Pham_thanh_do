@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{asset('client/img/slider/11.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Câu hỏi Barber</h5>
                    <h1>Các câu hỏi phổ biến</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Faqs -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                @foreach ($faq as $item) 
                <div class="col-md-6">
                    <ul class="accordion-box clearfix">
                        <li class="accordion block">
                            <div class="acc-btn size-20">{{$item->question}}</div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">{{strip_tags($item->answer)}}</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
