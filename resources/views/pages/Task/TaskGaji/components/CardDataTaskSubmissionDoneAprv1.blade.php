<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">History Permintaan Pengajuan Gaji</h5>
        </div>
    </div>
    <div class="card-datatable text-nowrap">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5">
            <div class="dataTables_scroll">
                <table class="datatables-basic table border-top border-bottom table-borderless table-sm" id="example">
                    <thead>
                        <tr class="text-nowrap border-bottom">
                            <th>NO</th>
                            <th>Payroll</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aproval</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payrolls_aprv_1 as $payrol)
                            <tr class="text-nowrap border-bottom">
                                <td class="">{{ $loop->iteration }}</td>
                                <td class="">{{ $payrol->payroll }}</td>
                                <td>{{ $payrol->name }}</td>
                                <td><span class="badge bg-label-info">{{ $payrol->jumlah }}</span></td>
                                <td> Rp <span class="numberin">{{ $payrol->total }}</span></td>
                                <td>
                                    @if ($payrol->status == 'rejected')
                                        {{-- @if ($payrol->status == 'Ditolak') --}}
                                        <span class="badge bg-label-danger" style="display: inline-flex">
                                            <span class="bx bx-x-circle"></span>
                                            <span class="my-auto">{{ $payrol->status }}</span>
                                        </span>
                                    @else
                                        <span
                                            class="badge {{ $payrol->aprv_2 == true ? 'bg-label-success' : 'bg-label-warning' }}"
                                            style="display: inline-flex">
                                            @if ($payrol->aprv_2 == true)
                                                <span class="bx bx-check-double"></span>
                                            @else
                                                <span
                                                    class="spinner-border spinner-border-sm me-1 {{ $payrol->aprv_2 == true ? 'text-success' : 'text-warning' }}"
                                                    role="status">
                                                </span>
                                            @endif
                                            <span class="my-auto">{{ $payrol->status }}</span>
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="form-check-success">
                                        <input class="form-check-input opacity-100" type="checkbox"
                                            {{ $payrol->aprv_1 ? 'checked' : '' }} disabled>
                                        <input class="form-check-input opacity-100" type="checkbox"
                                            {{ $payrol->aprv_2 ? 'checked' : '' }} disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Button trigger modal -->
                                        <a class="btn btn-sm btn-primary me-2"
                                            href="{{ route('submission.show', $payrol->id) }}" target="_blank">
                                            Detail
                                        </a>
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
                            <th>Total</th>
                            <th>Status</th>
                            <th>Aproval</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
