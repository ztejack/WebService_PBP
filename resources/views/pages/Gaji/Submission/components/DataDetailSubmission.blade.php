<div class="card mb-4">
    <h5 class="card-header">Pengajuan Gaji <span class="text-info">{{ $payrol->payroll->format('d-m-Y') }}</span></h5>

    <div class="card-body">
        <div>
            <h5>Pengajuan :
                {{ $payrol->name }}
            </h5>
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
                            <a class="btn btn-sm btn-primary p-1" href="{{ route('page_detail_slip_gaji', $slip->id) }}">
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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalcommingsoon">
                <i class="bx bx-printer me-2"></i> Export EXCEL
            </button>
            @include('components.global.modalcommingsoon')
        </div>
    </div>
</div>
