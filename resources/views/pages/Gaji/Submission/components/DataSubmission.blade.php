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
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payrolls as $payrol)
                            <tr class="text-nowrap border-bottom">
                                <td class="">{{ $loop->iteration }}</td>
                                <td class="">{{ $payrol->payroll->format('d-m-Y') }}</td>
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
                                    <div class="d-flex align-items-center">
                                        <!-- Button trigger modal -->
                                        <a class="btn btn-sm btn-primary me-2"
                                            href="{{ route('submission.show', $payrol->id) }}">
                                            Detail
                                        </a>
                                        {{-- <a class="btn
                                            btn-info btn-sm me-2"
                                            href="{{ route('submission.view_update', $payrol->id) }}">
                                            <i class='bx bx-edit'></i>
                                        </a> --}}
                                        @if ($payrol->status == 'aproved')
                                            <a href="{{ route('submission.print', $payrol->id) }}" type="button"
                                                class="me-2 btn btn-sm btn-primary ">
                                                <i class="bx bxs-file-export me-2"></i> Export
                                            </a>
                                        @else
                                            <button type="button" class="me-2 btn btn-sm btn-secondary"
                                                data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top"
                                                data-bs-html="true"
                                                data-bs-original-title="<span>Menunggu Persetujuan</span>">
                                                <i class="bx bxs-file-export me-2"></i> Export
                                            </button>
                                        @endif

                                        <form action="{{ route('submission.delete', $payrol->id) }}" method="post">
                                            @csrf
                                            <button
                                                class="btn btn-danger btn-sm {{ $payrol->status != 'aproved' ? '' : 'disabled' }}"
                                                type="submit"{{ $payrol->status != 'aproved' ? '' : 'disabled' }}>
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
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
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
