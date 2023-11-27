<div class="card mb-4">
    <div class="card-header d-flex justify-content-between pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Tunjangan Lain </h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                <button id="addbutton" class="dt-button create-new btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modaladdTunjanganLain" tabindex="0" type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add Parameter Tunjangan</span>
                    </span>
                </button>
            </div>
            @include('pages.Gaji.GajiParam.components.ModalAddTunjanganLain')
        </div>
    </div>
    <div class="card-datatable dataTables_scroll">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="dataTables_scroll">
                <table id="example-y" {{-- onsubmit="convertToNumber()" --}}
                    class="dt-scrollableTable table  dataTable border-top no-footer table-borderless table-sm">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Nama Tunjangan</th>
                            <th>Jenis Tunjangan</th>
                            <th>Jumlah Tunjangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tunjangan_lain as $gajiparam)
                            <tr class="border-bottom">
                                <td>{{ $loop->iteration }}</td>
                                <td class="">{{ $gajiparam->nama_tnj }}</td>
                                <td class="">{{ $gajiparam->jenis_tnj }}</td>
                                <td class="currency">{{ $gajiparam->jumlah_tnj }}</td>
                                <td class="dt-nowrap">
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-label-info me-2"
                                        data-bs-toggle="modal" data-bs-target="#modalupdatetnj{{ $gajiparam->id }}">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </button>
                                    {{-- @include('pages.Gaji.GajiParam.components.ModalUpdateTunjangan') --}}
                                    <form class="d-inline-block"
                                        action="{{ route('param.tunjangan.delete', $gajiparam->id) }}" method="post">
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
                        <tr class=" border-bottom ">
                            <th>NO</th>
                            <th>Nama Tunjangan</th>
                            <th>Jenis Tunjangan</th>
                            <th>Jumlah Tunjangan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
