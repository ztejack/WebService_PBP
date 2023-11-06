<div class="card">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Data Pengajuan Gaji</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                {{-- <a href="users/create" class="dt-button create-new btn btn-primary" tabindex="0" type="button"> --}}
                <a id="addbutton" href="{{ route('submission.view_store') }}" class="dt-button create-new btn btn-primary">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-sm-inline-block">Ajukan Gaji</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="card-datatable text-nowrap">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5">
            <div class="dataTables_scroll">
                <table class="datatables-basic table border-top border-bottom table-borderless table-sm" id="examples">
                    <thead>
                        <tr class="text-nowrap border-bottom">
                            <th>NO</th>
                            <th>Payroll</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($users as $user) --}}
                        <tr class="text-nowrap border-bottom">
                            {{-- <td class="">{{ $loop->iteration }}</td> --}}
                            <td class=""></td>
                            <td></td>
                            <td></td>
                            <td>
                                <span class="badge bg-label-primary"></span>
                            </td>
                            <td>
                                {{-- @if ($user->getRoleNames()->first() == 'SuperUser')
                                        <span class="badge bg-label-danger">Super User</span>
                                    @elseif($user->getRoleNames()->first() == 'Admin')
                                        <span class="badge bg-label-info">Admin</span>
                                    @elseif($user->getRoleNames()->first() == 'Guest')
                                        <span class="badge bg-label-success">Guest</span>
                                    @elseif($user->getRoleNames()->first() == 'Employe')
                                        <span class="badge bg-label-warning">{{ $user->getRoleNames()->first() }}</span>
                                    @endif --}}
                            </td>
                            <td>
                                <div class="d-flex align-items-center">

                                    <!-- Button trigger modal -->
                                    <a href="users//detail" class="btn btn-sm btn-primary">
                                        Detail User
                                    </a>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/users//update">
                                                <i class='bx bx-edit'></i>
                                                Edit
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            {{-- @if ($user->employee->status == true)
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
                                                @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        {{-- @endforeach --}}

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Payroll</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
