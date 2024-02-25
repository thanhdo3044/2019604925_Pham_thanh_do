$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnShow = $('.jquery-btn-create');
    const btnCancel = $('.jquery-btn-cancel');
    const formModal = $('#addRoleForm');
    const actionMethod = $('input[name="actionMethod"]');
    const urlShow = '/api/roles';
    const urlOverView = '/api/roles/overView';
    const addRoles = '/api/AddRoles';
    const roleDetail = '/api/getRoleDetail';
    const updateRole = '/api/updateRole';
    const destroyRole = '/api/destroyRole';
    let idUpdate;

    // Điều khiển modal
    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show();
        } else {
            formModal[0].reset();
            actionMethod.val('');
            $('.jquery-main-modal').hide();
        }
    }

    // btnShow.on('click', showModal);
    btnCancel.on('click', function () {
        showModal(false);
    });

    $(document).on('click','.jquery-btn-create', showModal);

    // hành động khi click save
    formModal.on('submit', function (e) {
        e.preventDefault();
        if (actionMethod.val() === 'update') {
            // update(idUpdate);
            update();
        } else {
            add();
            showModal(false);
        }
    })
    $(document).on('click','.js-btn-update', function (){
        let itemId = $(this).data('id');
        idUpdate = itemId;
        actionMethod.val('update')
        loadValueDetail(itemId);
    });
    $(document).on('click','.js-btn-delete', function (){
        if (confirm('Bạn có chắc chắn muốn xóa ?')){
            idUpdate = $(this).data('id');
            destroy();
        }
    });

    $(document).on('click','#selectAll', function () {
        let isChecked = $(this).prop('checked');
        $('.jqr-checkbox').prop('checked', isChecked);
    } )

    function roleOverView() {
        $.ajax({
            url: urlOverView,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('.jqr-overView').empty();
                data.map(item => {
                    $('.jqr-overView').append(`
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <h6 class="fw-normal fs-5">Tổng số ${item.users.length} người dùng</h6>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <div class="role-heading">
                                            <h4 class="mb-1 fw-bolder fs-3">${item.name}</h4>
                                            <a href="javascript:;" class="role-edit-modal js-btn-update" data-id="${item.id}"><small>Edit Role</small></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                });
                $('.jqr-overView').append(`
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card" style="height: 86%!important;">
                            <div class="row" style="height: 86%!important;">
                                <div class="col-sm-5">
                                    <div class="d-flex align-items-end justify-content-center mt-sm-0 " style="height: 86%!important;">
                                        <img src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/img/illustrations/sitting-girl-with-laptop-dark.png" class="img-fluid" alt="Image" width="120" data-app-light-img="illustrations/sitting-girl-with-laptop-light.png" data-app-dark-img="illustrations/sitting-girl-with-laptop-dark.png">
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="card-body text-sm-end text-center ps-sm-0">
                                        <button class="btn btn-primary mb-3 jquery-btn-create shadow-sm">Thêm vai trò mới</button>
                                        <p class="mb-0">Thêm vai trò, nếu nó không tồn tại</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `);
            },
            error: function (error) {
            }
        });
    }
    roleOverView();
    function loadTable() {
        $.ajax({
            url: urlShow,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $('#jquery-list').empty();
                data.map(item => {
                    $('#jquery-list').append(`
                        <tr>
                          <td class="w-75">
                            <span style="background-color: ${item.color}" class="jqr-badge">
                                ${item.name}
                            </span>
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
    };
    loadTable();

    function add() {
        console.log($('input[name="color"]').val());
        let formData = new FormData(formModal[0]);
        $.ajax({
            url: addRoles,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                console.log(data)
                roleOverView();
                loadTable();
                toastr['success']('Thêm mới dữ liệu thành công');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function loadValueDetail(id) {
        $.ajax({
            url: roleDetail + '/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                $('.jqr_roleName').val(data.role.name);
                $('.jqr_roleColor').val(data.role.color);
                $('.jqr_roleGuardName').val('web');
                data.permission.forEach(function(value) {
                    // Lặp qua tất cả các checkbox
                    $('.jqr-checkbox').each(function() {
                        // Lấy giá trị của checkbox
                        let checkboxValue = $(this).val();
                        // So sánh giá trị của biến a và giá trị của checkbox
                        if (value === checkboxValue) {
                            // Nếu trùng nhau, chọn (checked) checkbox đó
                            $(this).prop('checked', true);
                        }
                    });
                });
                actionMethod.val('update');
                showModal();
            },
            error: function (xhr, status, error) {

                console.error(error);
            }
        });
    }

    function update() {
        let formData = new FormData(formModal[0]);
        $.ajax({
            url: updateRole +'/' + idUpdate,
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                showModal(false);
                roleOverView();
                loadTable();
                toastr['success']('Cập nhật thành công');
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }

    function destroy() {
        $.ajax({
            url: destroyRole +'/' + idUpdate,
            method: 'DELETE',
            dataType: 'json',
            success: function (data) {
                roleOverView();
                loadTable();
                toastr['success']
                ('Dữ liệu đã được xóa thành công.');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
});
