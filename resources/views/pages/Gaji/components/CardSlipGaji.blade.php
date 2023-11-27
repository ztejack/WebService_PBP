<div class="card ">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0 mb-4">
        <h5 class="mb-0">Slip Gaji</h5>
        <small class="text-muted float-end">Slip Gaji</small>
    </div>
    <div class="card-body pt-2" style="overflow-y: overlay;
    MAX-HEIGHT: 60VH;">
        <ul class="m-0 p-0 h-100">
            @foreach ($slips as $slip)
                <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                        <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-package"></i></span>
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between">
                        <div class="me-2">
                            <h6 class="mb-1 fw-normal">Priode <span class="text-primary fw-semibold">
                                {{$slip->date->format('M Y')}}</span></h6>
                            <small
                                class=" {{ $slip->status == 'rejected' ? 'text-danger' : ($slip->status == 'disetujui' ? 'text-success' : 'text-warning') }} fw-normal">
                                @if ($slip->status == 'rejected')
                                    <i class="bx bx-x-circle "></i>Rp
                                    <span class="numbers me-2">{{ $slip->total }}</span>
                                    <span class="badge bg-label-danger d-flex ">
                                        <span class="bx bx-x text-danger"></span>
                                        <span class="ms-2 my-auto">{{ $slip->status }}</span>
                                    </span>
                                @elseif ($slip->status == 'aproved')
                                    <i class="bx bx-plus "></i>Rp
                                    <span class="numbers me-2">{{ $slip->total }}</span>
                                    <span class="badge bg-label-success d-flex ">
                                        <span class="bx bx-check-double text-success"></span>
                                        <span class="ms-2 my-auto">{{ $slip->status }}</span>
                                    </span>
                                @else
                                    <i class="bx bx-plus "></i>Rp
                                    <span class="numbers me-2">{{ $slip->total }}</span>
                                    <span class="badge bg-label-warning d-flex ">
                                        <div class="spinner-border spinner-sm text-warning" role="status">
                                            <span class="visually-hidden"></span>
                                        </div>
                                        <span class="ms-2 my-auto">{{ $slip->status }}</span>
                                    </span>
                                @endif
                            </small>
                            <small>

                            </small>
                        </div>
                        <a class="btn btn-info btn-sm" target="_blank"
                            href="{{ route('page_detail_slip_gaji', $slip->id) }}"><i class="bx bx-detail"></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
