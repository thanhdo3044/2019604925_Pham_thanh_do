$(document).ready(function () {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    const btnShow = $('.jquery-btn-create');
    const btnCancel = $('.jquery-close');
    const formModal = $('#formModal');
    const actionMethod = $('input[name="actionMethod"]');

    const urlShow = '/api/get/stylistTimeSheets';
    const urlPost = '/api/post/stylistTimeSheets';
    const urlShowEdit = '/api/edit/stylistTimeSheets';
    const urlDelete = '/api/delete/stylistTimeSheets';
    const urlDeleteDetail = '/api/deleteDetail/stylistTimeSheets';
    const urlPut = '/api/put/stylistTimeSheets';
    const urlGetValue = '/api/get/getvalue';
    let idUpdate;

    // Điều khiển modal
    function showModal(action = true) {
        if (action) {
            $('.jquery-main-modal').show();
        } else {
            formModal[0].reset();
            $('#is_active').html(`
                <option selected value="1">Hoạt Động</option>
                <option value="0">Không Hoạt Động</option>
            `);
            setValue();
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
            // update(idUpdate);
            update();
        } else {
            add();
            showModal(false);
        }
    })

    function loadTable() {
        $.ajax({
            url: urlShow,
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                let data = response.data;
                let timeSheet = response.timeSheet;
                // console.log(response)
                // console.log(timeSheet)
                $('#jquery-list').empty();

                for (let i = 0; i < data.length; i++){
                    // console.log(data[i])
                    let uniqueArray = data[i].work_day.filter((value, index, self) =>
                        index === self.findIndex((v) => v.id === value.id && v.day === value.day)
                    );
                    // console.log(uniqueArray)
                    for (let j = 0; j < uniqueArray.length; j++){
                        $('#jquery-list').append(`
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <ul class="sortable-list list-unstyled taskList" id="upcoming">
                                            <li>
                                            <div class="dropdown float-end top-right">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" style="">
                                                <!-- item-->
                                                <button class="dropdown-item js-btn-update" data-id="${data[i].id}">
                                                  Cập nhật
                                                </button>
                                                <!-- item-->
                                                <button class="dropdown-item js-btn-detail" data-id="${data[i].id}">
                                                  Chi tiết
                                                </button>
                                                <!-- item-->
                                                <button class="dropdown-item js-btn-delete" data-id="${data[i].id}">
                                                  Xóa tất cả
                                                </button>
                                            </div>
                                          </div>

                                               <div class="" style="margin-left: 10px">${data[i].name}</div>
                                               <p>${uniqueArray[j].day}</p>
                                               ${data[i].time_sheet.map(value => {
                                                            return `<div class="jqr-badge " style="background-color: #88de7d; margin: 10px 5px 0 5px"
                                                            data-id="${value.id}" data-userId="${data[i].id}">
                                                            ${value.hour}:${value.minutes} ${value.hour < 12 ? 'AM' : 'PM'}
                                                            </div>`;
                                               }).join('')}
                                               <hr>
                                            </li>
                                        </ul>
                                        </br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                    }

                }

                // data.forEach(item => {
                //     $('#jquery-list').append(`
                //         <div class="row">
                //             <div class="col-12">
                //                 <div class="card">
                //                     <div class="card-body">
                //                         <ul class="sortable-list list-unstyled taskList" id="upcoming">
                //                             <li>
                //                             <div class="dropdown float-end top-right">
                //                             <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                //                                 <i class="mdi mdi-dots-vertical"></i>
                //                             </a>
                //                             <div class="dropdown-menu dropdown-menu-end" style="">
                //                                 <!-- item-->
                //                                 <button class="dropdown-item js-btn-update" data-id="${item.id}">
                //                                   Cập nhật
                //                                 </button>
                //                                 <!-- item-->
                //                                 <button class="dropdown-item js-btn-detail" data-id="${item.id}">
                //                                   Chi tiết
                //                                 </button>
                //                                 <!-- item-->
                //                                 <button class="dropdown-item js-btn-delete" data-id="${item.id}">
                //                                   Xóa tất cả
                //                                 </button>
                //                             </div>
                //                           </div>
                //
                //                                <div class="" style="margin-left: 10px">${item.name}</div>
                //
                //                                ${item.time_sheet.map(value => {
                //                                    return `<div class="jqr-badge " style="background-color: #88de7d; margin: 10px 5px 0 5px"
                //                                             data-id="${value.id}" data-userId="${item.id}">
                //                                             ${value.hour}:${value.minutes} ${value.hour < 12 ? 'AM' : 'PM'}
                //                                             </div>`;
                //                                }).join('')}
                //                                <hr>
                //                             </li>
                //
                //                         </ul>
                //                         </br>
                //                     </div>
                //                 </div>
                //             </div>
                //         </div>
                //     `);
                // });
            },
            error: function (error) {
            }
        });
    }

    loadTable();

    $(document).on('click', '.js-btn-update', function () {
        let itemId = $(this).data('id');
        idUpdate = itemId;
        actionMethod.val('update')
        loadTimeSheet(itemId);
    });
    $(document).on('click', '.js-btn-delete', function () {
        if (confirm('Bạn có chắc chắn muốn xóa ?')) {
            idUpdate = $(this).data('id');
            destroyAll();
        }
    });
    $(document).on('click','.jqr-badge', function (){
        let timeSheetId = $(this).data('id');
        let userId = $(this).attr('data-userId');
        console.log(timeSheetId)
        console.log(userId)
        if (confirm('Bạn có chắc chắn muốn xóa ?')) {
            destroyDetail(userId,timeSheetId);
        }
    });

    function add() {
        let formData = new FormData(formModal[0]);
        $.ajax({
            url: urlPost,
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

    function destroyAll() {
        $.ajax({
            url: urlDelete + '/' + idUpdate,
            method: 'DELETE',
            dataType: 'json',
            success: function (data) {
                loadTable();
                toastr['success']
                ('Dữ liệu đã được xóa thành công.');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    function destroyDetail(usserId, timeSheetId) {
        $.ajax({
            url: urlDeleteDetail,
            method: 'post',
            data: {
                user_id: usserId,
                timesheet_id: timeSheetId,
            },
            dataType: 'json',
            success: function (data) {
                loadTable();
                toastr['success']
                ('Dữ liệu đã được xóa thành công.');
            },
            error: function (error) {
                console.error(error);
            }
        });
    }


    function loadTimeSheet(id) {
        console.log(id);
        $.ajax({
            url: urlShowEdit + '/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data)
                let StylistDetail = data.dataStylist[0];
                let listStylist = data.stylist;
                let stylistSelected = '';
                let isStylist = `<select class="form-select" name="stylist_id" id="stylist_id">`;
                isStylist += `<option>Choose stylist</option>`
                for (let i = 0; i < listStylist.length; i++) {
                    if (listStylist[i].id === StylistDetail.id){
                        stylistSelected = 'selected';
                    }else {
                        stylistSelected = '';
                    }
                    isStylist += `<option value="${listStylist[i].id}" ${stylistSelected}>${listStylist[i].name}</option>`;
                }
                isStylist += `</select>`;


                $('#stylist_id').html(isStylist);
                // $('#timesheet_id').html(isTimeSheet);
                showModal();
            },
            error: function (xhr, status, error) {

                console.error(error);
            }
        });
    }
    function loadValueDetail(id) {
        console.log(id);
        $.ajax({
            url: urlShowEdit + '/' + id,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // let valueStylistTimeSheets = data.dataStylistTimeSheets;
                // let valueStylist = data.dataStylist;
                // let valueTimeSheet = data.dataTimeSheet;
                //
                // // Stylist
                // let isStylist = `<select class="form-select" name="stylist_id" id="stylist_id">`
                // let resultStylist = '';
                // for (let i = 0; i < valueStylist.length; i++) {
                //     if (valueStylist[i].id === valueStylistTimeSheets.stylist_id) {
                //         resultStylist = 'selected';
                //     } else {
                //         resultStylist = '';
                //     }
                //     isStylist += `<option value="${valueStylist[i].id}" ${resultStylist}>${valueStylist[i].name}</option>`;
                // }
                // isStylist += `</select>`;

                //TimeSheet
                // let isTimeSheet = `<select class="form-select" name="timesheet_id" id="timesheet_id">`
                // let resultTimeSheet = '';
                // for (let i = 0; i < valueTimeSheet.length; i++) {
                //     if (valueTimeSheet[i].id === valueStylistTimeSheets.timesheet_id) {
                //         resultTimeSheet = 'selected';
                //     } else {
                //         resultTimeSheet = '';
                //     }
                //     isTimeSheet += `<option value="${valueTimeSheet[i].id}" ${resultTimeSheet}>${valueTimeSheet[i].hour}:${valueTimeSheet[i].minutes}</option>`;
                // }
                // isTimeSheet += `</select>`;

                // let is_activeSelect = `
                // <label for="" class="form-label">Is_active</label>
                //     <select class="form-control" name="is_active">
                // `;
                // let option = ['Không hoạt động', 'Hoạt động'];
                // for (let i = 0; i < option.length; i++) {
                //     let selected = '';
                //     if (valueStylistTimeSheets.is_active === 1) {
                //         selected = 'selected';
                //     }
                //     is_activeSelect += `<option value="${i}" ${selected}>${option[i]}</option>`;
                // }
                //
                // is_activeSelect += `</select>`
                //
                // $('.is_active').html(is_activeSelect);
                // actionMethod.val('update');
                // $('#stylist_id').html(isStylist);
                // $('#timesheet_id').html(isTimeSheet);
                // $('select[name="is_active"]').val(valueStylistTimeSheets.is_active);
                // $('select[name="is_block"]').val(valueStylistTimeSheets.is_block);
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
            url: urlPut + '/' + idUpdate,
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
            url: urlGetValue,
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let valueStylist = data.dataStylist;
                let valueTimeSheet = data.dataTimeSheet;
                let valueWorkDay = data.dataWorkDay;

                let isStylist = `<select class="form-select" name="stylist_id" id="stylist_id">`;
                isStylist += `<option>Choose stylist</option>`
                for (let i = 0; i < valueStylist.length; i++) {
                    isStylist += `<option value="${valueStylist[i].id}">${valueStylist[i].name}</option>`;
                }
                isStylist += `</select>`;

                //work_day
                let isWorkDay = `<select class="form-select" name="work_day_id" id="work_day_id">`;
                for (let i = 0; i < valueWorkDay.length; i++) {
                    isWorkDay += `<option value="${valueWorkDay[i].id}">${valueWorkDay[i].day}</option>`;
                }
                isWorkDay += `</select>`;

                //TimeSheet
                let isTimeSheet = `<select class="form-select" name="timesheet_id" id="timesheet_id">`;
                for (let i = 0; i < valueTimeSheet.length; i++) {
                    isTimeSheet += `<option value="${valueTimeSheet[i].id}">${valueTimeSheet[i].hour}:${valueTimeSheet[i].minutes}</option>`;
                }
                isTimeSheet += `</select>`;

                let is_activeSelect = `
                <label for="" class="form-label">Is_active</label>
                    <select class="form-control" name="is_active">
                `;
                let option = ['Không hoạt động', 'Hoạt động'];
                for (let i = 0; i < option.length; i++) {
                    is_activeSelect += `<option value="${i}">${option[i]}</option>`;
                }
                is_activeSelect += `</select>`

                $('.is_active').html(is_activeSelect);
                $('#stylist_id').html(isStylist);
                $('#timesheet_id').html(isTimeSheet);
                $('#work_day_id').html(isWorkDay);

                $("#timesheet_id").selectize({maxItems: 100});
            },
            error: function (error) {
                console.error(error);
            },
        });
    }

    setValue();
});
