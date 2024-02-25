@extends('admin.layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-md-4">
                            <div class="mt-3 mt-md-0">
                                <button type="button" class="btn btn-success waves-effect waves-light"
                                        data-bs-toggle="modal" data-bs-target="#custom-modal"><i
                                        class="mdi mdi-plus-circle me-1"></i> Add contact
                                </button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <form class="d-flex flex-wrap align-items-center justify-content-sm-end">
                                <label for="status-select" class="me-2">Sort By</label>
                                <div class="me-sm-2">
                                    <select class="form-select my-1 my-md-0" id="status-select"
                                            >
                                        <option value="all">All</option>
                                        <option value="1">Name</option>
                                        <option value="2">Post</option>
                                        <option value="3">Followers</option>
                                    </select>
                                </div>
                                <label for="inputPassword2" class="visually-hidden">Search</label>

                                <div>
                                    <input type="search" class="form-control my-1 my-md-0"
                                           id="inputPassword2"
                                           placeholder="Search..."/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="text-center card-body">
                    <div>
                        <img src="https://kenh14cdn.com/thumb_w/660/2020/7/16/1-15948998699171250460902.jpg"
                             class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image"/>

                        <p class="text-muted font-13 mb-3">
                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                            1500s, when an unknown printer took a galley of type.
                        </p>

                        <div class="text-start">
                            <p class="text-muted font-13"><strong>Full Name :</strong> <span
                                    class="ms-2">{{}}</span></p>

                            <p class="text-muted font-13"><strong>Mobile :</strong><span class="ms-2">0342 599 803</span>
                            </p>

                            <p class="text-muted font-13"><strong>Email :</strong> <span
                                    class="ms-2">nobita1271999@gmail.com</span></p>

                            <p class="text-muted font-13"><strong>Location :</strong> <span
                                    class="ms-2">Việt Nam</span></p>
                        </div>

                        <button type="button"
                                class="btn btn-primary rounded-pill waves-effect waves-light">Update member
                        </button>
                        <button type="button"
                                class="btn btn-danger rounded-pill waves-effect waves-light ms-1">Delete
                            member
                        </button>
                    </div>
                </div>
            </div>


        </div>

    </div>



    <div class="modal fade" id="custom-modal" tabIndex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h4 class="modal-title" id="myCenterModalLabel">Thêm Nhân viên</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name"/>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Chức vụ</label>
                            <input type="text" class="form-control" id="position"
                                   placeholder="Enter position"/>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                   placeholder="Enter email"/>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Avatar</label>
                            <input type="file" class="form-control" id="file" placeholder="Avatar"/>
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light"
                                data-bs-dismiss="modal">Save
                        </button>
                        <button type="button" class="btn btn-danger waves-effect waves-light ms-1"
                                data-bs-dismiss="modal">Cancel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection

