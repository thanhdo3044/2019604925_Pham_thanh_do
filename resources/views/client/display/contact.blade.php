@extends('client.layouts.layout')

@section('content')
    <!-- Header Banner -->
    <div class="banner-header valign bg-img bg-fixed" data-overlay-dark="4" data-background="{{asset('client/img/slider/11.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center caption mt-60">
                    <h5>Liên lạc</h5>
                    <h1>Liên hệ với chúng tôi</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact -->
    <section class="info-box section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section-head mb-30">
                        <div class="section-subtitle">Thông tin liên lạc</div>
                        <div class="section-title mb-20">Liên lạc</div>
                    <p>Thấu hiểu nhu cầu, hỗ trợ nhiệt tình</p>
                    </div>
                    <div class="item"> <span class="icon ti-location-pin"></span>
                        <div class="cont">
                            <h5>Địa chỉ</h5>
                            <p>Trường Đại học Công nghiệp Hà Nội, Số 298 Đ. Cầu Diễn, Minh Khai, Bắc Từ Liêm, Hà Nội</p>
                        </div>
                    </div>
                    <div class="item"> <span class="icon ti-mobile"></span>
                        <div class="cont">
                            <h5>Số điện thoại</h5>
                            <p><a href="tel:8551004444">0865886742</a></p>
                        </div>
                    </div>
                    <div class="item"> <span class="icon ti-email"></span>
                        <div class="cont">
                            <h5>e-Mail</h5>
                            <p>6xpro@barber.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 offset-md-1">
                    <div class="contact-form bg-darkbrown">
                        <div class="booking-inner clearfix">
                            <form method="post" class="form1 clearfix contact__form" action="https://duruthemes.com/demo/html/perukar/multipage-image/mail.php">
                                <div class="row">
                                    <div class="col-md-12 text-center mb-20">
                                        <h4 class="white">Mẫu liên hệ</h4>
                                    </div>
                                </div>
                                <!-- Form message -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                            Thông điệp của bạn đã được gửi thành công.
                                        </div>
                                    </div>
                                </div>
                                <!-- Form elements -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input1_wrapper">
                                            <label>Tên</label>
                                            <div class="input2_inner">
                                                <input type="text" class="form-control input" placeholder="Tên" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input1_wrapper">
                                            <label>Số điện thoại</label>
                                            <div class="input2_inner">
                                                <input type="text" class="form-control input" placeholder="Số điện thoại" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input1_wrapper">
                                            <label>e-Mail</label>
                                            <div class="input2_inner">
                                                <input type="email" class="form-control input" placeholder="e-Mail" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input1_wrapper">
                                            <label>Chủ thể</label>
                                            <div class="input2_inner">
                                                <input type="text" class="form-control input" placeholder="Chủ thể" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <textarea name="message" id="message" cols="30" rows="4" placeholder="Tin nhắn" required></textarea>
                                    </div>
                                    <div class="col-md-12 mb-30">
                                        <button type="submit" class="btn-form2-submit">Gửi tin nhắn</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Maps -->
    <section class="section-padding pb-0 pt-0 bg-darkbrown">
        <!-- Maps -->
        <div class="full-width">
            <div class="no-spacing map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.464418443745!2d105.73148037476989!3d21.054105536908544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31345457e292d5bf%3A0x20ac91c94d74439a!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBDw7RuZyBuZ2hp4buHcCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1704202517723!5m2!1svi!2s"  height="450" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </section>
@endsection
