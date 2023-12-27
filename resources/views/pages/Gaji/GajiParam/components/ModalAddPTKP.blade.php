<div class="modal fade" id="modaladdPTKP" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add Parameter PTKP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('param.ptkp.store') }}" method="post" onsubmit="convertCurrencyBeforeSubmit()">
                @csrf
                @method('post')
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="PTKPSelect" class="form-label">Status Keluarga</label>
                            <select id="PTKPSelect" name="familystatus_id" class="form-select">
                                <option>Select Status Keluarga</option>
                                @foreach ($family_status as $familystatus)
                                    <option value="{{ $familystatus->id }}">{{ $familystatus->familystatus }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="tnj_ptkp" class="form-label">Tunjangan PTKP</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="tnj_ptkp" id="tnj_ptkp" min="0"
                                    value="0" placeholder="" required>
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
