<div class="modal fade" id="modalupdatePTKP{{ $gajiparam->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Update Parameter PTKP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('param.ptkp.update', $gajiparam->id) }}" onsubmit="convertCurrencyBeforeSubmit()"
                enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="PTKPSelect" class="form-label">Status Keluarga</label>
                            <select id="PTKPSelect" name="familystatus_id" class="form-select">
                                <option>Select Status Keluarga</option>
                                @foreach ($family_status as $familystatus)
                                    @if ($familystatus->familystatus == $gajiparam->familystatus->familystatus)
                                        <option value="{{ $familystatus->id }}" selected>
                                            {{ $familystatus->familystatus }}
                                        </option>
                                    @else
                                        <option value="{{ $familystatus->id }}">{{ $familystatus->familystatus }}
                                        </option>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="tnj_ptkp" class="form-label">Tunjangan PTKP</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="tnj_ptkp" id="tnj_ptkp" min="0"
                                    value="{{ $gajiparam->tnj_familystatus }}" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-end d-flex">
                        <button class="btn btn-primary" type="submit"><i class="bx bx-save"></i>Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
