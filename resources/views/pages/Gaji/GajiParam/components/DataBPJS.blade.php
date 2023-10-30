<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Parameter BPJS</h5>
        </div>
        <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                <button id="addbutton" class="dt-button create-new btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#modaladdBPJS" tabindex="0" type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add Parameter BPJS</span>
                    </span>
                </button>
            </div>
            @include('pages.Gaji.GajiParam.components.ModalAddBPJS')
        </div>
    </div>
    <div class="card-datatable">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-sm dataTables_scroll">
                <table id="example-x" {{-- onsubmit="convertToNumber()" --}}
                    class="dt-scrollableTable dataTable datatables-basic table table-bordered border-top">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>BPJS Tenaga Kerja <span class="text-info">(Karyawan)</span></th>
                            <th>BPJS Tenaga Kerja <span class="text-primary">(Perusahaan)</span></th>
                            <th>BPJS Kesehatan <span class="text-info">(Karyawan)</span></th>
                            <th>BPJS Kesehatan <span class="text-primary">(Perusahaan)</span></th>
                            <th>Create</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-small text-nowrap">
                        @foreach ($gajiparam_bpjs as $gajiparam)
                            <tr class="text-sm">
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-bold">{{ $gajiparam->tk_E }} %</td>
                                <td class="fw-bold"> {{ $gajiparam->tk_P }} %</td>
                                <td class="fw-bold">{{ $gajiparam->kes_E }} %</td>
                                <td class="fw-bold">{{ $gajiparam->kes_P }} %</td>
                                <td class="fw-bold">{{ $gajiparam->created_at->format('d M Y') }}</td>
                                <td class="fw-bold">
                                    @if ($gajiparam->status == true)
                                        <span class="badge bg-success">Active</span>
                                    @elseif($gajiparam->status == false)
                                        <span class="badge bg-danger">Innactive</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm rounded-pill btn-icon btn-label-info"
                                        data-bs-toggle="modal" data-bs-target="#modalupdateBPJS{{ $gajiparam->id }}"
                                        title="Edit">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </button>
                                    @include('pages.Gaji.GajiParam.components.ModalUpdateBPJS')
                                    <form class="d-inline-block"
                                        action="{{ route('param.bpjs.update.status', $gajiparam->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="btn btn-sm rounded-pill btn-icon {{ $gajiparam->status == true ? 'btn-label-danger' : 'btn-label-success' }}"
                                            onclick="return confirm('Are you sure you want to update status this Parameter?')"
                                            title="Update Status">
                                            @if ($gajiparam->status == true)
                                                <span class="tf-icons bx bx-x-circle"></span>
                                            @elseif($gajiparam->status == false)
                                                <span class="tf-icons bx bx-check-circle"></span>
                                            @endif
                                        </button>
                                    </form>
                                    <form class="d-inline-block"
                                        action="{{ route('param.bpjs.delete', $gajiparam->id) }}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-sm rounded-pill btn-icon btn-label-danger"
                                            onclick="return confirm('Are you sure you want to delete this Parameter?')"
                                            title="Delete">
                                            <span class="tf-icons bx bx-trash-alt"></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>BPJS Tenaga Kerja <span class="text-info">(Karyawan)</span></th>
                            <th>BPJS Tenaga Kerja <span class="text-primary">(Perusahaan)</span></th>
                            <th>BPJS Kesehatan <span class="text-info">(Karyawan)</span></th>
                            <th>BPJS Kesehatan <span class="text-primary">(Perusahaan)</span></th>
                            <th>Create</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
