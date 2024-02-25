
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Thêm dịch vụ</h4>
                <button type="button" class="btn-close jquery-btn-cancel"
                        aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex justify-content-between flex-wrap"
                      id="formModalService" action="" enctype="multipart/form-data">
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Danh mục</label>
                            <select class="form-control" name="category_id" id="category_id">

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Tên dịch vụ</label>
                            <input type="text" class="form-control" name="name" id="service" />
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Giá dịch vụ</label>
                            <input type="text" class="form-control" name="price" id="service" />
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Mô tả</label>
                            <input type="text" class="form-control" name="description" id="description"/>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Trạng thái</label>
                            <select name="is_active" class="form-control" id="is_active">
{{--                                <option selected value="1">Hoạt Động</option>--}}
{{--                                <option value="0">Không Hoạt Động</option>--}}
                            </select>
                        </div>

                    </div>

                    <div class="col-xl-6 p-3">
                        <div class="row text-center">
                            <input type="file" name="files[]" id="service-image" multiple/>
                            <label for="service-image" style="font-size: 20px">Tải ảnh lên <i
                                    class="upload font-22"></i></label>
                            <span class="show-error text-danger" data-name="files"></span>
                        </div>
                        <input type="hidden" name="actionMethod">
                        <div class="selected-images">


                        </div>
                    </div>


                    <div class="w-100 text-center">
                        <button type="submit" class="btn btn-success waves-effect waves-light"
                                >Save
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-btn-cancel"
                                >Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


