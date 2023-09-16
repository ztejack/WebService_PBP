<div class="col-xl-8 mb-4 order-1 order-xl-0">

    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">ROLE USER
                <span class="badge bg-label-info rounded-pill text-uppercase"><span class="bx bx-shield-quarter"></span>
                    {{ $roles->count() }}</span>
            </h5>

            <div class="btn-group">
                <button type="button" class="btn btn-primary dropdown-toggle" id="BtnDropdownFormRole"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="bx bx-plus-circle"></span>
                    Add Role
                </button>
                {{-- Form Add Role --}}
                <div class="dropdown-menu dropdown-menu-end w-px-300" style="">
                    <form class="p-4" method="post" action="{{ route('role.store') }}">
                        @method('POST')
                        @csrf
                        <div class="mb-3">
                            <label for="DropdownFormRole" class="form-label">Role Name</label>
                            <input type="name" name="name" class="form-control" id="DropdownFormRole"
                                placeholder="Enter Role Name" value="{{ old('name') }}">
                            @error('name')
                                <script>
                                    $(document).ready(function() {
                                        // Trigger a click event on the button when the document is ready
                                        $('#BtnDropdownFormRole').click();
                                    });
                                </script>

                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
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
                                        <h6 class="mb-0 text-truncate">
                                            {{ $role->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-label-success rounded-pill text-uppercase"data-bs-toggle="tooltip"
                                    data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                    data-bs-original-title="<span>User</span>">
                                    <span class="bx bxs-user"></span>
                                    {{ $role->users->count() }}
                                </span>
                                <span class="badge bg-label-primary rounded-pill text-uppercase"data-bs-toggle="tooltip"
                                    data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                    data-bs-original-title="<span>Permission</span>">
                                    <span class="bx bx-key"></span>
                                    {{ $role->permissions->count() }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <button type="button" class="btn btn-sm btn-primary " data-bs-toggle="modal"
                                        data-bs-target="#RoleModal{{ $role->id }}">
                                        Detail
                                    </button>
                                    {{-- <button type="button" class="btn btn-sm btn-primary dropdown-toggle mx-2"
                                        id="BtnDropdownFormRole" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class='bx bx-edit'></i>
                                        Edit
                                    </button> --}}
                                    {{-- <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal"
                                        type="button" class="btn btn-sm btn-primary dropdown-toggle mx-2"><small><i
                                                class='bx bx-edit'></i> Edit Role</small></a> --}}
                                    {{-- Form Add Role --}}
                                    {{-- <div class="dropdown-menu dropdown-menu-end w-px-300" style="">
                                        <form class="p-4" method="post"
                                            action="{{ route('role.update', $role->id) }}">
                                            @method('POST')
                                            @csrf
                                            <div class="mb-3">
                                                <label for="DropdownFormRole" class="form-label">Role
                                                    Name</label>
                                                <input type="name" name="name" class="form-control"
                                                    id="DropdownFormRole" placeholder="Enter Role Name"
                                                    value="{{ $role->name }}">
                                                @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <button type="Submit" class="btn btn-sm btn-primary">Submit</button>
                                        </form>
                                    </div> --}}
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>

                                        <div class="dropdown-menu">
                                            {{-- <form id="userArchive-form" action="{{ route('archive_user') }}" method="POST"> --}}
                                            <input class="d-none" name="slug" hidden value="">
                                            <input type="checkbox" name="accountArchive" id="accountArchive" checked
                                                hidden>
                                            <button class="dropdown-item text-danger"
                                                onclick="return confirm('Apa anda yakin?')">
                                                <i class="bx bx-trash"></i> Delete
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

            {{-- @foreach ($roles as $role)
                <div class="modal fade" id="modalrole{{ $role->name }}" tabindex="-1" style="display: none;"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalrole{{ $role->name }}Title">Detai User</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <h5 class="card-header">Permission</h5>
                                <div class="row">

                                </div>
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
            @endforeach --}}
        </div>
    </div>
    @foreach ($roles as $role)
        {{-- @dd($role->permissions) --}}

        <div class="modal fade" id="RoleModal{{ $role->id }}" tabindex="1" style="display: none;"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="mb-0">Edit Role</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-0">
                        <div class="text-center mb-4">
                            <p>Set role permissions</p>
                        </div>
                        <!-- Add role form -->
                        <form id="RoleForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework"
                            onsubmit="return false" novalidate="novalidate">
                            <div class="col-12 mb-4 fv-plugins-icon-container">
                                <label class="form-label" for="modalRoleName">Role Name</label>
                                <input type="text" id="modalRoleName" name="modalRoleName"
                                    class="form-control fw-bold" placeholder="Enter a role name" tabindex="-1"
                                    value="{{ $role->name }}" disabled>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>

                            <div class="col-12">
                                <h4>Role Permissions</h4>
                                <!-- Permission table -->
                                <div class="table-responsive">
                                    <table class="table table-flush-spacing">
                                        <tbody>
                                            @foreach ($permissions as $permission)
                                                @if ($role->permissions->contains('name', $permission->name))
                                                    <tr>
                                                        <td class="text-nowrap fw-medium">{{ $permission->name }}
                                                        </td>
                                                        <td>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="permission{{ $permission->name }}" checked>
                                                                <label class="form-check-label"
                                                                    for="permission{{ $permission->name }}">
                                                                    Read
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @else
                                                    <tr>
                                                        <td class="text-nowrap fw-medium">{{ $permission->name }}
                                                        </td>
                                                        <td>
                                                            <div class="form-check me-3 me-lg-5">
                                                                <input class="form-check-input" type="checkbox"
                                                                    id="permission{{ $permission->name }}">
                                                                <label class="form-check-label"
                                                                    for="permission{{ $permission->name }}">
                                                                    Read
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td class="text-nowrap fw-medium">Administrator Access <i
                                                        class="bx bx-info-circle bx-xs" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        aria-label="Allows a full access to the system"
                                                        data-bs-original-title="Allows a full access to the system"></i>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="selectAll">
                                                        <label class="form-check-label" for="selectAll">
                                                            Select All
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- Permission table -->
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel</button>
                            </div>
                            <input type="hidden">
                        </form>
                        <!--/ Add role form -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
