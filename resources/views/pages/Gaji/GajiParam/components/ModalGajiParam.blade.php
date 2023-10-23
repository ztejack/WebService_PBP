<!-- Modal -->
<div class="modal fade" id="modalupdate{{ $gajiparam->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Update Parameter Gaji</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('gaji_param.update', 1) }}" method="put">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="struktural" class="form-label">Gaji Struktural</label>
                            <input type="text" name="gaji_struktural" id="struktural" onchange="formatCurrency(this)"
                                class="input-group form-control currencyinp" value="{{ $gajiparam->gaji_struktural }}"
                                required>
                            @error('gaji_struktural')
                                <div class="invalid-feedback d-block">
                                    {[$message ]}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="fungsional" class="form-label">Gaji Fungsional</label>
                            <input type="text" name="gaji_fungsional" id="fungsional" onchange="formatCurrency(this)"
                                class="input-group form-control currencyinp" value="{{ $gajiparam->gaji_fungsional }}"
                                required>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="PositionSelect" class="form-label">Position</label>
                            <select id="PositionSelect" name="position_id" class="form-select">
                                <option>Select Position</option>
                                @foreach ($positions as $position)
                                    @if ($position->position == $gajiparam->position->position)
                                        <option value="{{ $position->id }}" selected>{{ $position->position }}</option>
                                    @else
                                        <option value="{{ $position->id }}">{{ $position->position }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col mb-3">
                            <label for="GolonganSelect" class="form-label">Golongan</label>
                            <select id="GolonganSelect" name="golongan_id" class="form-select">
                                <option>Select Golongan</option>
                                @foreach ($golongans as $golongan)
                                    @if ($golongan->golongan == $gajiparam->golongan->golongan)
                                        <option value="{{ $golongan->id }}" selected>{{ $golongan->golongan }}</option>
                                    @else
                                        <option value="{{ $golongan->id }}">{{ $golongan->golongan }}</option>
                                    @endif
                                @endforeach
                            </select>
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
