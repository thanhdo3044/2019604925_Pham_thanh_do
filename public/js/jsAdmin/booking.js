$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    // const btnCancel = $('.jquery-btn-cancel');
    // const btnShowModal = $('.query-btn-show-modal');
    // const btnUpdate = $('.js-btn-update');
    // const fileInput = $('#service-image');
    // const imgContainer = $('.selected-images');
    const listTable = $('#jquery-booking-value');
    // let formModal = $('#formModalService');
    // const actionMethod = $('input[name="actionMethod"]');
    const urlShow = '/api/get/booking';
    const urlPost = '/api/post/booking';
    const urlShowEdit = '/api/edit/booking';
    const urlPut = '/api/put/booking';
    // const urlCategory = '/api/category';

    // mặc định ẩn bảng modal
    // $('.jquery-main-modal').hide();

    // Show form để create
    // function showModal(action = true) {
    //     if (action) {
    //         $('.jquery-main-modal').show()
    //     } else {
    //         formModal[0].reset();
    //         imgContainer.empty();
    //         // $('#is_active').html(`
    //         //     <option selected value="1">Hoạt Động</option>
    //         //     <option value="0">Không Hoạt Động</option>
    //         // `);
    //         // setValue();
    //         // $('#category_id').html(value);
    //         actionMethod.val('');
    //         $('.jquery-main-modal').hide()
    //     }
    // }


    // btnCancel.on('click', function () {
    //     showModal(false);
    // });
    // btnShowModal.on('click', showModal);
    //
    //
    // formModal.on('submit', function (e) {
    //     e.preventDefault();
    //     if (actionMethod.val() === 'update') {
    //         update();
    //         showModal(false);
    //     } else {
    //         add();
    //         showModal(false);
    //     }
    // })

    function loadAll() {
        $.ajax({
            url: urlShow,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                listTable.empty();
                data.map(item => {
                    listTable.append(`
                        <tr>
                            <td>${item.id}</td>
                            <td>${item.user_id}</td>
                            <td>${item.stylist_id}</td>
                            <td>${item.timesheet_id}</td>
                            <td>${item.date}</td>
                            <td>${item.special_requirement}</td>
                            <td>${item.is_consultant}</td>
                            <td>${item.is_accept_take_a_photo}</td>
                            <td>${item.status}</td>
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
                                        <button class="dropdown-item js-btn-update" data-id="${item.id}">Cập nhật</button>
                                        <button class="dropdown-item btn-delete" data-id="${item.id}">Xóa</button>
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

    // function add() {
    //     let formData = new FormData(formModal[0]);
    //     $.ajax({
    //         url: urlPost,
    //         method: 'POST',
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         headers: {
    //             'X-CSRF-TOKEN': csrfToken,
    //         },
    //         success: function (data) {
    //             toastr['success']('Thêm mới dữ liệu thành công');
    //             showModal(false);
    //             loadAll();
    //         },
    //         error: function (error) {
    //             console.error(error);
    //         }
    //     });
    // }

    // function getDetail(id) {
    //     $.ajax({
    //         url: urlShowEdit + '/' + id,
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function (data) {
    //             let valueService = data.dataService;
    //             let valueCate = data.dataCate;
    //             let valueImage = valueService.images;
    //
    //             // sử lí dữ liệu ảnh
    //             let isImage = '';
    //             for (let i = 0; i < valueImage.length; i++){
    //                 isImage+= `
    //                     <div class="item-images">
    //                     <img src="/storage/${valueImage[i].url}"  alt=""/>
    //                     </div>
    //                 `;
    //             }
    //
    //             // sử lí dữ liệu danh mục của dịch vụ
    //             let isCate = `<select class="form-control" name="category_id" id="category_id">`
    //             let resultCate = '';
    //             for (let i = 0; i < valueCate.length; i++){
    //                 if (valueCate[i].id === valueService.category_id){
    //                     resultCate = 'selected';
    //                 }
    //                 isCate+= `<option value="${valueCate[i].id}" ${resultCate}>${valueCate[i].name}</option>`;
    //             }
    //             isCate += `</select>`;
    //
    //             // sử lí dữ liệu is_active
    //             let isActive = `<select name="is_active" class="form-control" id="is_active">`
    //             let value = ['không hoạt động', 'Hoạt động'];
    //             let resultService = '';
    //             for (let i = 0; i < value.length; i++){
    //                 if (valueService.is_active === 1){
    //                     resultService = 'selected';
    //                 }
    //                 isActive+= `<option value="${i}" ${resultService}>${value[i]}</option>`;
    //             }
    //             isActive += `</select>`;
    //
    //
    //             $('input[name="name"]').val(valueService.name);
    //             $('input[name="price"]').val(valueService.price);
    //             $('input[name="description"]').val(valueService.description);
    //
    //
    //             $('#is_active').html(isActive);
    //             $('#category_id').html(isCate);
    //             imgContainer.html(isImage);
    //
    //             showModal();
    //         },
    //         error: function (error) {
    //             console.error(error);
    //         }
    //     });
    // }


    // function update(id) {
    //     let formData = new FormData(formModal[0]);
    //     $.ajax({
    //         url: urlPut + '/' + id,
    //         method: 'PUT',
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         headers: {
    //             'X-CSRF-TOKEN': csrfToken,
    //         },
    //         success: function (data) {
    //             console.log(data);
    //         },
    //         error: function (error) {
    //             console.error(error);
    //         }
    //
    //     });
    // }

    // $(document).on('click','.js-btn-update', function () {
    //     let id = $(this).data('id');
    //     actionMethod.val('update')
    //     getDetail(id);
    // })


    // fileInput.slideUp();
    // fileInput.on('change', function () {
    //     const fileList = this.files;
    //     imgContainer.html('');
    //     for (let i = 0; i < fileList.length; i++) {
    //         let file = fileList[i];
    //         let render = new FileReader();
    //         render.readAsDataURL(file);
    //         render.onload = function (e) {
    //             let imgUrl = e.target.result;
    //             imgContainer.append(`
    //                 <div class="item-images">
    //                 <img src="${imgUrl}"  alt=""/>
    //                 </div>
    //             `);
    //         }
    //     }
    // })


    //Lấy giá trị danh mục đổ ra.
    // function setValue() {
    //     $.ajax({
    //         url: urlCategory,
    //         method: 'GET',
    //         dataType: 'json',
    //         success: function (data) {
    //             let isCate = `<select class="form-control" name="category_id" id="category_id">`
    //             isCate += `<option>Mời chọn danh mục dịch vụ</option>`
    //             for (let i = 0; i < data.length; i++){
    //                 isCate+= `<option value="${data[i].id}">${data[i].name}</option>`;
    //             }
    //             isCate += `</select>`;
    //
    //             let isActive = `<select name="is_active" class="form-control" id="is_active">`
    //             let value = ['không hoạt động', 'Hoạt động'];
    //             let resultService = '';
    //             for (let i = 0; i < value.length; i++){
    //                 if (value[i] === 'Hoạt động'){
    //                     resultService = 'selected';
    //                 }
    //                 isActive+= `<option value="${i}" ${resultService}>${value[i]}</option>`;
    //             }
    //             isActive += `</select>`;
    //             $('#category_id').html(isCate);
    //             $('#is_active').html(isActive);
    //         },
    //         error: function (error) {
    //             console.error(error);
    //         },
    //     });
    // }
    // setValue();
});
