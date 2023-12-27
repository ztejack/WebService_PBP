{{-- @include('components.dataPerusahaan') --}}

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">PTKP</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                <button id="addbutton" class="dt-button create-new btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modaladdPTKP" tabindex="0" type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add Parameter PTKP</span>
                    </span>
                </button>
            </div>
            @include('pages.Gaji.GajiParam.components.ModalAddPTKP')
        </div>
    </div>
    <div class="card-datatable">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-sm dataTables_scroll">
                <table id="" {{-- onsubmit="convertToNumber()" --}}
                    class="dt-scrollableTable dataTable datatables-basic table border-top table-borderless table-sm table-display">
                    <thead class="border-bottom">
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Status Keluarga</th>
                            <th>Tunjangan PTKP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gajiparam_family as $gajiparam)
                            <tr class="border-bottom">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span
                                        class="badge bg-info fw-bold">{{ $gajiparam->familystatus->familystatus }}</span>
                                </td>
                                <td class="currency">{{ $gajiparam->tnj_familystatus }}</td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-label-info mx-2"
                                        data-bs-toggle="modal" data-bs-target="#modalupdatePTKP{{ $gajiparam->id }}">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </button>
                                    @include('pages.Gaji.GajiParam.components.ModalUpdatePTKP')
                                    <form class="d-inline-block"
                                        action="{{ route('param.ptkp.delete', $gajiparam->id) }}" method="post">
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
                            <th>Status Keluarga</th>
                            <th>Tunjangan PTKP</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
