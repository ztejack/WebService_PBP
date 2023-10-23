<!-- Modal -->
<div class="modal fade" id="modalupdatetnj{{ $gajiparam->id }}" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Update Parameter Tunjangan Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formAccountSettings" method="POST" action="{{ Route('param.tunjangan.update', $gajiparam->id) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">
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
                                        <option value="{{ $golongan->id }}" selected>{{ $golongan->golongan }}
                                        </option>
                                    @else
                                        <option value="{{ $golongan->id }}">{{ $golongan->golongan }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="tnj_makan" class="form-label">Tunjangan Makan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="tnj_makan" id="tnj_makan"
                                    placeholder="" required
                                    value="{{ old('tnj_makan', $gajiparam->gaji_struktural) }}">
                            </div>
                            @error('tnj_makan')
                                <div class="invalid-feedback d-block">
                                    {[$message ]}
                                </div>
                            @enderror
                        </div>

                        <div class="col mb-3">
                            <label for="tnj_transport" class="form-label">Gaji Transport</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="tnj_transport" id="tnj_transport"
                                    placeholder="" required
                                    value="{{ old('tnj_transport', $gajiparam->tnj_transport) }}">
                            </div>
                            @error('tnj_transport')
                                <div class="invalid-feedback d-block">
                                    {[$message ]}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="tnj_perumahan" class="form-label">Gaji Perumahan</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="tnj_perumahan" id="tnj_perumahan"
                                    placeholder="" required
                                    value="{{ old('tnj_perumahan', $gajiparam->tnj_perumahan) }}">
                            </div>
                            @error('tnj_perumahan')
                                <div class="invalid-feedback d-block">
                                    {[$message ]}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-3">
                            <label for="tnj_shift" class="form-label">Gaji Shift</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" name="tnj_shift" id="tnj_shift"
                                    placeholder="" required value="{{ old('tnj_shift', $gajiparam->tnj_shift) }}">
                            </div>
                            @error('tnj_shift')
                                <div class="invalid-feedback d-block">
                                    {[$message ]}
                                </div>
                            @enderror
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
