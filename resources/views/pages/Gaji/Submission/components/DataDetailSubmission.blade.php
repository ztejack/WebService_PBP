<div class="card mb-4">
    <h5 class="card-header">Pengajuan Gaji <span class="text-info">{{ $payrol->payroll->format('d-m-Y') }}</span></h5>

    <div class="card-body">
        <div>
            <h6>Pengajuan :
                {{ $payrol->name }}
            </h6>
            <h6>Status :
                @if ($payrol->status == 'rejected')
                    <span class="badge bg-label-danger">
                        <span class="bx bx-x-circle"></span>
                        Pengajuan Gaji Ditolak
                    </span>
                @else
                    @if ($payrol->aprv_1 == true)
                        @if ($payrol->aprv_2 == true)
                            @if ($payrol->aprv_3 == true)
                                @if ($payrol->aprv_4 == true)
                                    <span class="badge bg-label-success">
                                        <span class="bx bx-check"></span>
                                        {{ $payrol->status }}
                                    </span>
                                @else
                                    <span class="badge bg-label-warning">
                                        <span class="spinner-border spinner-border-sm me-1 text-warning" role="status">
                                        </span>
                                        Menunggu Persetujuan Direktur Utama
                                    </span>
                                @endif
                                @else{{ $payrol->status }}
                                <span class="badge bg-label-warning">
                                    <span class="spinner-border spinner-border-sm me-1 text-warning" role="status">
                                    </span>
                                    Menunggu Persetujuan General Manager
                                </span>
                            @endif
                            @else{{ $payrol->status }}
                            <span class="badge bg-label-warning">
                                <span class="spinner-border spinner-border-sm me-1 text-warning" role="status">
                                </span>
                                Menunggu Persetujuan Asistem Manager
                            </span>

                        @endif
                        @else{{ $payrol->status }}
                        <span class="badge bg-label-warning">
                            <span class="spinner-border spinner-border-sm me-1 text-warning" role="status">
                            </span>
                            Menunggu persetujuan Supervisor
                        </span>

                    @endif
                @endif

            </h6>
            <div class="divider">
                <div class="divider-text">
                    Data Gaji
                </div>
            </div>
        </div>
        <table class="table border-top table-borderless table-sm">
            <thead>
                <tr class="border-bottom text-nowrap">
                    <th>No</th>
                    <th>Name</th>
                    <th>Total Gaji</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payrol->gajislip as $slip)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $slip->employee->getUserNameAttribute() }}</td>
                        <td>Rp <span class="numberin">{{ $slip->total }}</span></td>
                        <td>
                            <a class="btn btn-sm btn-primary p-1"
                                href="{{ route('page_detail_slip_gaji', $slip->id) }}">
                                <i class="bx bx-detail "></i> Detail
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td class="text-end fw-bold">Total :</td>
                    <td class="fw-bold">Rp <span class="numberin">{{ $payrol->total }}</span></td>
                    <td></td>
                </tr>
            </tbody>

        </table>
        <div class="align-self-end d-flex justify-content-end">
            {{-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#modalcommingsoon">
                <i class="bx bx-printer me-2"></i> Export EXCEL
            </button>
            @include('components.global.modalcommingsoon') --}}
            @if ($payrol->status == 'aproved')
                <a href="{{ route('submission.print', $payrol->id) }}" type="button"
                    class="ms-2 btn btn-sm btn-primary ">
                    <i class="bx bxs-file-export me-2"></i> Export EXCEL
                </a>
            @else
                <button type="button" class="ms-2 btn btn-sm btn-secondary" data-bs-toggle="tooltip" data-bs-offset="0,4"
                    data-bs-placement="top" data-bs-html="true"
                    data-bs-original-title="<span>Menunggu Persetujuan</span>">
                    <i class="bx bxs-file-export me-2"></i> Export EXCEL
                </button>
            @endif



        </div>
    </div>
</div>
