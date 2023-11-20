{{-- @include('components.dataPerusahaan') --}}

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        Data Berhasil ditambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session()->has('errors'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        Gagal menambahkan data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Data User</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                {{-- <a href="users/create" class="dt-button create-new btn btn-primary" tabindex="0" type="button"> --}}
                <button id="addbutton" class="dt-button create-new btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addUserModal"tabindex="0" type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add New User</span>
                    </span>
                </button>
                {{-- <button type="button" class="btn btn-primary" ">
            Launch modal
          </button> --}}
                @include('pages.Users.components.AddUserModal')
            </div>
        </div>
    </div>
    <div class="card-datatable text-nowrap">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5">
            <div class="dataTables_scroll">
                <table class="datatables-basic table border-top border-bottom table-borderless table-sm" id="example">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-nowrap border-bottom">
                                <td class="">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <span
                                        class="badge {{ $user->employee->status == true ? 'bg-label-primary' : 'bg-label-warning' }}">{{ $user->employee->status == true ? 'Active' : 'Innactive' }}</span>
                                </td>
                                <td>
                                    @if ($user->getRoleNames()->first() == 'SuperUser')
                                        <span class="badge bg-label-danger">Super User</span>
                                    @elseif($user->getRoleNames()->first() == 'Admin')
                                        <span class="badge bg-label-info">Admin</span>
                                    @elseif($user->getRoleNames()->first() == 'Guest')
                                        <span class="badge bg-label-success">Guest</span>
                                    @elseif($user->getRoleNames()->first() == 'Employe')
                                        <span class="badge bg-label-warning">{{ $user->getRoleNames()->first() }}</span>
                                    @else
                                        <span class="badge bg-label-warning">{{ $user->getRoleNames()->first() }}</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <!-- Button trigger modal -->
                                        <a href="{{ route('detail_view_user', $user->slug) }}"
                                            class="btn btn-sm btn-primary">
                                            Detail User
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/users/{{ $user->slug }}/update">
                                                    <i class='bx bx-edit'></i>
                                                    Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                @if ($user->employee->status == true)
                                                    <form id="userArchive-form" action="{{ route('archive_user') }}"
                                                        method="POST">
                                                        <input class="d-none" name="slug" hidden
                                                            value="{{ $user->slug }}">
                                                        <input type="checkbox" name="accountArchive" id="accountArchive"
                                                            checked hidden>
                                                        @method('post')
                                                        @csrf
                                                        <button class="dropdown-item text-danger"
                                                            onclick="return confirm('Apa anda yakin?')">
                                                            <i class="bx bx-x-circle"></i> Nonaktifkan
                                                        </button>
                                                    </form>
                                                @else
                                                    <form id="userActive-form" action="{{ route('unarchive_user') }}"
                                                        method="POST">
                                                        <input class="d-none" name="slug" hidden
                                                            value="{{ $user->slug }}">
                                                        <input type="checkbox" name="accountArchive" id="accountArchive"
                                                            checked hidden>
                                                        @method('post')
                                                        @csrf
                                                        <button class="dropdown-item text-info"
                                                            onclick="return confirm('Apa anda yakin?')">
                                                            <i class="bx bx-check-square"></i> Aktifkan
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Role User</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
