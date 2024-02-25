@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="6"
         data-background="{{asset('client/img/slider/8.jpg')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center caption mt-60">
                    <h2>{{$detailBlog->title}}</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Post -->
    <section class="section-padding">
        <div class="container">
            <div class="row">
                <h3>{{$detailBlog->title}}</h3>
                <div class="col-md-12"><img src="{{ asset('storage/image/'.$detailBlog->image)}}" class="mb-30" alt="">
                    <p>{{ strip_tags($detailBlog->description)}}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
