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
                            <th>Kehadiran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            {{-- @dd($user); --}}

                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->position }}</td>
                                <td><span class="badge badge-center bg-info fw-bold"> {{ $user->golongan }}</span></td>
                                {{-- <td>{{ $user->gaji }}</td> --}}
                                <td>Rp <span class="numberin">{{ $user->gaji }}</span></td>
                                <td><span class="badge badge-pill bg-success fw-bold">24</span></td>
                                <td>
                                    <div class="d-flex align-items-baseline justify-between">
                                        <!-- Button trigger modal -->
                                        <a href="{{ route('page_gaji_employe', $user->slug) }}"
                                            class="btn btn-sm btn-primary me-2">
                                            Detail
                                        </a>
                                        <button class="btn btn-sm btn-warning me-2" data-bs-toggle="modal"
                                            data-bs-target="#addkehadiranModal">
                                            Absensi
                                        </button>
                                        @include('pages.Gaji.components.ModalAddAbsensi')
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Nama User</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Gaji</th>
                            <th>Kehadiran</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
