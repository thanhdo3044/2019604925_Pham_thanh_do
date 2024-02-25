$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnShow = $('.jquery-btn-create');
    const btnCancel = $('.jquery-close');
    const formModal = $('#formModal');
    const actionMethod = $('input[name="actionMethod"]');
    const baseUrl = '/api/stylist';
    const urlGetRole = '/api/roleUser';
    const fileInput = $('#image');
    const imgContainer = $('.selected-images');
    const btnUpdate = $('.js-btn-update');
    const roleEdit = $('.jqr-roleEdit').val();
    const roleDelete = $('.jqr-roleDelete').val();
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
            imgContainer.empty();
            $('.is_active').empty();
            actionMethod.val('');
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
                // console.log(data);
                $('#jquery-list').empty();
                data.map(item => {
                    let checked = "";
                    if (item.excerpt == null){
                        checked = "Không có mô tả nào về nhân viên này."
                    }else{
                        checked = item.excerpt;
                    }
                    $('#jquery-list').append(`
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="text-center card-body">
                                <div>
                                    <img src="/storage/${item.image}" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                                    <p class="text-muted font-13 mb-3">
                                        ${checked}
                                    </p>

                                    <div class="text-start">
                                        <p class="text-muted font-13"><strong>Full Name :</strong> <span class="ms-2">${item.name}</span></p>

                                        <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">${item.phone_number}</span></p>

                                        <p class="text-muted font-13"><strong>Vai trò :</strong> <span style="background-color: ${item.roles[0].color}" class="jqr-badge jqr-roleUser">  ${item.roles[0].name}</span></p>
                                    </div>
                                    ${roleEdit === 'true' ? `
                                        <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light js-btn-update" data-id="${item.id}">Cập nhật</button>` : `<button type="button" class="btn btn-primary rounded-pill waves-effect waves-light" disabled>Cập nhật</button>`
                                    }
                                    ${roleDelete === 'true' ? `
                                        <button type="button" class="btn btn-danger rounded-pill waves-effect waves-light js-btn-delete" data-id="${item.id}">Xóa</button>` : `<button type="button" class="btn btn-danger rounded-pill waves-effect waves-light" disabled>Xóa</button>`
                                    }
                                </div>
                            </div>
                        </div>
                    </div> `
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
        let formData = new FormData(formModal[0]);
        $.ajax({
            url: baseUrl,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                loadTable();
                toastr['success']('Thêm mới dữ liệu thành công');
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
               loadTable();
               toastr['success']
               ('Dữ liệu đã được xóa.');
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
            success: function (response) {
                console.log(response)
                let data = response.stylist;
                let roleId = data.roles[0].id;
                // console.log(roleId);
                let isImage= `
                        <div class="item-images">
                        <img src="/storage/${data.image}"  alt=""/>
                        </div>
                    `;

                actionMethod.val('update');
                $('input[name="name"]').val(data.name);
                $('input[name="phone_number"]').val(data.phone_number);
                $('input[name="excerpt"]').val(data.excerpt);
                imgContainer.html(isImage);

                let roleSelect = $('#role');
                roleSelect.empty();
                for (let i = 0; i < response.role.length; i++){
                         let option = $("<option></option>")
                            .attr("value", response.role[i].id)
                            .text(response.role[i].name);
                         if (response.role[i].id === roleId){
                             option.attr('selected', 'selected');
                         }
                    roleSelect.append(option);
                }
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
            url: '/api/stylist/put' +'/' + idUpdate,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: 'json',
            success: function (data) {
                //console.log(data);
                showModal(false)
                loadTable();
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

                let role = `<select class="form-control" name="role" id="role">`;
                for (let i = 0; i < data.length; i++){
                    role += `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                role += `</select>`;
                $('#role').html(role);
                // $("#role").selectize({ maxItems: 2 });
            },
            error: function (error) {
                console.error(error);
            },
        });
    }
    setValue();

    fileInput.slideUp();
    fileInput.on('change', function () {
        const file = this.files[0]; // Lấy tệp ảnh đầu tiên

        if (file) {
          const reader = new FileReader();
          reader.readAsDataURL(file);

          reader.onload = function (e) {
            const imgUrl = e.target.result;
            imgContainer.html(`
              <div class="item-images">
                <img src="${imgUrl}" alt=""/>
              </div>
            `);
          };
        }
      });
});
