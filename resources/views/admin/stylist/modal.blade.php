
    <div class="modal-dialog modal-full-width">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myCenterModalLabel">Thêm nhân viên</h4>
                <button type="button" class="btn-close jquery-close" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex justify-content-between flex-wrap" id="formModal" enctype="multipart/form-data">
                    <div class="col-xl-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" name="name" id="name" required/>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Số điện thoại</label>
                            <input type="tel" class="form-control" name="phone_number" id="phone_number" required/>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Email</label>
                            <input type="tel" class="form-control" name="email" id="email" required/>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Mô tả ngắn</label>
                            <input type="text" class="form-control" name="excerpt" id="excerpt" required/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vai Trò</label>
                            <select class="form-control" name="role" id="role">

                            </select>
                            <div class="clearfix"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">User type</label>
                            <select class="form-control" name="user_type" id="user_type">
                                <option value="USER" >User</option>
                                <option value="STYLIST" selected>Stylist</option>
                                <option value="ADMIN">Admin</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-6 p-3">
                        <div class="row text-center">
                            <input type="file" name="image" id="image"/>
                            <label for="image" style="font-size: 20px">Tải ảnh lên <i class="upload font-22"></i></label>
                            <span class="show-error text-danger" data-name="image"></span>
                        </div>
                        <input type="hidden" name="actionMethod">
                        <div class="selected-images"></div>
                    </div>
                    <div class="w-100 text-center">
                        <button type="submit" class="btn btn-success waves-effect waves-light" >Save</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-close" >Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


