$(document).ready(function () {
    let inputElement = $('.my-input');
    let anchorElement = $('.jqr_routeBooking');


    function removePrefix(phoneNumber) {
        if (phoneNumber.startsWith("+84")) {
            return phoneNumber.substr(3);
        } else {
            return phoneNumber;
        }
    }

    function checkAndUpdateLink() {
        let inputValue = removePrefix(inputElement.val().trim());
        let isValidPhoneNumber = /^\d{10}$/.test(inputValue);
        if (inputValue && isValidPhoneNumber) {
            let bookingUrl = anchorElement.data('booking-url');
            anchorElement.attr('href', bookingUrl);
            if (inputElement.val() !== '') {
                inputElement.val(inputValue);
            } else {
                inputElement.val('');
            }
        } else {
            anchorElement.removeAttr('href');
        }
    }

    inputElement.on('input', function () {
        checkAndUpdateLink();
    });

    anchorElement.on('click', function (e) {
        if (inputElement.val() === "") {
            e.preventDefault();
            toastr['error']
                ('Xin vui lòng nhập số điện thoại');
        } else if (!anchorElement.attr('href')) {
            e.preventDefault();
            toastr['error']
                ('Xin vui lòng nhập số điện thoại hợp lệ');
        } else {
            window.location.href = '/user/booking?phone=' + removePrefix(inputElement.val().trim());
        }
    });
    checkAndUpdateLink();
});

// ==================================
$(document).ready(function () {
    var user_phone = $('#user-info').data('user-phone');
    var id = $('#user-id').data('iduser-phone');
    console.log(id);
    let phone_booking;


    function notify() {
        $.ajax({
            url: '/api/booking/notification/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (res) {
                console.log(res)
                if (res.length) {
                    const element = $('#user-info');
                    element.html(`<div class="container">
                                        <div class="row">
                                            <div class="col-md-6 mt-30 section-notification">
                                                <div class="section-head mb-20">
                                                    <h3>Lịch đặt của bạn (${res.length})</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div> `)
                    for (const value of res) {
                        element.find('.section-notification').append(`<div class="section-body">
                                                    <div class="body-content">
                                                        <div class="content-item mb-3">
                                                            <div>Thông tin lịch hẹn sắp tới:</div>
                                                        </div>
                                                        <div class="content-item">
                                                            <i class="bi bi-telephone"></i>
                                                            <span>Số điện thoại đặt lịch: ${(value.user_phone).replace("+84","")}</span>
                                                        </div>
                                                        <div class="content-item">
                                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                                            <span>Ngày ${moment(value.date).format('DD.MM')}, ${value.time_sheet.hour} giờ ${value.time_sheet.minutes}</span>
                                                        </div>
                                                        <div class="content-item">
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                            <span>Stylist của bạn là ${value.stylist.name}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="section-footer text-center mt-2 mb-30">
                                                    <button class="jqr-change" data-booking-id="${value.id}" data-user-phone="${value.user_phone}">Đổi</button>
                                                    <button class="jqr-destroy" data-booking-id="${value.id}">Hủy lịch</button>
                                                </div>`)
                    }
                }
            }
        });
        
    }
    notify();

    

    $(document).on('click','.jqr-change', function () {
        var booking_id = $(this).data('booking-id');
        phone_booking = ($(this).data('user-phone')).replace("+84","");
        window.location.href = '/user/booking?phone='+ phone_booking + '&&booking_id=' + booking_id;
    });
    $(document).on('click','.jqr-change-payment', function () {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Bạn đã thanh toán và không thể cập nhật lại lịch, vui lòng đến quầy để cập nhật!",
          });
    });

    $(document).on('click','.jqr-destroy', function () {
        var booking_id = $(this).data('booking-id');
        Swal.fire({
            title: 'Bạn chắc chắn muốn hủy lịch?',
            text: "Bạn sẽ không thể hoàn nguyên điều này! Nếu bạn đã thanh toán, bạn chỉ nhận được 95% số tiền đó.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    '',
                    'Hủy lịch thành công.',
                    'success'
                ).then(() => {
                    window.location.href = '/';
                });
                destroy(booking_id);
            }
        })
    });

    function destroy(id) {
        console.log('Hủy lịch ' + id);
        $.ajax({
            url: '/api/booking/destroy' +'/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response)
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

})



