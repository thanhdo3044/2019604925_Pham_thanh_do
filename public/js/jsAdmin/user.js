$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnShow = $('.jquery-btn-create');
    const btnCancel = $('.jquery-close');
    const formModal = $('#formModal');
    const actionMethod = $('input[name="actionMethod"]');
    const baseUrl = '/api/user';
    const urlGetRole = '/api/roleUser';
    const btnUpdate = $('.js-btn-update');
    let idUpdate;
    $('#example').DataTable({
        ajax: baseUrl,
    });

    // Điều khiển modal
    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show();
        } else {
            formModal[0].reset();
            actionMethod.val('');
            $('.is_active').empty();
            $('.jquery-main-modal').hide();
        }
    }

    btnShow.on('click', showModal);
    btnCancel.on('click', function () {

        showModal(false);

    });

    // hành động khi click save
    formModal.on('submit', function (e) {
        e.preventDefault();
        if (actionMethod.val() === 'update') {
            update();
        } else {
            add();
        }
        showModal(false);
    })


    function loadTable() {
        $.ajax({
            url: baseUrl,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#jquery-list').empty();
                data.map(item => {
                    $('#jquery-list').append(`
                        <tr>
                          <td>${item.id}</td>
                          <td>${item.phone_number}</td>
                          <td>
                            ${item.roles.length > 0 ?
                                `<span style="background-color: ${item.roles[0].color}" class="jqr-badge jqr-roleUser">${item.roles[0].name}</span>` :
                                'Chưa sét vai trò'
                            }
                          </td>
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
                                        <button class="dropdown-item js-btn-update" data-id="${item.id}">
                                          Cập nhật
                                        </button>
                                      <button class="dropdown-item js-btn-delete" data-id="${item.id}">
                                          Xóa
                                      </button>
                                  </div>
                              </div>
                          </td>
                      </tr>`
                    );
                })
            },
            error: function (error) {
            }
        });
    }

    loadTable();


    $(document).on('click','.js-btn-update', function (){
        let itemId = $(this).data('id');
        idUpdate = itemId;
        loadValueDetail(itemId);
    });
    $(document).on('click','.js-btn-delete', function (){
        if (confirm('Bạn có chắc chắn muốn xóa ?')){
            idUpdate = $(this).data('id');
            destroy();
        }
    });



    function add() {
        let formData = formModal.serialize();
        $.ajax({
            url: baseUrl,
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                console.log(data);
                loadTable();
                toastr['success']('Thêm mới người dùng thành công');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function destroy() {
        $.ajax({
            url: baseUrl +'/' + idUpdate,
            method: 'DELETE',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
               loadTable();
               toastr['success']
               ('Dữ liệu đã được đưa vào thùng rác! Bạn có thể khôi phục tại đó');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    function loadValueDetail(id) {
        $.ajax({
            url: baseUrl + '/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let is_activeSelect = `
                <label for="" class="form-label">Is_active</label>
                    <select class="form-control" name="is_active">
                `;
                let option = ['Không hoạt động','Hoạt động'];
                for (let i = 0; i < option.length; i++){
                    let selected = '';
                    if (data.is_active === 1){
                        selected = 'selected';
                    }
                    is_activeSelect += `<option value="${i}" ${selected}>${option[i]}</option>`;
                }

                is_activeSelect+= `</select>`

                $('.is_active').html(is_activeSelect);
                actionMethod.val('update');
                $('input[name="phone_number"]').val(data.phone_number);
                showModal();
            },
            error: function (xhr, status, error) {

                console.error(error);
            }
        });
    }



    function update() {
        let formData = formModal.serialize();
        // formData.delete('actionMethod');
        $.ajax({
            url: baseUrl +'/' + idUpdate,
            method: 'PUT',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                showModal(false)
                loadTable();
                // console.log(data)
                toastr['success']('Cập nhật thành công');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function setValue() {
        $.ajax({
            url: urlGetRole,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);

                let isRole = `<select class="form-control" name="role" id="role">`;
                for (let i = 0; i < data.length; i++){
                    isRole += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                isRole += `</select>`;
                $('#role').html(isRole);
                $("#role").selectize({ maxItems: 2 });
            },
            error: function (error) {
                console.error(error);
            },
        });
    }
    setValue();
});
