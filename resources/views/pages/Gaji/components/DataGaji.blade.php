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
            <h5 class="card-title mb-0">Data Gaji Kariawan</h5>
        </div>
    </div>
    <div class="card-datatable">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-sm dataTables_scroll">
                <table id="tableUser" class="table table-hover" style="width:100%">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Nama User</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Gaji</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->position }}</td>
                                <td><span class="badge badge-center bg-info fw-bold"> {{ $user->golongan }}</span></td>
                                <td>{{ $user->gaji }}</td>
                                <td>
                                    <div class="d-flex align-items-center">

                                        <!-- Button trigger modal -->
                                        <a href="{{ route('page_gaji_employe', $user->slug) }}"
                                            class="btn btn-sm btn-primary">
                                            Detail Gaji
                                        </a>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('page_gaji_employe', $user->slug) }}">
                                                    <i class='bx bx-edit'></i>
                                                    Edit
                                                </a>
                                                <div class="dropdown-divider"></div>

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
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Gaji Pokok</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
