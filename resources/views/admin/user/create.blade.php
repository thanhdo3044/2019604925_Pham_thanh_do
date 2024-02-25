<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add - Update User</h4>
                </div>
                <div class="modal-body">
                    <form class="" id="formModal">
                        <div class="">
                            <div class="mb-3">
                                <label class="form-label">Phone number</label>
                                <input type="tel" class="form-control" name="phone_number" required/>
                            </div>
{{--                            <div class="mb-3">--}}
{{--                                <label class="form-label">Vai trò</label>--}}
{{--                                <select name="role" id=""></select>--}}
{{--                            </div>--}}

                            <div class="mb-3">
                                <label class="form-label">Vai Trò</label>
                                <select class="form-control" name="role" id="role">

                                </select>
                                <div class="clearfix"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">USER_TYPE</label>
                                <select class="form-control" name="user_type" id="user_type">
                                    <option value="USER">User</option>
                                    <option value="STYLIST">Stylist</option>
                                </select>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mb-3 is_active">

                            </div>
                        </div>
                        <input type="hidden" name="actionMethod">

                        <div class="w-100 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light"
                            >Save
                            </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-close"
                            >Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




