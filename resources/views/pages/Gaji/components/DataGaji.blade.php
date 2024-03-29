{{-- @include('components.dataPerusahaan') --}}

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        Data Berhasil ditambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
@elseif (session()->has('errors'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        Gagal menambahkan data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
@endif
@if (session()->has('succ'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('succ') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
@elseif (session()->has('err'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('err') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
    <script>
        setTimeout(function() {
            $('.alert').alert('close');
        }, 5000);
    </script>
@endif
<div class="card">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Data Gaji Kariawan</h5>
        </div>
    </div>
    <div class="card-datatable text-nowrap">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5">
            <div class="dataTables_scroll">
                <table id="tableUser"
                    class="table-sm dataTables_scroll datatables-basic table table-borderless border-top ">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>JJ</th>
                            <th>Status Karyawan</th>
                            <th>Gaji</th>
                            @can('GajiManagement')
                                <th>Action</th>
                            @endcan

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            {{-- @dd($user); --}}

                            <tr class="border-bottom">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->position }}</td>
                                <td><span class="badge badge-center bg-info fw-bold"> {{ $user->golongan }}</span></td>
                                <td><span
                                        class="badge {{ $user->employe->status == true ? 'bg-label-success' : 'bg-label-warning' }}">{{ $user->employe->status == true ? 'Active' : 'Innactive' }}</span>
                                </td>
                                <td>Rp <span class="numberin">{{ round($user->gaji) }}</span></td>
                                @can('GajiManagement')
                                    <td>
                                        <div class="d-flex align-items-baseline justify-between">
                                            <!-- Button trigger modal -->
                                            <a href="{{ route('page_gaji_employe', $user->slug) }}"
                                                class="btn btn-sm btn-primary me-2">
                                                Detail
                                            </a>

                                        </div>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="border-bottom">
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>JJ</th>
                            <th>Status Karyawan</th>
                            <th>Gaji</th>
                            @can('GajiManagement')
                                <th>Action</th>
                            @endcan
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
