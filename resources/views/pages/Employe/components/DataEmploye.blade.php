@if (session()->has('succ'))
    <div class="alert alert-success alert-dismissible" role="alert">
        Data Berhasil ditambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session()->has('err'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        Gagal menambahkan data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Data Karyawan</h5>
        </div>
    </div>
    <div class="card-datatable text-nowrap">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5">
            <div class="dataTables_scroll">
                <table class="datatables-basic table border-top border-bottom table-borderless table-sm" id="example">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Contract</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="text-nowrap border-bottom">
                                <td class="">{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td><span class="badge badge-center bg-info fw-bold"> {{ $user->golongan }}</span></td>
                                <td>{{ $user->position }}</td>
                                <td>
                                    <span
                                        class="badge {{ $user->status == true ? 'bg-label-primary' : 'bg-label-warning' }}">{{ $user->status == true ? 'Active' : 'Innactive' }}</span>
                                </td>
                                <td>
                                    @if ($user->contract == 'PKWT')
                                        <span class="badge bg-label-warning">{{ $user->contract }}</span>
                                    @elseif($user->contract == 'TETAP')
                                        <span class="badge bg-label-info">{{ $user->contract }}</span>
                                    @else
                                        <span class="badge bg-label-dark">{{ $user->contract }}</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <a href="{{ route('detail_view_user', $user->slug) }}" class="btn btn-sm btn-info">
                                        <i class="bx bx-detail"></i>
                                        Detail
                                    </a>
                                    @can('GajiManagement')
                                        <a href="{{ route('page_gaji_employe', $user->slug) }}"
                                            class="btn btn-sm btn-success">
                                            <i class="bx bx-dollar-circle"></i>
                                            Data Gaji
                                        </a>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Golongan</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Contract</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
