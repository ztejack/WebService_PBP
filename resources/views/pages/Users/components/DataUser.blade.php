{{-- @include('components.dataPerusahaan') --}}
<div class="card">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Data User</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                <button class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2" tabindex="0"
                    aria-controls="DataTables_Table_0" type="button" aria-haspopup="true" aria-expanded="false">
                    <span>
                        <i class="bx bx-export me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Export</span>
                    </span>
                </button>

                <a href="users/create" class="dt-button create-new btn btn-primary" tabindex="0" type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add New Record</span>
                    </span>
                </a>
                {{-- @include('components.addusermodal') --}}

            </div>
        </div>
    </div>
    <div class="card-datatable">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-responsive text-nowrap">
                <table id="tableUser" class="table table-hover" style="width:100%">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Nomor Telepon</th>
                            <th>Level User</th>
                            <th>Perusahaan</th>
                            <th>Satuan Kerja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phonenumber }}</td>
                                <td>
                                    {{-- @if ($user->level->id == 1)
                                        <span class="badge bg-label-danger">ADMIN</span>
                                    @elseif($user->level->id == 2)
                                        <span class="badge bg-label-info">KASIR</span>
                                    @elseif($user->level->id == 3)
                                        <span class="badge bg-label-success">USER</span>
                                    @endif --}}
                                </td>
                                <td>X</td>
                                <td>X</td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <!-- Button trigger modal -->
                                        <a href="users/{{ $user->id }}/show" class="btn btn-sm btn-primary">
                                            Detail User
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"target="_blank"
                                                    href="/users/{{ $user->id }}/edit">
                                                    <i class='bx bx-edit'></i>
                                                    Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <form id="userDelete-form"
                                                    action="/transaksi/{{ $user->id }}/destroy" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="dropdown-item text-danger"
                                                        onclick="return confirm('Apa anda yakin?')">
                                                        <i class="bx bx-x-circle"></i> Delete
                                                    </button>
                                                </form>

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
                            <th>Nomor Telepon</th>
                            <th>Level User</th>
                            <th>Perusahaan</th>
                            <th>Satuan Kerja</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
