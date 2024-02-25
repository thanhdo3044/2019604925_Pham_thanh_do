$(document).ready(function() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // const statisticalFiller = $('#statistical-filler');
    const baseUrl = '/admin/statistical/filler-by-date';

    // function createChart(chartBooking) {
    //     var labels = chartBooking.map(function(item) {
    //       return item.order_date;
    //     });

    //     var completedTotals = chartBooking.map(function(item) {
    //       return item.completed_total;
    //     });

    //     var pendingTotals = chartBooking.map(function(item) {
    //       return item.pending_total;
    //     });

    //     var canceledTotals = chartBooking.map(function(item) {
    //       return item.canceled_total;
    //     });

    //     var bookedTotals = chartBooking.map(function(item) {
    //       return item.booked_total;
    //     });

    //     var ctx = document.getElementById('chartBooking');
    //     var chartBooking = new Chart(ctx, {
    //       type: 'bar',
    //       data: {
    //         labels: labels,
    //         datasets: [
    //           {
    //             label: 'Completed',
    //             data: completedTotals,
    //             backgroundColor: 'rgba(75, 192, 192, 0.2)',
    //             borderColor: 'rgba(75, 192, 192, 1)',
    //             borderWidth: 1
    //           },
    //           {
    //             label: 'Pending',
    //             data: pendingTotals,
    //             backgroundColor: 'rgba(255, 206, 86, 0.2)',
    //             borderColor: 'rgba(255, 206, 86, 1)',
    //             borderWidth: 1
    //           },
    //           {
    //             label: 'Canceled',
    //             data: canceledTotals,
    //             backgroundColor: 'rgba(255, 99, 132, 0.2)',
    //             borderColor: 'rgba(255, 99, 132, 1)',
    //             borderWidth: 1
    //           },
    //           {
    //             label: 'Booked',
    //             data: bookedTotals,
    //             backgroundColor: 'rgba(54, 162, 235, 0.2)',
    //             borderColor: 'rgba(54, 162, 235, 1)',
    //             borderWidth: 1
    //           }
    //         ]
    //       },
    //       options: {
    //         scales: {
    //           y: {
    //             beginAtZero: true
    //           }
    //         }
    //       }
    //     });
    //   }

    $('#btn-statistical-filter').click(function(e) {
        e.preventDefault();
        var from_date = $('#startDate').val();
        var to_date = $('#endDate').val();
        alert("Hiện tại chức năng đang gặp vấn đề, chúng tôi sẽ cố gắng sửa chữa nhanh nhất có thể");

        // $.ajax({
        //     url: baseUrl,
        //     method: 'get',
        //     processData: false,
        //     contentType: false,
        //     headers: {
        //         'X-CSRF-TOKEN': csrfToken
        //     },
        //     data: {from_date: from_date, to_date: to_date},
        //     dataType: 'json',

        //     success: function(response) {
        //         // Xử lý dữ liệu trả về từ hàm filler_by_date
        //         var chartBooking = response.chartBooking;
        //         createChart(chartBooking);

        //         // Ví dụ: Hiển thị dữ liệu trên console
        //         console.log(chartBooking);

        //         // Ví dụ: Hiển thị dữ liệu trên giao diện
        //         // var chartBookingHtml = '';
        //         // for (var i = 0; i < chartBooking.length; i++) {
        //         //   chartBookingHtml += '<div>Date: ' + chartBooking[i].order_date + '</div>';
        //         //   chartBookingHtml += '<div>Completed Total: ' + chartBooking[i].completed_total + '</div>';
        //         //   chartBookingHtml += '<div>Pending Total: ' + chartBooking[i].pending_total + '</div>';
        //         //   chartBookingHtml += '<div>Canceled Total: ' + chartBooking[i].canceled_total + '</div>';
        //         //   chartBookingHtml += '<div>Booked Total: ' + chartBooking[i].booked_total + '</div>';
        //         //   chartBookingHtml += '<br>';
        //         // }
        //         // $('#chartBookingContainer').html(chartBookingHtml);
        //       },
        // });
    });

});
