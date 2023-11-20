{{-- Card Form --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <h5 class="">Data Gaji</h5>
        <small class="text-muted float-end">Data Gaji</small>
    </div>
    <div class="card-body">
        <form action="{{ route('update_gaji_employe', $gaji->id) }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label class="form-label" for="input-gaji-pokok">
                    Gaji Pokok
                </label>
                <input type="number" class="form-control @error('gapok') is-invalid @enderror" id="input-gaji-pokok"
                    min="0" placeholder="Input Gaji Pokok..." value="{{ $gapok = null ? 0 : $gapok }}"
                    name="gapok" required>
                @error('gapok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="input-tunjangan-ahli">
                    Tunjangan Ahli
                </label>
                <input type="number" class="form-control @error('tnj_ahli') is-invalid @enderror"
                    id="input-tunjangan-ahli" placeholder="Input Tunjangan Ahli..." min="0"
                    value="{{ $tnj_ahli = null ? 0 : $tnj_ahli }}" name="tnj_ahli">
                @error('tnj_ahli')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="input-tunjangan-jabatan">
                    Tunjangan Jabatan
                </label>

                @if ($user->getContrackAttribute() == 'Tetap')
                    <input type="number" class="form-control readonly @error('tnj_jabatan') is-invalid @enderror"
                        name="tnj_jabatan" id="input-tunjangan-jabatan" placeholder="Tunjangan Jabatan..." readonly
                        min="0" value="{{ $tnj_jabatan = null ? 0 : $tnj_jabatan }}">
                    @error('tnj_jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="col mt-2">
                        <div class="form-check form-check-inline">
                            <input name="tunjab-type"
                                class="form-check-input @error('tunjab-type') is-invalid @enderror"
                                onclick="updateInput(this)" type="radio" value="struktural"
                                data-custom-attr="{{ $gaji_struktural }}" id="tunjab-type-struktural" required
                                {{ $type_tunjab == 'struktural' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tunjab-type-struktural">Strukturral</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="tunjab-type"
                                class="form-check-input @error('tunjab-type') is-invalid @enderror"
                                onclick="updateInput(this)" type="radio" value="fungsional"
                                data-custom-attr="{{ $gaji_fungsional }}" id="tunjab-type-Fungsional" required
                                {{ $type_tunjab == 'fungsional' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tunjab-type-Fungsional">Fungsional
                            </label>
                        </div>
                        @error('tunjab-type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @else
                    <div class="mb-3">
                        <input type="number" class="form-control readonly @error('tnj_jabatan') is-invalid @enderror"
                            name="tnj_jabatan" id="input-tunjangan-jabatan" placeholder="Tunjangan Jabatan..."
                            min="0" value="{{ $tnj_jabatan = null ? 0 : $tnj_jabatan }}">
                        @error('tnj_jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                @endif


                <label class="form-label" for="total-gaji1">
                    Total
                </label>
                <input type="text" class="form-control readonly numberin" name="total-gaji1" id="total-gaji1"
                    placeholder="Total.." readonly disabled value="{{ $total1 }}">
                <script>
                    function updateInput(radio) {
                        // Get the selected radio button's value
                        var selectedValue = radio.getAttribute('data-custom-attr');
                        console.log(selectedValue);
                        // Update the input field with the selected value
                        document.getElementById("input-tunjangan-jabatan").value = selectedValue;
                    }
                </script>
            </div>
            <hr class="divider">
            <div class="mb-4">
                <label class="form-label" for="tnj_lapangan">Tunjangan Lapangan</label>
                <input type="number" class="form-control " id="tnj_lapangan" name="tnj_lapangan" min="0"
                    value="{{ $tunjangan_lapangan }}">
                @error('tnj_lapangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="" class="btn btn-primary" onclick="setTotal()"><i class="bx bx-save"></i> Save</button>
        </form>
    </div>
</div>
