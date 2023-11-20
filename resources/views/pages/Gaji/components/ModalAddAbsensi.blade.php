<div class="modal fade" id="addkehadiranModal{{ $user->slug }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Absen Kehadiran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('absensi.store', $user->slug) }}" method="post">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="terlambat" class="form-label">Terlambat</label>
                            <input type="number" id="terlambat" name="terlambat" class="form-control form-control-sm"
                                value="0" placeholder="Enter Amount">
                        </div>
                        <div class="col mb-3">
                            <label for="sakit" class="form-label">Sakit</label>
                            <input type="number" id="sakit" name="sakit" class="form-control form-control-sm"
                                value="0" placeholder="Enter Amount">
                        </div>
                        <div class="col mb-3">
                            <label for="kosong" class="form-label">Kosong</label>
                            <input type="number" id="kosong"name="kosong" class="form-control form-control-sm"
                                value="0" placeholder="Enter Amount">
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="perjalanan">Perjalanan</label>
                            <input type="number" class="form-control form-control-sm" id="perjalanan" name="perjalanan"
                                value="0" placeholder="Enter Amount">
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
