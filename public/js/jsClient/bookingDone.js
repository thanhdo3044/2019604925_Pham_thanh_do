$(document).ready(function () {
    let booking_id = $('#booking_id').data('booking_id');
    let phone_booking;
    function bookingDone() {
        $.ajax({
            url: '/api/booking/success' +'/' + booking_id,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                // console.log(response.user_phone)
                phone_booking = (response.user_phone).replace("+84","")
                // console.log(phone_booking)
                update();
                console.log(response.service)
                $('.jqr-serviceName').empty();
                let price = 0;
                response.service.map(item => {
                    $('.jqr-serviceName').append(`
                         <div class="booking-service__group-wrap-item">${item.name}</div>
                    `);
                    price += +item.price;
                });
                function formatCurrency(amount) {
                    return amount.toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                }

                let formattedMoney = formatCurrency(price);
                $('.jqr-servicePrice').html(`
                    <div class="text-sm font-light jqr-text">Tổng số tiền anh cần thanh toán:  <span class="font-normal">${formattedMoney}</span></div>
                `);

            },
            error: function (error) {
                console.error(error);
            }
        });
    }


    bookingDone();

    $(document).on('click','.jqr-change', function update() {
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
});
