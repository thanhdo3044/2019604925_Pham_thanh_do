$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnCancel = $('.jquery-btn-cancel');
    const btnShowModal = $('.query-btn-show-modal');
    //     // const btnUpdate = $('.js-btn-update');
    const fileInput = $('#service-image');
    const imgContainer = $('.selected-images');
    const listTable = $('#jquery-value');
    let formModal = $('#formModalService');
    const actionMethod = $('input[name="actionMethod"]');
    let idDetail;
    const urlShow = '/api/get/service';
    const urlPost = '/api/post/service';
    const urlShowEdit = '/api/edit/service';
    const urlPut = '/api/put/service';
    const urlDelete = '/api/delete/service';
    const urlCategory = '/api/category';
    const roleEdit = $('.jqr-roleEdit').val();
    const roleDelete = $('.jqr-roleDelete').val();
    $(document).on('click','.btn-image',function () {
        let id = $(this).data('id');
        $.ajax({
            url: '/api/getImg/' + id,
            method: 'GET',
            dataType:'json',
            success: function (data) {
                let dataImg = data.images;
                console.log(dataImg[0].url);
                $('.js-img').html(`
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-light">
                                <h4 class="modal-title" id="myCenterModalLabel">Ảnh của....</h4>
                                <button type="button" class="btn-close jquery-btn-cancel"
                             aria-hidden="true"></button>
                        </div>
                        <div class="selected-images">
                            ${dataImg.map(item => `
                                    <div class="item-images">
                                        <img src="/storage/${item.url}" width="100px" alt="">
                                     </div>
                                        `).join('')}
                        </div>
                    </div>
                   </div>
                    `).show();

            },
            error: function (error) {
                console.error(error);
            }
        });

    })

    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show()
        } else {
            formModal[0].reset();
            imgContainer.empty();
            $('#is_active').html(`
                <option selected value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
            `);
            setValue();
            // $('#category_id').html(value);
            actionMethod.val('');
            $('.js-img').hide();
            $('.jquery-main-modal').hide()
        }
    }


    $(document).on('click','.jquery-btn-cancel', function () {
        showModal(false);
    });
    btnShowModal.on('click', showModal);


    $(document).on('click','.js-btn-update', function () {
        let id = $(this).data('id');
        idDetail = id;
        actionMethod.val('update')
        getDetail(id);
    })

    $(document).on('click','.js-btn-delete', function (){
        if (confirm('Bạn có chắc chắn muốn xóa ?')){
            idDetail = $(this).data('id');
            destroy();
        }
    });


    formModal.on('submit', function (e) {
        e.preventDefault();
        if (actionMethod.val() === 'update') {
            update(idDetail);
            showModal(false);
        } else {
            add();
            showModal(false);
        }
    })





    function loadAll() {
        $.ajax({
            url: urlShow,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                listTable.empty();
                data.map(item => {
                    listTable.append(`
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.name}</td>
                            <td>${item.price}</td>
                            <td class="w-50">${item.description}</td>
                            <td class="w-5">
                                ${item.is_active}
                            </td>
                            <td class="text-center">
                                <div class="btn-group dropdown">
                                    <a href="javascript: void(0);" class="table-action-btn dropdown-toggle arrow-none " data-bs-toggle="dropdown" aria-expanded="false">
                                      <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/General/Settings-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                               <rect x="0" y="0" width="24" height="24"/>
                                               <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#8950fc"/>
                                           </g>
                                           </svg>
                                       </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">

                                        ${roleEdit === 'true' ? `
                                            <button class="dropdown-item js-btn-update" data-id="${item.id}">Cập nhật</button>` :
                                            '<button class="dropdown-item" disabled>Cập nhật</button>'}

                                        ${roleDelete === 'true' ? `
                                            <button class="dropdown-item js-btn-delete" data-id="${item.id}">Xóa</button>` :
                                            '<button class="dropdown-item" disabled>Xóa</button>'}
                                        <button class="dropdown-item btn-image" data-id="${item.id}">Ảnh dịch vụ</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `);
                })

            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    loadAll();
    function add() {
        let formData = new FormData(formModal[0]);
        $.ajax({
            url: urlPost,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            },
            success: function (data) {
                toastr['success']('Thêm mới dữ liệu thành công');
                showModal(false);
                loadAll();
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    function getDetail(id) {
        $.ajax({
            url: urlShowEdit + '/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let valueService = data.dataService;
                let valueCate = data.dataCate;
                let valueImage = valueService.images;

                // sử lí dữ liệu ảnh
                let isImage = '';
                for (let i = 0; i < valueImage.length; i++){
                    isImage+= `
                        <div class="item-images">
                        <img src="/storage/${valueImage[i].url}"  alt=""/>
                        </div>
                    `;
                }

                // sử lí dữ liệu danh mục của dịch vụ
                let isCate = `<select class="form-control" name="category_id" id="category_id">`
                let resultCate = '';
                for (let i = 0; i < valueCate.length; i++){
                    if (valueCate[i].id === valueService.category_id){
                        resultCate = 'selected';
                    }
                    isCate+= `<option value="${valueCate[i].id}" ${resultCate}>${valueCate[i].name}</option>`;
                }
                isCate += `</select>`;

                // sử lí dữ liệu is_active
                let isActive = `<select name="is_active" class="form-control" id="is_active">`
                let value = ['không hoạt động', 'Hoạt động'];
                let resultService = '';
                for (let i = 0; i < value.length; i++){
                    if (valueService.is_active === 1){
                        resultService = 'selected';
                    }
                    isActive+= `<option value="${i}" ${resultService}>${value[i]}</option>`;
                }
                isActive += `</select>`;


                $('input[name="name"]').val(valueService.name);
                $('input[name="price"]').val(valueService.price);
                $('input[name="description"]').val(valueService.description);


                $('#is_active').html(isActive);
                $('#category_id').html(isCate);
                imgContainer.html(isImage);

                showModal();
            },
            error: function (error) {
                console.error(error);
            }
        });
    }


    function update() {
        let formData = new FormData(formModal[0]);
        $.ajax({
           url: urlPut + '/' + idDetail,
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
               'X-CSRF-TOKEN': csrfToken,
            },
            success: function (data) {
                console.log(data);
                loadAll();
                toastr['success']('Cập nhật dịch vụ thành công');
            },
            error: function (error) {
                console.error(error);
            }

        });
    }


    function destroy() {
        $.ajax({
            url: urlDelete +'/' + idDetail,
            method: 'DELETE',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                loadAll();
                toastr['success']
                ('Dữ liệu đã được đưa vào thùng rác! bạn có thể khôi phục tại đó');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }


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
                    <img src="${imgUrl}"  alt=""/>
                    </div>
                `);
            }
        }
    })

    function setValue() {
        $.ajax({
            url: urlCategory,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let isCate = `<select class="form-control" name="category_id" id="category_id">`
                    isCate += `<option>Mời chọn danh mục dịch vụ</option>`
                for (let i = 0; i < data.length; i++){
                    isCate+= `<option value="${data[i].id}">${data[i].name}</option>`;
                }
                isCate += `</select>`;

                let isActive = `<select name="is_active" class="form-control" id="is_active">`
                let value = ['không hoạt động', 'Hoạt động'];
                let resultService = '';
                for (let i = 0; i < value.length; i++){
                    if (value[i] === 'Hoạt động'){
                        resultService = 'selected';
                    }
                    isActive+= `<option value="${i}" ${resultService}>${value[i]}</option>`;
                }
                isActive += `</select>`;
                $('#category_id').html(isCate);
                $('#is_active').html(isActive);
            },
            error: function (error) {
                console.error(error);
            },
        });
    }
    setValue();

});
