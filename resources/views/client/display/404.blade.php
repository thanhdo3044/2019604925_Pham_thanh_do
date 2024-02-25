@extends('client.layouts.layout')

@section('content')
    <!-- Comming soon -->
    <section class="comming section-padding text-center">
        <div class="v-middle">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h1>404</h1>
                        <h2>Không tìm thấy!</h2>
                        <h6>XIN LỖI, CHÚNG TÔI KHÔNG THỂ TÌM THẤY TRANG ĐÓ!</h6>
                        <p>Trang bạn đang tìm kiếm đã bị di chuyển, xóa, đổi tên hoặc chưa bao giờ tồn tại.</p>
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <form>
                                    <input type="text" name="search" placeholder="Search" required>
                                    <button>Tìm kiếm </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-20">
                    <div class="col-md-12">
                        <a href='{{ route('index') }}' class="link-btn"><span class="ti-arrow-left"></span> Trang chủ </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
