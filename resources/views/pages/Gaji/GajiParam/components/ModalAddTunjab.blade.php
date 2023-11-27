<div class="modal fade" id="modaladdTunjab" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add Parameter Tunjangan Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('gaji_param.store') }}" method="post" onsubmit="convertCurrencyBeforeSubmit()">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="struktural" class="form-label">Gaji Struktural</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="gajistruktural" id="struktural"
                                    placeholder="" required>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <label for="fungsional" class="form-label">Gaji Fungsional</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="gajifungsional" id="fungsional"
                                    placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="PositionSelect" class="form-label">Position</label>
                            <select id="PositionSelect" name="position_id" class="form-select">
                                <option>Select Position</option>
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->position }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="GolonganSelect" class="form-label">Golongan</label>
                            <select id="GolonganSelect" name="golongan_id" class="form-select" re>
                                <option>Select Golongan</option>
                                @foreach ($golongans as $golongan)
                                    <option value="{{ $golongan->id }}">{{ $golongan->golongan }}</option>
                                @endforeach
                            </select>
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
