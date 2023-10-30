@if (session()->has('succ'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('succ') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session()->has('err'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('err') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
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
                    placeholder="Input Gaji Pokok..." value="{{ $gapok = null ? 0 : $gapok }}" name="gapok" required>
                @error('gapok')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="input-tunjangan-ahli">
                    Tunjangan Ahli
                </label>
                <input type="number" class="form-control @error('tnj_ahli') is-invalid @enderror"
                    id="input-tunjangan-ahli" placeholder="Input Tunjangan Ahli..."
                    value="{{ $tnj_ahli = null ? 0 : $tnj_ahli }}" name="tnj_ahli">
                @error('tnj_ahli')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="input-tunjangan-jabatan">
                    Tunjangan Jabatan
                </label>
                <input type="number" class="form-control readonly @error('tnj_jabatan') is-invalid @enderror"
                    name="tnj_jabatan" id="input-tunjangan-jabatan" placeholder="Tunjangan Jabatan..." readonly
                    value="{{ $tnj_jabatan = null ? 0 : $tnj_jabatan }}">
                @error('tnj_jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="col mt-2">
                    <div class="form-check form-check-inline">
                        <input name="tunjab-type" class="form-check-input @error('tunjab-type') is-invalid @enderror"
                            onclick="updateInput(this)" type="radio" value="struktural"
                            data-custom-attr="{{ $gaji_struktural }}" id="tunjab-type-struktural" required
                            {{ $type_tunjab == 'struktural' ? 'checked' : '' }}>
                        <label class="form-check-label" for="tunjab-type-struktural">Strukturral</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="tunjab-type" class="form-check-input @error('tunjab-type') is-invalid @enderror"
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
            <button type="" class="btn btn-primary" onclick="setTotal()"><i class="bx bx-save"></i> Save</button>
            {{-- <button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#addNewAddress"><i
                    class="bx bx-plus"></i> Tambah Tunjangan Lain</button> --}}

        </form>
    </div>
</div>
<div class="modal fade" id="addNewAddress" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="address-title">Tambahkan Tunjangan Baru</h3>
                </div>
                <form id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                    action="{{ route('tunjangan.store', $gaji->id) }}">
                    @csrf

                    <div class="col-12 ">
                        <label class="form-label" for="namatunjangan">Nama Tunjangan</label>
                        <input type="text" id="namatunjangan" name="namatunjangan" class="form-control"
                            placeholder="..Tunjangan Ahli">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="jumlahtunjangan">Jumlah Tunjangan</label>
                        <input type="number" id="jumlahtunjangan" name="jumlahtunjangan" class="form-control"
                            placeholder="Enter Amount">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
</div>
