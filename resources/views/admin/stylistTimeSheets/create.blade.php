

<div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Add</h4>

                </div>
                <div class="modal-body">
                    <form class="" id="formModal">

                        <div class="">
                            <div class="mb-3">
                                <label class="form-label">Stylist</label>
                                <select class="form-select" name="user_id" id="stylist_id">

                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Ngày làm việc</label>
                                <select class="form-select" name="work_day_id" id="work_day_id">

                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Time-Sheets</label>
                                <select name="timesheet_id[]" id="timesheet_id">

                                </select>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Active</label>
                                <select name="is_active" class="form-select">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Block</label>
                                <select name="is_block" class="form-select">
                                    <option value="1">Block</option>
                                    <option value="0">Unblock</option>
                                </select>
                            </div>
                            <div class="mb-3 is_active">

                            </div>
                        </div>
                        <input type="hidden" name="actionMethod">

                        <div class="w-100 text-center">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Save </button>
                            <button type="button" class="btn btn-danger waves-effect waves-light ms-1 jquery-close">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




