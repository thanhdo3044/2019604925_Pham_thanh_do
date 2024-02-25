@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="5" data-background="{{asset('client/img/slider/9.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Tin tức</h5>
                    <h1>Tin tức mới nhất</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- News  -->
    <section class="blog section-padding">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-md-6">
                    <div class="item mb-60">
                        <div class="position-re o-hidden"> <img src="{{ asset('storage/image/'.$blog->image)}}" style="height: 300px;width: 560px" alt="">
                            <div class="date">
                                <a href="{{route('detail.blog',$blog->id)}}"> <span>Dec</span> <i>29</i> </a>
                            </div>
                        </div>
                        <div class="con"> <span class="category">
                                <a href="{{route('detail.blog',$blog->id)}}">Hair Care</a>
                            </span>
                            <h5><a href="{{route('detail.blog',$blog->id)}}">{{$blog->title}}</a></h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <!-- Pagination -->
                    <ul class="news-pagination-wrap align-center mb-30 mt-30">
                        <li><a href="blog.html#"><i class="ti-angle-left"></i></a></li>
                        <li><a href="blog.html#">1</a></li>
                        <li><a href="blog.html#" class="active">2</a></li>
                        <li><a href="blog.html#">3</a></li>
                        <li><a href="blog.html#"><i class="ti-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
