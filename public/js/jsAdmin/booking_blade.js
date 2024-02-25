document.addEventListener("DOMContentLoaded", function () {
    const btnShowModal = $('.jqr-btn-edit');
    const btnCancel = $('.jquery-btn-cancel');
    const fileInput = $('#service-image');
    const imgContainer = $('.selected-images');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show()
        } else {
            $('.jquery-main-modal').hide();
            imgContainer.empty();
        }
    }

    btnCancel.on('click', function () {
        showModal(false);
    });
    $(document).on('click', '.jqr-btn-edit', showModal);

    fileInput.slideUp();
    fileInput.on('change', function () {
        const fileList = this.files;
        imgContainer.html('');
        for (let i = 0; i < fileList.length; i++) {
            let file = fileList[i];
            let render = new FileReader();
            render.readAsDataURL(file);
            render.onload = function (e) {
                let imgUrl = e.target.result;
                imgContainer.append(`
                    <div class="item-images">
                    <img src="${imgUrl}" width="50%"  alt=""/>
                    </div>
                `);
            }
        }
    })


    $('#formModalBooking').submit(function (e) {
        e.preventDefault();
        // console.log($(this).data('id'));
        var formData = new FormData($(this)[0]);
        let id = $(this).data('id');
        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Xử lý phản hồi từ server
                toastr['success']('Cập nhật lịch đặt thành công');
                showModal(false);

                loadAll(id);

                // $('#formModalService').closest('.modal').modal('hide');
            },
            error: function () {
                // Xử lý khi có lỗi kết nối đến server
                console.log('Error connecting to server');
            }
        });
    });

    function loadAll(id) {
        console.log('Đã chạy loadAll');
        $.ajax({
            url: '/admin/booking_blade/api/detail/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let service = data.service;
                let imageHtml = '';
                // console.log(data.results);
                for (let i = 0; i < data.results.length; i++) {
                    let item = data.results[i];
                    imageHtml += `<img src="/storage/${item.image}" style="border: 1px solid #000; max-width: 150px; margin: 10px;" alt="img" srcset="">`;
                }
                console.log(service);
                let is_status = '';
                if (data.status === 3) {
                    is_status = `<span
                                           class="badge bg-success" >Đã cắt
                              </span>`
                }
                if (data.status === 1) {
                    is_status = `<span
                                            class="badge bg-danger" >Chờ xác nhận
                                        </span>`
                }
                if (data.status === 2) {
                    is_status = `<span
                                            class="badge bg-warning" >Chờ xác nhận
                                        </span>`
                }
                $('.task-detail').html(`
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>
                            <div class="d-flex mb-3">
                                <img class="flex-shrink-0 me-3 rounded-circle avatar-md" alt="64x64"
                                     src="/client/img/logobarber.png">
                                <div class="flex-grow-1">
                                    <h4 class="media-heading mt-0">${data.user_phone}</h4>

                                    ${is_status}

                                </div>
                            </div>

                            <h4>Stylist: ${data.stylist.name}</h4>


                            <div class="row task-dates mb-0 mt-2">
                                <div class="col-lg-6">
                                    <h4 class="font-600 m-b-5">Ngày</h4>
                                    <h5> ${data.date}</h5>
                                </div>
                                <div class="col-lg-6">
                                    <h4 class="font-600 m-b-5">Thời gian</h4>
                                    <h5> ${data.timesheet.hour}h ${data.timesheet.minutes}ph</h5>
                                </div>
                            </div>

                            <h4>Yêu cầu đặc biệt: ${data.special_requirements}</h4>


                            <h4 style="color: ${data.is_consultant == 1 ? "green" : "red"};">
                                Yêu cầu tư vấn: ${data.is_consultant === 1 ? "Có" : "Không"}
                            </h4>

                            <h4 style="color: ${data.is_accept_take_a_photo == 1 ? "green" : "red"};">
                                Chụp ảnh sau khi cắt để làm mẫu cho lần
                                sau: ${data.is_accept_take_a_photo === 1 ? "Có" : "Không"}
                            </h4>

                            <h5 style="color: ${data.pttt == 2 ? "green" : "red"};">
                                Trạng thái thanh toán : ${data.pttt == 2 ? "Đã thanh toán" : "Thanh toán tại quầy" }
                            </h5>

                            <h4>
                                 Trạng thái: ${is_status}
                            </h4>

                            <table
                                class="table table-bordered dt-responsive table-responsive nowrap text-center align-content-sm-center">
                                <thead>
                                <tr>
                                    <th>Tên dịch vụ</th>
                                    <th>Giá dịch vụ</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                                </thead>
                                <tbody id="jquery-list">

                                </tbody>
                            </table>


                                ${imageHtml}

                            <button type="button" class="btn btn-warning position-absolute bottom-0 end-50 rounded jqr-btn-edit">Cập nhật</button>
                    `);
                $.each(service, function (index, item) {
                    $('#jquery-list').append(`
                    <tr>
                        <td>${item.name}</td>
                        <td>${item.price}</td>
                        <td>${item.is_active === 1 ? "Hoạt động" : "Không hoạt động"}</td>
                        <td>
                            <button class="js-btn-delete btn btn-danger" ${data.status === 0 || data.status === 3 ? 'disabled' : ''} data-booking-id="${data.id}" data-service-id="${item.id}" >
                                Xóa
                            </button>
                        </td>
                    </tr>

                    `);
                });
                $('#jquery-list').append(`

                        <tr id="tong-tien-row">
                            <td colspan="1" style="text-align: center; font-weight: bold;">Tổng tiền</td>
                            <td colspan="3" id="tong-tien-cell" style="font-weight: bold;">0</td>
                        </tr>
                   `);
                updateTongTien();
            },
            error: function (error) {
                console.error(error);
            }
        });

    }

    $(document).on('click', '.js-btn-delete', function () {
        if (confirm('Bạn có chắc chắn muốn xóa ?')) {
            bookingId = $(this).data('booking-id');
            serviceId = $(this).data('service-id');
            token = $('meta[name="csrf-token"]').attr('content');
            deleteBooking();
        }
    });

    function deleteBooking() {

        $.ajax({
            url: '/admin/booking_blade/xoa-dich-vu-booking/' + bookingId + '/' + serviceId,
            type: 'DELETE',
            success: function (response) {
                alert(response.message);
                $('#service_' + serviceId).remove();
                loadAll(bookingId);

            },
            error: function (error) {
                alert('Đã có lỗi xảy ra.');
                console.error(error);
            }
        });
    }

    var tongTien = 0;
    var soNutDuocChon = 0;
    var selectedServiceIds = [];
    // Xử lý khi nút Chọn được click
    $('.btn-chon-dich-vu').click(function () {
        var serviceId = $(this).data('service-id');
        var servicePrice = $(this).data('service-price');
        var isSelected = $(this).data('selected');
        // Chuyển đổi trạng thái và cập nhật giao diện
        isSelected = !isSelected;
        if (isSelected) {
            selectedServiceIds.push(serviceId);
            // Nếu đã chọn, thêm vào tổng tiền
            tongTien += servicePrice;
            $(this).removeClass('btn-outline-primary').addClass('btn-primary');
            $(this).text('Đã chọn');
        } else {
            selectedServiceIds = selectedServiceIds.filter(function (id) {
                return id !== serviceId;
            });
            // Nếu chưa chọn, giảm từ tổng tiền
            tongTien -= servicePrice;
            $(this).removeClass('btn-primary').addClass('btn-outline-primary');
            $(this).text('Chọn');
        }

        soNutDuocChon = selectedServiceIds.length;
        // Cập nhật trạng thái và tổng tiền
        $(this).data('selected', isSelected);

        // Cập nhật tổng tiền
        $('#tong-tien').text(numberWithCommas(tongTien) + 'đ');

        // In ra số nút được chọn
        $('#so-nut-duoc-chon').text(soNutDuocChon);

    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $('#btn-chon-cac-dich-vu').click(function () {
        bookingId = $(this).data('booking-id');
        console.log(selectedServiceIds);
        console.log(bookingId);
        showService(false);

        // Gửi yêu cầu Ajax để lưu dữ liệu vào bảng booking_service
        $.ajax({
            url: '/admin/booking_blade/luu-dich-vu-booking',
            type: 'POST',
            data: {
                booking_id: bookingId,
                service_ids: selectedServiceIds,
            },
            success: function (response) {
                alert(response.message);
                // Reset modal và các giá trị cần thiết
                selectedServiceIds = [];
                soNutDuocChon = 0;
                $('#so-nut-duoc-chon').text(soNutDuocChon);
                tongTien = 0;
                $('#tong-tien').text('0đ');
            },
            error: function (error) {
                alert('Đã có lỗi xảy ra.');
                console.error(error);
            }
        });
    });

    function updateTongTien() {
        var tongTien = 0;
        // var servicePrice = $(".js-btn-delete:first").data("service-price");
        // console.log(servicePrice);
        $('#jquery-list:first tr').each(function () {
            var giaDichVu = parseFloat($(this).find('td:eq(1)').text().replace(',', '').replace('đ', ''));
            if (!isNaN(giaDichVu)) {
                tongTien += giaDichVu;
            }
        });
        console.log(tongTien);
        // Hiển thị tổng tiền trên cột cuối cùng
        $('#tong-tien-cell').text(tongTien.toLocaleString() + 'đ');
    }
    updateTongTien();
});

const btnCancel = $('.jquery-btn-sv-cancel');

function showService(action = true) {
    if (action) {
        $('.jquery-service-modal').show();
    } else {
        $('.jquery-service-modal').hide();
    }

}

btnCancel.on('click', function () {
    showService(false);
});




