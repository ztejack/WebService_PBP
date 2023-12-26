<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <h5 class=""><span class="badge badge-center bg-primary">I</span> Penghasilan</h5>
        <small class="text-muted float-end">I Penghasilan</small>
    </div>
    <div class="card-body">
        <form action="{{ route('update_gaji_employe', $gaji->id) }}" method="post">
            @csrf
            @method('POST')
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-gaji-pokok">
                            Gaji Pokok
                        </label>
                        <input type="number" class="form-control @error('gapok') is-invalid @enderror"
                            id="input-gaji-pokok" min="0" placeholder="Input Gaji Pokok..."
                            value="{{ $gapok = null ? 0 : $gapok }}" name="gapok" required>
                        @error('gapok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="divider">
                        <div class="divider-text">
                            Tunjangan
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_perumahan">Tunjangan Perumahan</label>
                        <input type="number" class="form-control " id="tnj_perumahan" name="tnj_perumahan"
                            min="0" value="{{ $tunjangan_perumahan }}">
                        @error('tnj_perumahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_ubp">Uang Bantuan Perumahan</label>
                        <input type="number" class="form-control " id="tnj_ubp" name="tnj_ubp" min="0"
                            value="{{ $tunjangan_ubp }}">
                        @error('tnj_ubp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_taspen">Tunjangan Tabungan Pensiun</label>
                        <input type="number" class="form-control " id="tnj_taspen" name="tnj_taspen" min="0"
                            value="{{ $tunjangan_taspen }}">
                        @error('tnj_taspen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_bpjs_tk">Tunjangan BPJS Ketenaga Kerjaan</label>
                        <input type="number" class="form-control " id="tnj_bpjs_tk" name="tnj_bpjs_tk" min="0"
                            value="{{ $tunjangan_bpjs_tk }}">
                        @error('tnj_bpjs_tk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_dana_pensiun">Tunjangan Dana Pensiun</label>
                        <input type="number" class="form-control " id="tnj_dana_pensiun" name="tnj_dana_pensiun"
                            min="0" value="{{ $tunjangan_dana_pensiun }}">
                        @error('tnj_dana_pensiun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_tht">Tunjangan Hari Tua</label>
                        <input type="number" class="form-control " id="tnj_tht" name="tnj_tht" min="0"
                            value="{{ $tunjangan_tht }}">
                        @error('tnj_tht')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_jht">Tunjangan Jaminan Hari Tua</label>
                        <input type="number" class="form-control " id="tnj_jht" name="tnj_jht" min="0"
                            value="{{ $tunjangan_jht }}">
                        @error('tnj_jht')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_pajak">Tunjangan Pajak</label>
                        <input type="number" class="form-control " id="tnj_pajak" name="tnj_pajak" min="0"
                            value="{{ $tunjangan_pajak }}">
                        @error('tnj_pajak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_bpjs_kes">Tunjangan BPJS Kesehatan</label>
                        <input type="number" class="form-control " id="tnj_bpjs_kes" name="tnj_bpjs_kes"
                            min="0" value="{{ $tunjangan_bpjs_kes }}">
                        @error('tnj_bpjs_kes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_simponi">Tunjangan Simponi</label>
                        <input type="number" class="form-control " id="tnj_simponi" name="tnj_simponi"
                            min="0" value="{{ $tunjangan_simponi }}">
                        @error('tnj_simponi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="tnj_lain">Tunjangan Lain</label>
                        <input type="number" class="form-control " id="tnj_lain" name="tnj_lain" min="0"
                            value="{{ $tunjangan_lain }}">
                        @error('tnj_lain')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <button type="" class="btn btn-primary" onclick="setTotal()"><i class="bx bx-save"></i>
                        Save</button> --}}
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label" for="input-spba">
                            Iuran Serikat Pegawai Bukit Asam
                        </label>
                        <input type="number" class="form-control @error('pot_spba') is-invalid @enderror"
                            id="input-spba" min="0" placeholder="Input spba..."
                            value="{{ $pot_spba = null ? 0 : $pot_spba }}" name="pot_spba" required>
                        @error('pot_spba')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-potongan-koperasi">
                            Potongan Koperasi
                        </label>
                        <input type="number" class="form-control @error('pot_koperasi') is-invalid @enderror"
                            id="input-potongan-koperasi" placeholder="Input Potongan Koperasi..." min="0"
                            value="{{ $pot_koperasi = null ? 0 : $pot_koperasi }}" name="pot_koperasi">
                        @error('pot_koperasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-potongan-lazis">
                            Potongan LAZIS
                        </label>
                        <input type="number" class="form-control @error('pot_lazis') is-invalid @enderror"
                            id="input-potongan-lazis" placeholder="Input Potongan lazis..." min="0"
                            value="{{ $pot_lazis = null ? 0 : $pot_lazis }}" name="pot_lazis">
                        @error('pot_lazis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-iuran-dana-pensiun">
                            Iuran Dana Pensiun
                        </label>
                        <input type="number" class="form-control @error('pot_i_dana_pensiun') is-invalid @enderror"
                            id="input-iuran-dana-pensiun" placeholder="Input Potongan lazis..." min="0"
                            value="{{ $pot_i_dana_pensiun = null ? 0 : $pot_i_dana_pensiun }}" name="pot_i_dana_pensiun">
                        @error('pot_i_dana_pensiun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-premi-jht">
                            Premi Jaminan Hari Tua
                        </label>
                        <input type="number" class="form-control @error('pot_jht') is-invalid @enderror"
                            id="input-premi-jht" placeholder="Input Potongan lazis..." min="0"
                            value="{{ $pot_jht = null ? 0 : $pot_jht }}" name="pot_jht">
                        @error('pot_jht')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-tht">
                            Iuran Tunjangan Hari Tua
                        </label>
                        <input type="number" class="form-control @error('pot_tht') is-invalid @enderror"
                            id="input-tht" placeholder="Input Potongan lazis..." min="0"
                            value="{{ $pot_tht = null ? 0 : $pot_tht }}" name="pot_tht">
                        @error('pot_tht')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-bpjs-tk">
                            Iuran BPJS Ketenaga Kerjaan
                        </label>
                        <input type="number" class="form-control @error('pot_bpjs_tk') is-invalid @enderror"
                            id="input-bpjs-tk" placeholder="Input Potongan lazis..." min="0"
                            value="{{ $pot_bpjs_tk = null ? 0 : $pot_bpjs_tk }}" name="pot_bpjs_tk">
                        @error('pot_bpjs_tk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-bpjs-kes">
                            Iuran BPJS Kesehatan
                        </label>
                        <input type="number" class="form-control @error('pot_bpjs_kes') is-invalid @enderror"
                            id="input-bpjs-kes" placeholder="Input Iuran BPJS Kesehatan..." min="0"
                            value="{{ $pot_bpjs_kes = null ? 0 : $pot_bpjs_kes }}" name="pot_bpjs_kes">
                        @error('pot_bpjs_kes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-pot-taspen">
                            Potongan Tabungan Pensiun
                        </label>
                        <input type="number" class="form-control @error('pot_pajak') is-invalid @enderror"
                            id="input-pot-taspen" placeholder="Input Potongan Taspen..." min="0"
                            value="{{ $pot_taspen = null ? 0 : $pot_taspen }}" name="pot_taspen">
                        @error('pot_taspen')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-pot-pajak">
                            Potongan Pajak
                        </label>
                        <input type="number" class="form-control @error('pot_pajak') is-invalid @enderror"
                            id="input-pot-pajak" placeholder="Input Potongan lazis..." min="0"
                            value="{{ $pot_pajak = null ? 0 : $pot_pajak }}" name="pot_pajak">
                        @error('pot_pajak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-pot-simponi">
                            Potongan SIMPONI
                        </label>
                        <input type="number" class="form-control @error('pot_simponi') is-invalid @enderror"
                            id="input-pot-simponi" placeholder="Input Potongan lazis..." min="0"
                            value="{{ $pot_simponi = null ? 0 : $pot_simponi }}" name="pot_simponi">
                        @error('pot_simponi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="" class="btn btn-primary" onclick="setTotal()"><i class="bx bx-save"></i>
                        Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
