<div class="modal fade" id="ModalAbsensi{{ $item->id }}" style="display: none;" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Absen Kehadiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('absensi.update', $item->id) }}" method="post">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col->12 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <label for="terlambat" class="form-label">Terlambat</label>
                                    <div class="row align-items-center">
                                        <div class="col-8 d-inline-flex align-items-center pe-0">
                                            <input type="number" id="terlambat" name="terlambat"
                                                class="form-control form-control-sm"
                                                value="{{ $item->terlambat > 0 ? $item->terlambat : 0 }}"
                                                placeholder="Enter Amount">
                                            <span class="mx-2 bx bx-x text-info"></span>
                                            <span class="d-inline-flex">Rp <span class="numbers">
                                                    {{ $tnj_makan }}</span></span>
                                        </div>
                                        <div class="col-4 d-inline-flex ps-0"><span
                                                class="mx-2 fw-bold text-info">=</span> Rp <span
                                                class="numbers">{{ $item->terlambat * $tnj_makan }}</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col->12 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <label for="sakit" class="form-label">Sakit</label>
                                    <div class="row align-items-center">
                                        <div class="col-8 d-inline-flex align-items-center pe-0">
                                            <input type="number" id="sakit" name="sakit"
                                                class="form-control form-control-sm"
                                                value="{{ $item->sakit > 0 ? $item->sakit : 0 }}"
                                                placeholder="Enter Amount">
                                            <span class="mx-2 bx bx-x text-info"></span>
                                            <span class="d-inline-flex">Rp <span class="numbers">
                                                    {{ $tnj_makan + $tnj_transport }}</span></span>
                                        </div>
                                        <div class="col-4 d-inline-flex ps-0"><span
                                                class="mx-2 fw-bold text-info">=</span> Rp <span
                                                class="numbers">{{ $item->sakit * ($tnj_makan + $tnj_transport) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col->12 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <label for="kosong" class="form-label">Absen</label>
                                    <div class="row align-items-center">
                                        <div class="col d-inline-flex align-items-center pe-0">
                                            <input type="number" id="kosong"name="kosong"
                                                class="form-control form-control-sm"
                                                value="{{ $item->kosong > 0 ? $item->kosong : 0 }}"
                                                placeholder="Enter Amount">
                                            <span class="mx-2 bx bx-x text-info"></span>
                                            <span class="d-inline-flex">Rp <span class="numbers">
                                                    {{ $tnj_makan + $tnj_transport }}</span></span>

                                        </div>

                                        <div class="col-4 d-inline-flex ps-0"><span
                                                class="mx-2 fw-bold text-info">=</span> Rp
                                            <span
                                                class="numbers">{{ $item->kosong * ($tnj_makan + $tnj_transport) }}</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col->12 mb-3">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="perjalanan">Perjalanan</label>
                                    <div class="row align-items-center">
                                        <div class="col d-inline-flex align-items-center pe-0">
                                            <input type="number" class="form-control form-control-sm" id="perjalanan"
                                                name="perjalanan"
                                                value="{{ $item->perjalanan > 0 ? $item->perjalanan : 0 }}"
                                                placeholder="Enter Amount"><span class="mx-2 bx bx-x text-info"></span>
                                            <span class="d-inline-flex">Rp <span class="numbers">
                                                    {{ $tnj_makan + $tnj_transport }}</span></span>

                                            {{-- <span class="numbers">500000</span> --}}
                                        </div>

                                        <div class="col-4 d-inline-flex ps-0"> <span
                                                class="mx-2 fw-bold text-info">=</span>
                                            Rp
                                            <span
                                                class="numbers">{{ $item->perjalanan * ($tnj_makan + $tnj_transport) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <label class="form-label" for="total-absen">Total</label>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text bg-label-secondary">Rp </span>
                                <input class="form-control numberin" id="total-absen" type="text" readonly disabled
                                    value="{{ $item->total_sum }}">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
