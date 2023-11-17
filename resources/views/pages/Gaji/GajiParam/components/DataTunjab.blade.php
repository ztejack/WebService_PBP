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
@elseif (session()->has('succ'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('succ') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session()->has('err'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('err') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Tunjangan Jabatan</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                <button id="addbutton" class="dt-button create-new btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modaladdTunjab" tabindex="0" type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add Parameter Tunjangan Jabatan</span>
                    </span>
                </button>
            </div>
            @include('pages.Gaji.GajiParam.components.ModalAddTunjab')
        </div>
    </div>
    <div class="card-datatable">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-sm dataTables_scroll">
                <table id="example" {{-- onsubmit="convertToNumber()" --}}
                    class="dt-scrollableTable dataTable datatables-basic table border-top table-borderless table-sm">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Gaji Struktural</th>
                            <th>Gaji Fungsional</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gajiparam_tunjab as $gajiparam)
                            <tr class="border-bottom">
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-bold">{{ $gajiparam->position->position }} </td>
                                <td>
                                    <span
                                        class="badge badge-center bg-info fw-bold">{{ $gajiparam->golongan->golongan }}</span>
                                </td>
                                <td class="currency">{{ $gajiparam->gaji_struktural }} </td>
                                <td class="currency">{{ $gajiparam->gaji_fungsional }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-label-info mx-2"
                                        data-bs-toggle="modal" data-bs-target="#modalupdate{{ $gajiparam->id }}">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </button>
                                    @include('pages.Gaji.GajiParam.components.ModalUpdateTunjab')
                                    <form class="d-inline-block"
                                        action="{{ route('gaji_param.delete', $gajiparam->id) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-sm rounded-pill btn-icon btn-label-danger"
                                            onclick="return confirm('Are you sure you want to delete this Param?')">
                                            <span class="tf-icons bx bx-trash-alt"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="border-bottom">
                            <th>NO</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Gaji Struktural</th>
                            <th>Gaji Fungsional</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
