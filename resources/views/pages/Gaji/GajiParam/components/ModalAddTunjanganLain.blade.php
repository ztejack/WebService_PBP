<div class="modal fade" id="modaladdTunjanganLain" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add Parameter Tunjangan Lain</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Form -->
            <form action="{{ route('param_tunjangan_lain_store') }}" method="post">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Nama Tunjangan</label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" name="name" id="name" required>
                            </div>
                            <label for="type" class="form-label">Type Tunjangan</label>
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" name="type" id="type" required>
                            </div>
                            <label for="jumlah" class="form-label">Jumlah Tunjangan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-end d-flex">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
