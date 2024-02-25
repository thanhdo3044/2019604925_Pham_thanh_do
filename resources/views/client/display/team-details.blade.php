@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{asset('client/img/slider/3.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Barber</h5>
                    <h1>{{$detailbarber->name}}</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Details -->
    <section class="team-box section-padding pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-30"> <img src="{{asset('storage/'.$detailbarber->image)}}" class="img-fluid mb-30" alt="">
                    <div class="section-head mb-20">
                        <div class="section-subtitle">Giới thiệu về tôi</div>
                        <div class="section-title mb-15">{{$detailbarber->name}}</div>
                        <p>{{$detailbarber->extends}}</p>
                        <li>
                            <div class="about-list-icon"> <span class="ti-check"></span> </div>
                            <div class="about-list-text">
                                <p>Tôi là một thợ cắt tóc chuyên nghiệp và được chứng nhận.</p>
                            </div>
                        </li>
                        <li>
                            <div class="about-list-icon"> <span class="ti-check"></span> </div>
                            <div class="about-list-text">
                                <p>Tôi luôn quan tâm đến sự hài lòng của khách hàng.</p>
                            </div>
                        </li>
                        </ul>
                    </div>
                    <ul class="nav nav-tabs simpl-bord mt-60" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"> <span class="nav-link active cursor-pointer" id="vision-tab" data-bs-toggle="tab" data-bs-target="#biography">Tiểu sử</span> </li>
                        <li class="nav-item" role="presentation"> <span class="nav-link cursor-pointer" id="mission-tab" data-bs-toggle="tab" data-bs-target="#education">Đào tạo</span> </li>
                        <li class="nav-item" role="presentation"> <span class="nav-link cursor-pointer" id="mission-tab" data-bs-toggle="tab" data-bs-target="#awards">Giải thưởng</span> </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="biography" role="tabpanel" aria-labelledby="vision-tab">
                            <p>Tiệm cắt tóc chúng tôi ra đời vào năm 2020 với sứ mệnh mang đến không gian tươi mới và dịch vụ cắt tóc chất lượng. Được thành lập bởi đội ngũ nghệ sĩ tóc tận tâm, chúng tôi tự hào là điểm đến tin cậy cho khách hàng muốn thay đổi diện mạo và tìm kiếm sự tự tin mới.</p>
                            <p>Năm 2020, chúng tôi khởi đầu với đam mê đối với nghệ thuật cắt tóc và mong muốn tạo nên không gian thân thiện, nơi mỗi khách hàng không chỉ trải nghiệm sự thay đổi về hình ảnh mà còn tận hưởng một trải nghiệm thư giãn và thoải mái.</p>
                        </div>
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="mission-tab">
                            <p>Chúng tôi đặt sự đào tạo thợ cắt tóc lên hàng đầu, với chương trình huấn luyện chuyên sâu từ năm 2020. Đội ngũ giáo viên giàu kinh nghiệm của chúng tôi cam kết truyền đạt kiến thức và kỹ năng cắt tóc hàng đầu, đồng thời tạo dựng môi trường học tập tích cực để phát triển tài năng và sự sáng tạo trong ngành nghề này.</p>
                            <p>Bằng cách kết hợp lý thuyết và thực hành sâu rộng, chúng tôi không chỉ đào tạo kỹ thuật cắt tóc xuất sắc mà còn tập trung vào khía cạnh nghệ thuật và giao tiếp khách hàng. Chúng tôi tin rằng sự đa chiều trong quá trình đào tạo sẽ giúp thợ cắt tóc của chúng tôi tỏa sáng trong ngành công nghiệp làm đẹp.</p>
                        </div>
                        <div class="tab-pane fade" id="awards" role="tabpanel" aria-labelledby="mission-tab">
                            <p>Với đội ngũ thợ cắt tóc tài năng và sáng tạo, cửa hàng của chúng tôi đã đoạt được nhiều giải thưởng danh giá trong lĩnh vực cắt tóc, chứng minh sự cam kết của chúng tôi đối với chất lượng và sự xuất sắc trong nghệ thuật làm đẹp.</p>
                            <p>Chúng tôi tự hào về việc được công nhận thông qua các giải thưởng về cắt tóc, điều này là động lực lớn để tiếp tục nỗ lực và đem đến cho khách hàng trải nghiệm cắt tóc tốt nhất có thể.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="wrap">
                        <div class="desc">
                            <div class="section-title mb-15">Liên hệ với tôi</div>
                            <p>Chào mừng bạn đến với tiệm cắt tóc của tôi, nơi nâng tầm vẻ đẹp và tự tin của bạn. Chúng tôi cam kết mang đến trải nghiệm cắt tóc chuyên nghiệp và phục vụ tận tâm. Hãy đến và trải nghiệm sự khác biệt!</p>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <h6>Email của tôi</h6>
                            </div>
                            <div class="coll">
                                <h5>{{$detailbarber->email}}</h5>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <h6>Gọi cho tôi</h6>
                            </div>
                            <div class="coll">
                                <h5>{{$detailbarber->phone_number}}</h5>
                            </div>
                        </div>
                        <div class="cont">
                            <div class="coll">
                                <div class="social-icon"> <a href="index.html"><i class="ti-facebook"></i></a> <a href="index.html"><i class="ti-twitter"></i></a> <a href="index.html"><i class="ti-instagram"></i></a> <a href="index.html"><i class="ti-pinterest"></i></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Image Gallery -->
    <section class="section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-0">Công việc </h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 gallery-item">
                    <a href="client/img/slider/3.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/3.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="client/img/slider/4.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/4.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="client/img/slider/5.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/5.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 gallery-item">
                    <a href="client/img/slider/14.jpg" title="" class="img-zoom">
                        <div class="gallery-box">
                            <div class="gallery-img"> <img src="client/img/slider/14.jpg" class="img-fluid mx-auto d-block" alt="work-img"> </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
