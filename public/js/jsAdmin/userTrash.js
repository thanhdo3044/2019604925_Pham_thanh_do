$(document).ready(function () {
    const baseUrl = '/api/trash/user';


    function loadTable() {
        $.ajax({
            url: baseUrl,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                $('#jquery-list').empty();
                data.map(item => {
                    $('#jquery-list').append(
                        `
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.phone}</td>
                            <td class="text-center">
                              <div class="btn-group dropdown">
                                  <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none "
                                     data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg--><svg
                                                     xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1">
                                          <g stroke="none" stroke-width="1" fill="none"
                                                     fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                               fill="#8950fc"/>
                                          </g>
                                          </svg>
                                        </span>
                                  </a>
                                  <div class="dropdown-menu dropdown-menu-end">
                                        <button class="dropdown-item js-btn-restore" data-id="${item.id}">
                                          Khôi phục
                                        </button>
                                      <button class="dropdown-item js-btn-delete" data-id="${item.id}">
                                          Xóa
                                      </button>
                                  </div>
                              </div>
                          </td>
                      </tr>
                        `
                    );
                });
            },
            error: function (error) {
                console.error()
            }
        });
    }

    loadTable();


    $(document).on('click','.js-btn-restore', function (){
        let id = $(this).data('id');
        // window.location.href = baseUrl + '/' + id;
        $.ajax({
            url: baseUrl + '/' + id,
            method: 'POST',
            dataType: 'json',
            success: function (data){
                loadTable();
                toastr['success']
                ('Dữ liệu đã được khôi phục thành công');
            },
            error: function (error) {
                console.error()
            }
        });
    });

    $(document).on('click','.js-btn-delete', function (){
        let id = $(this).data('id');
        // window.location.href = baseUrl + '/' + id;
        $.ajax({
            url: baseUrl + '/' + id,
            method: 'DELETE',
            dataType: 'json',
            success: function (data){
                loadTable();
                toastr['success']
                ('Xóa thành công');
            },
            error: function (error) {
                console.error()
            }
        });
    });
});
