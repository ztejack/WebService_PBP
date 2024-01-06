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
                    <div class="divider">
                        <div class="divider-text">
                            Penghasilan
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-gaji-pokok"> Gaji Pokok</label>
                        <input type="number" class="form-control @error('gapok') is-invalid @enderror"
                            id="input-gaji-pokok" min="0" placeholder="Input Gaji Pokok..."
                            value="{{ $gapok == null ? 0 : $gapok }}" name="gapok" required>
                        @error('gapok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-tunjangan-jabatan"> Tunjangan Jabatan</label>
                        <input type="number" class="form-control @error('tunjab') is-invalid @enderror"
                            id="input-tunjangan-jabatan" min="0" placeholder="Input Tunjangan Jabatan..."
                            value="{{ $tunjab == null ? 0 : $tunjab }}" name="tunjab" required>
                        @error('tunjab')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_perumahan">Tunjangan Perumahan</label>
                        <input type="number" class="form-control " id="tnj_perumahan" name="tnj_perumahan"
                            min="0" value="{{ $tunjangan_perumahan == null ? 0 : $tunjangan_perumahan }}">
                        @error('tnj_perumahan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_ubp">Uang Bantuan Perumahan <span
                                class="text-primary">(UBP)</span></label>
                        <input type="number" class="form-control " id="tnj_ubp" name="tnj_ubp" min="0"
                            value="{{ $tunjangan_ubp == null ? 0 : $tunjangan_ubp }}">
                        @error('tnj_ubp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_simmode">Tunjangan SIMMODE 1</label>
                        <input type="number" class="form-control " id="tnj_simmode" name="tnj_simmode" min="0"
                            value="{{ $tunjangan_simmode == null ? 0 : $tunjangan_simmode }}">
                        @error('tnj_simmode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_dana_pensiun">Tunjangan Dana Pensiun <span
                                class="text-info">(DPBA) </span></label>
                        <input type="number" class="form-control " id="tnj_dana_pensiun" name="tnj_dana_pensiun"
                            min="0" value="{{ $tunjangan_dana_pensiun == null ? 0 : $tunjangan_dana_pensiun }}">
                        @error('tnj_dana_pensiun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_bpjs_tk">Tunjangan BPJS Ketenaga Kerjaan <span
                                class="text-primary">(BPJS TK)</span></label>
                        <input type="number" class="form-control " id="tnj_bpjs_tk" name="tnj_bpjs_tk" min="0"
                            value="{{ $tunjangan_bpjs_tk == null ? 0 : $tunjangan_bpjs_tk }}">
                        @error('tnj_bpjs_tk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_bpjs_jkm">Tunjangan Jaminan Kematian <span
                                class="text-primary">(BPJS JKM)</span></label>
                        <input type="number" class="form-control " id="tnj_bpjs_jkm" name="tnj_bpjs_jkm" min="0"
                            value="{{ $tunjangan_bpjs_jkm == null ? 0 : $tunjangan_bpjs_jkm }}">
                        @error('tnj_bpjs_jkm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_bpjs_jht">Tunjangan Jaminan Hari Tua <span
                                class="text-primary">(BPJS JHT)</span></label>
                        <input type="number" class="form-control " id="tnj_bpjs_jht" name="tnj_bpjs_jht"
                            min="0" value="{{ $tunjangan_bpjs_jht == null ? 0 : $tunjangan_bpjs_jht }}">
                        @error('tnj_bpjs_jht')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_bpjs_jp">Tunjangan Jaminan Pensiun <span
                                class="text-primary">(BPJS JP)</span></label>
                        <input type="number" class="form-control " id="tnj_bpjs_jp" name="tnj_bpjs_jp"
                            min="0" value="{{ $tunjangan_bpjs_jp == null ? 0 : $tunjangan_bpjs_jp }}">
                        @error('tnj_bpjs_jp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_bpjs_kes">Tunjangan BPJS Kesehatan <span
                                class="text-primary">(BPJS KES)</span></label>
                        <input type="number" class="form-control " id="tnj_bpjs_kes" name="tnj_bpjs_kes"
                            min="0" value="{{ $tunjangan_bpjs_kes == null ? 0 : $tunjangan_bpjs_kes }}">
                        @error('tnj_bpjs_kes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_pajak">Tunjangan Pajak</label>
                        <input type="number" class="form-control " id="tnj_pajak" name="tnj_pajak" min="0"
                            value="{{ $tunjangan_pajak == null ? 0 : $tunjangan_pajak }}">
                        @error('tnj_pajak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tnj_lain">Tunjangan Lain</label>
                        <input type="number" class="form-control " id="tnj_lain" name="tnj_lain" min="0"
                            value="{{ $tunjangan_lain == null ? 0 : $tunjangan_lain }}">
                        @error('tnj_lain')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="" class="btn btn-primary d-sm-none d-md-block" onclick="setTotal()"><i
                            class="bx bx-save"></i>
                        Save</button>
                </div>
                <div class="col-md-6">
                    <div class="divider">
                        <div class="divider-text">
                            Potongan
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-spba">
                            Iuran Serikat Pegawai Bukit Asam <span class="text-info">(SPBA)</span>
                        </label>
                        <input type="number" class="form-control @error('pot_spba') is-invalid @enderror"
                            id="input-spba" min="0" placeholder="Input spba..."
                            value="{{ $pot_spba == null ? 0 : $pot_spba }}" name="pot_spba" required>
                        @error('pot_spba')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-potongan-lazis">
                            Potongan LAZIS
                        </label>
                        <input type="number" class="form-control @error('pot_lazis') is-invalid @enderror"
                            id="input-potongan-lazis" placeholder="Input Potongan lazis..." min="0"
                            value="{{ $pot_lazis == null ? 0 : $pot_lazis }}" name="pot_lazis">
                        @error('pot_lazis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-iuran-dana-pensiun">
                            Iuran Dana Pensiun <span class="text-info">(DPBA)</span>
                        </label>
                        <input type="number" class="form-control @error('pot_i_dana_pensiun') is-invalid @enderror"
                            id="input-iuran-dana-pensiun" placeholder="Input Potongan Iuran Dana Pensiun..."
                            min="0" value="{{ $pot_i_dana_pensiun == null ? 0 : $pot_i_dana_pensiun }}"
                            name="pot_i_dana_pensiun">
                        @error('pot_i_dana_pensiun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-pot-simmode">
                            Potongan SIMMODE 1
                        </label>
                        <input type="number" class="form-control @error('pot_simmode') is-invalid @enderror"
                            id="input-pot-simmode" placeholder="Input Potongan SIMMODE 1..." min="0"
                            value="{{ $pot_simmode == null ? 0 : $pot_simmode }}" name="pot_simmode">
                        @error('pot_simmode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-potongan-koperasi">
                            Potongan Koperasi
                        </label>
                        <input type="number" class="form-control @error('pot_koperasi') is-invalid @enderror"
                            id="input-potongan-koperasi" placeholder="Input Potongan Koperasi..." min="0"
                            value="{{ $pot_koperasi == null ? 0 : $pot_koperasi }}" name="pot_koperasi">
                        @error('pot_koperasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-bpjs-tk">
                            Iuran BPJS Ketenaga Kerjaan <span class="text-primary">(BPJS TK)</span>
                        </label>
                        <input type="number" class="form-control @error('pot_bpjs_tk') is-invalid @enderror"
                            id="input-bpjs-tk" placeholder="Input Iuran Bpjs Ketenaga Kerjaan..." min="0"
                            value="{{ $pot_bpjs_tk == null ? 0 : $pot_bpjs_tk }}" name="pot_bpjs_tk">
                        @error('pot_bpjs_tk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-bpjs-jkm">
                            Iuran Jaminan Kematian <span class="text-primary">(BPJS JKM)</span>
                        </label>
                        <input type="number" class="form-control @error('pot_bpjs_jkm') is-invalid @enderror"
                            id="input-bpjs-jkm" placeholder="Input Potongan Jaminan Hari Tua..." min="0"
                            value="{{ $pot_bpjs_jkm == null ? 0 : $pot_bpjs_jkm }}" name="pot_bpjs_jkm">
                        @error('pot_bpjs_jkm')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-bpjs-jht">
                            Iuran BPJS Jaminan Hari Tua <span class="text-primary">(BPJS JHT)</span>
                        </label>
                        <input type="number" class="form-control @error('pot_bpjs_jht') is-invalid @enderror"
                            id="input-bpjs-jht" placeholder="Input Potongan Jaminan Hari Tua..." min="0"
                            value="{{ $pot_bpjs_jht == null ? 0 : $pot_bpjs_jht }}" name="pot_bpjs_jht">
                        @error('pot_bpjs_jht')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-bpjs-jp">
                            Iuran BPJS Jaminan Pensiun <span class="text-primary">(BPJS JP)</span>
                        </label>
                        <input type="number" class="form-control @error('pot_bpjs_jp') is-invalid @enderror"
                            id="input-bpjs-jp" placeholder="Input Potongan Jaminan pensiun..." min="0"
                            value="{{ $pot_bpjs_jp == null ? 0 : $pot_bpjs_jp }}" name="pot_bpjs_jp">
                        @error('pot_bpjs_jp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label" for="input-bpjs-kes">
                            Iuran BPJS Kesehatan <span class="text-primary">(BPJS KES)</span>
                        </label>
                        <input type="number" class="form-control @error('pot_bpjs_kes') is-invalid @enderror"
                            id="input-bpjs-kes" placeholder="Input Iuran BPJS Kesehatan..." min="0"
                            value="{{ $pot_bpjs_kes == null ? 0 : $pot_bpjs_kes }}" name="pot_bpjs_kes">
                        @error('pot_bpjs_kes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-pot-pajak">
                            Potongan Pajak
                        </label>
                        <input type="number" class="form-control @error('pot_pajak') is-invalid @enderror"
                            id="input-pot-pajak" placeholder="Input Potongan Lain..." min="0"
                            value="{{ $pot_pajak == null ? 0 : $pot_pajak }}" name="pot_pajak">
                        @error('pot_pajak')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="input-pot-lain">
                            Potongan Lain
                        </label>
                        <input type="number" class="form-control @error('pot_lain') is-invalid @enderror"
                            id="input-pot-lain" placeholder="Input Potongan Lain..." min="0"
                            value="{{ $pot_lain == null ? 0 : $pot_lain }}" name="pot_lain">
                        @error('pot_lain')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="" class="btn btn-primary d-md-none d-sm-block" onclick="setTotal()"><i
                            class="bx bx-save"></i> Save</button>
                    <input type="hidden" name="direksi" value="{{ true }}">
                </div>

            </div>
        </form>
    </div>
</div>
