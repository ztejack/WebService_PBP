<div class="modal fade" id="addLemburModal{{$user->employe->uuid}}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Lembur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('lembur.store', $user->employe->uuid) }}" method="post">
                @method('POST')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3">
                            <label for="date" class="form-label">date</label>
                            <div class="input-group">
                                <input type="text" class="add-on form-control form-control-sm"
                                    value="{{ now()->format('M Y') }}" readonly>
                                    <input type="hidden" name="date" value="{{now()}}">
                                <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="jumlah_lembur">Nominal Lembur</label>
                            <input type="number" min="0" class="form-control form-control-sm" id="jumlah_lembur"
                                name="jumlah_lembur" value="0" placeholder="Enter Amount" step="1000" required>
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
