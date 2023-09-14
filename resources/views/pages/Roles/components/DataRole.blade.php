<div class="col-xl-6 mb-4 order-1 order-xl-0">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">ROLE USER</h5>
            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="bx bx-plus-circle"></span>
                    Add Role
                </button>
                <div class="dropdown-menu dropdown-menu-end w-px-300" style="">
                    <form class="p-4" onsubmit="return false">
                        <div class="mb-3">
                            <label for="DropdownFormRole" class="form-label">Role Name</label>
                            <input type="rolename" class="form-control" id="DropdownFormRole"
                                placeholder="Enter Role Name">
                        </div>
                        <button type="Submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="dropdown-divider"></div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>User & Permission</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>

                            <td>
                                <div class="d-flex justify-content-start align-items-center">

                                    <div class="d-flex flex-column">
                                        <h6 class="mb-0 text-truncate">{{ $role->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-label-success rounded-pill text-uppercase">
                                    <span class="bx bxs-user"></span>
                                    {{ $role->users->count() }}
                                </span>
                                <span class="badge bg-label-primary rounded-pill text-uppercase">
                                    <span class="bx bx-key"></span>
                                    {{ $role->permissions->count() }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalrole{{ $role->name }}">
                                        Detail
                                    </button>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">
                                                <i class='bx bx-edit'></i>
                                                Edit
                                            </a>

                                            <div class="dropdown-divider"></div>
                                            {{-- <form id="userArchive-form" action="{{ route('archive_user') }}" method="POST"> --}}
                                            <input class="d-none" name="slug" hidden value="">
                                            <input type="checkbox" name="accountArchive" id="accountArchive" checked
                                                hidden>
                                            <button class="dropdown-item text-danger"
                                                onclick="return confirm('Apa anda yakin?')">
                                                <i class="bx bx-x-circle"></i> Nonaktifkan
                                            </button>
                                            {{-- </form> --}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach ($roles as $role)
                <div class="modal fade" id="modalrole{{ $role->name }}" tabindex="-1" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalrole{{ $role->name }}Title">Modal
                                    title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <h5 class="card-header">Permission</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($role->permissions as $permission)
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span
                                                            class="fw-medium">{{ $permission->name }}</span></td>
                                                    {{-- <td>{{ $permission->username }}</td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <h5 class="card-header">User</h5>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($role->users as $user)
                                                <tr>
                                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <span
                                                            class="fw-medium">{{ $user->name }}</span></td>
                                                    <td>{{ $user->username }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
