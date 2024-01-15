<div class="row">
    <div class="col-md-6">
        <div class="card mb-4 ">
            <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
                <h5 class=""><span class="badge badge-center bg-primary">I</span> Penghasilan</h5>
                <small class="text-muted float-end">I Penghasilan</small>
            </div>
            <div class="card-body">
                <table class="w-100">
                    <tbody class="text-end">
                        @if ($gapok)
                            <tr>
                                <td class="pe-3">Gaji Pokok:</td>
                                <td><span class="numbers">{{ $gapok }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjab)
                            <tr>
                                <td class="pe-3">Tunjangan Jabatan:</td>
                                <td><span class="numbers">{{ $tunjab }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_perumahan)
                            <tr>
                                <td class="pe-3">Tunjangan Perumahan:</td>
                                <td><span class="numbers">{{ $tunjangan_perumahan }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_dana_pensiun)
                            <tr>
                                <td class="pe-3">Tunjangan Dana Pensiun:</td>
                                <td><span class="numbers">{{ $tunjangan_dana_pensiun }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_ubp)
                            <tr>
                                <td class="pe-3">Uang Bantuan Perumahan:</td>
                                <td><span class="numbers">{{ $tunjangan_ubp }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_simmode)
                            <tr>
                                <td class="pe-3">Tunjangan SIMMODE 1:</td>
                                <td><span class="numbers">{{ $tunjangan_simmode }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_bpjs_tk)
                            <tr>
                                <td class="pe-3">Tunjangan BPJS Ketenaga Kerjaan:</td>
                                <td><span class="numbers">{{ $tunjangan_bpjs_tk }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_bpjs_jkm)
                            <tr>
                                <td class="pe-3">Tunjangan BPJS Jaminan Kematian (JKM):</td>
                                <td><span class="numbers">{{ $tunjangan_bpjs_jkm }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_bpjs_jht)
                            <tr>
                                <td class="pe-3">Tunjangan BPJS Jaminan Hari Tua (JHT):</td>
                                <td><span class="numbers">{{ $tunjangan_bpjs_jht }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_bpjs_jp)
                            <tr>
                                <td class="pe-3">Tunjangan BPJS Jaminan Pensiun (JP):</td>
                                <td><span class="numbers">{{ $tunjangan_bpjs_jp }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_bpjs_kes)
                            <tr>
                                <td class="pe-3">Tunjangan BPJS Ketenaga Kesehatan:</td>
                                <td><span class="numbers">{{ $tunjangan_bpjs_kes }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_pajak)
                            <tr>
                                <td class="pe-3">Tunjangan Pajak:</td>
                                <td><span class="numbers">{{ $tunjangan_pajak }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_lain)
                            <tr>
                                <td class="pe-3">Uang Tunjangan Lain:</td>
                                <td><span class="numbers">{{ $tunjangan_lain }}</span></td>
                            </tr>
                        @endif
                        @if ($rapel)
                            <tr>
                                <td class="pe-3">Uang Rapel:</td>
                                <td><span class="numbers">{{ $rapel }}</span></td>
                            </tr>
                        @endif
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                        </tr>

                        <tr>
                            <td class="fst-normal fw-bold pe-3">Total Penghasilan:</td>
                            <td class="fst-normal fw-bold numbers">Rp <span class="numbers">{{ $penghasilan }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 pb-4" style="height: inherit">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
                <h5 class=""><span class="badge badge-center bg-primary">II</span> Potongan</h5>
                <small class="text-muted float-end">II Potongan</small>
            </div>
            <div class="card-body">
                <table class="w-100">
                    <tbody class="text-end">
                        @if ($pot_spba)
                            <tr>
                                <td class="pe-3">Iuran Serikat Pegawai Bukit Asam:</td>
                                <td><span class="numbers">{{ $pot_spba }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_lazis)
                            <tr>
                                <td class="pe-3">Potongan Lazis:</td>
                                <td><span class="numbers">{{ $pot_lazis }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_i_dana_pensiun)
                            <tr>
                                <td class="pe-3">Iuran Dana Pensiun:</td>
                                <td><span class="numbers">{{ $pot_i_dana_pensiun }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_koperasi)
                            <tr>
                                <td class="pe-3">Potongan Koperasi:</td>
                                <td><span class="numbers">{{ $pot_koperasi }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_simmode)
                            <tr>
                                <td class="pe-3">Potongan SIMMODE 1:</td>
                                <td><span class="numbers">{{ $pot_simmode }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_bpjs_tk)
                            <tr>
                                <td class="pe-3">Iuran BPJS Ketenaga Kerjaan:</td>
                                <td><span class="numbers">{{ $pot_bpjs_tk }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_bpjs_jkm)
                            <tr>
                                <td class="pe-3">Iuran BPJS Jaminan Hari Tua (JKM):</td>
                                <td><span class="numbers">{{ $pot_bpjs_jkm }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_bpjs_jht)
                            <tr>
                                <td class="pe-3">Iuran BPJS Jaminan Hari Tua (JHT):</td>
                                <td><span class="numbers">{{ $pot_bpjs_jht }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_bpjs_jp)
                            <tr>
                                <td class="pe-3">Iuran BPJS Jaminan Pensium (JP):</td>
                                <td><span class="numbers">{{ $pot_bpjs_jp }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_bpjs_kes)
                            <tr>
                                <td class="pe-3">Iuran BPJS Kesehatan:</td>
                                <td><span class="numbers">{{ $pot_bpjs_kes }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_pajak)
                            <tr>
                                <td class="pe-3">Potongan Pajak:</td>
                                <td><span class="numbers">{{ $pot_pajak }}</span></td>
                            </tr>
                        @endif
                        @if ($pot_lain)
                            <tr>
                                <td class="pe-3">Potongan Lain:</td>
                                <td><span class="numbers">{{ $pot_lain }}</span></td>
                            </tr>
                        @endif
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                        </tr>

                        <tr>
                            <td class="fst-normal fw-bold pe-3">Total Potongan :</td>
                            <td class="fst-normal fw-bold">Rp <span class="numbers">{{ $potongan }}</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
                <h5 class="">Total Gaji</h5>
                <small class="text-muted float-end">Total Gaji Diterima</small>
            </div>
            <div class="card-body">
                <input type="text" class="form-control readonly numberin" id="input-gaji-pokok"
                    placeholder="Input Gaji Pokok..." readonly disabled value="{{ $total }}">
            </div>
        </div>
    </div>

</div>
