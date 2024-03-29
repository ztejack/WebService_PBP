<div class="modal fade" id="addkehadiranModal{{ $user->slug }}" tabindex="-1" style="display: none;" aria-hidden="true"
    aria-labelledby="modalToggleLabelabsensi" tabindex="-1">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalToggleLabelabsensi">Absen Kehadiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('absensi.store', $user->slug) }}" method="post">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <div class="input-group">
                                <input type="text" class="add-on form-control form-control-sm"
                                    value="{{ now()->format('M Y') }}" readonly>
                                <input type="hidden" name="date" value="{{ now() }}">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="terlambat" class="form-label">Terlambat
                            </label>
                            <input type="number" id="terlambat" name="terlambat" class="form-control form-control-sm"
                                value="{{ $user->employee->getcurrentabsensi()->terlambat }}"
                                placeholder="Enter Amount">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="sakit" class="form-label">Sakit</label>
                            <input type="number" id="sakit" name="sakit" class="form-control form-control-sm"
                                value="{{ $user->employee->getcurrentabsensi()->sakit }}" placeholder="Enter Amount">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="kosong" class="form-label">Absen</label>
                            <input type="number" id="kosong"name="kosong" class="form-control form-control-sm"
                                value="{{ $user->employee->getcurrentabsensi()->kosong }}" placeholder="Enter Amount">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="perjalanan">Dinas</label>
                            <input type="number" class="form-control form-control-sm" id="perjalanan" name="perjalanan"
                                value="{{ $user->employee->getcurrentabsensi()->perjalanan }}"
                                placeholder="Enter Amount">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
