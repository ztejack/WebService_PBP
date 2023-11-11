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
                        @foreach ($payrolls as $payrol)
                            <tr class="text-nowrap border-bottom">
                                <td class="">{{ $loop->iteration }}</td>
                                <td class="">{{ $payrol->payroll }}</td>
                                <td>{{ $payrol->name }}</td>
                                <td>{{ $payrol->total }}</td>
                                <td>
                                    <span class="badge bg-label-primary">{{ $payrol->status }}</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Button trigger modal -->
                                        <a href="" class="btn btn-sm btn-primary me-2">
                                            Detail
                                        </a>
                                        <div class="dropdown">
                                            <button class="btn btn-info btn-sm" href="/users//update">
                                                <i class='bx bx-edit'></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

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
