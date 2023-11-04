<div class="row">
    <div class="col-md-6">
        <div class="card mb-4 ">
            <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
                <h5 class="">Tunjangan</h5>
                <small class="text-muted float-end">Tunjangan</small>
            </div>
            <div class="card-body">
                <table class="w-100">
                    <tbody class="text-end">
                        <tr>
                            <td class="pe-3">Uang Transport:</td>
                            <td>Rp <span class="numbers">{{ $tunjangan_transport }}</span></td>
                        </tr>
                        <tr>
                            <td class="pe-3">Uang Bantuan Perumahan:</td>
                            <td>Rp <span class="numbers">{{ $tunjangan_perumahan }}</span></td>
                        </tr>
                        <tr>
                            <td class="pe-3">Uang Makan:</td>
                            <td>Rp <span class="numbers">{{ $tunjangan_makan }}</span></td>
                        </tr>
                        <tr>
                            <td class="pe-3">Uang Shift:</td>
                            <td>Rp <span class="numbers">{{ $tunjangan_shift }}</span></td>
                        </tr>
                        <tr>
                            <td class="pe-3">BPJS Tenaga Kerja:</td>
                            <td>Rp <span class="numbers">{{ $tunjangan_BPJS_tk }}</span></td>
                        </tr>
                        <tr>
                            <td class="pe-3">BPJS Kesehatan:</td>
                            <td>Rp <span class="numbers">{{ $tunjangan_BPJS_kes }}</span></td>
                        </tr>
                        <tr>
                            <td>
                                <hr>
                            </td>
                            <td>
                                <hr>
                            </td>
                        </tr>

                        <tr>
                            <td class="fst-normal fw-bold pe-3">Total Tunjangan:</td>
                            <td class="fst-normal fw-bold numbers">Rp <span class="numbers">{{ $total2 }}</span>
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
                <h5 class="">Potongan</h5>
                <small class="text-muted float-end">Potongan</small>
            </div>
            <div class="card-body">
                <table class="w-100">
                    <tbody class="text-end">
                        <tr>
                            <td class="pe-3">Iuran BPJS Tenaga Kerja:</td>
                            <td>Rp <span class="numbers">{{ $potongan_BPJS_tk }}</span></td>
                        </tr>
                        <tr>
                            <td class="pe-3">Iuran BPJS Kesehatan:</td>
                            <td>Rp <span class="numbers">{{ $potongan_BPJS_kes }}</span></td>
                        </tr>
                        @if (
                            $potongan_lainnya->pot_sakit > 0 ||
                                $potongan_lainnya->pot_terlambat > 0 ||
                                $potongan_lainnya->pot_kosong > 0 ||
                                $potongan_lainnya->pot_perjalanan > 0)
                            <tr>
                                <td class="pe-3 fw-bold">Potongan Lain</td>
                            </tr>
                        @endif

                        @if ($potongan_lainnya->pot_sakit > 0)
                            <tr>
                                <td class="pe-3">Sakit :</td>
                                <td>Rp <span class="numbers">{{ $potongan_lainnya->pot_sakit }} </span>
                                </td>
                            </tr>
                        @endif
                        @if ($potongan_lainnya->pot_terlambat > 0)
                            <tr>
                                <td class="pe-3">Terlambat :</td>
                                <td>Rp <span class="numbers">{{ $potongan_lainnya->pot_terlambat }} </span>
                                </td>
                            </tr>
                        @endif
                        @if ($potongan_lainnya->pot_kosong > 0)
                            <tr>
                                <td class="pe-3">Kosong :</td>
                                <td>Rp <span class="numbers">{{ $potongan_lainnya->pot_kosong }} </span>
                                </td>
                            </tr>
                        @endif
                        @if ($potongan_lainnya->pot_perjalanan > 0)
                            <tr>
                                <td class="pe-3">Perjalanan :</td>
                                <td>Rp <span class="numbers">{{ $potongan_lainnya->pot_perjalanan }} </span>
                                </td>
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
                            <td class="fst-normal fw-bold">Rp <span class="numbers">{{ $total3 }}</span></td>
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
                {{-- <label class="form-label" for="input-gaji-pokok">
                    Total Gaji
                </label> --}}
                <input type="text" class="form-control readonly numberin" id="input-gaji-pokok"
                    placeholder="Input Gaji Pokok..." readonly disabled value="{{ $total }}">
            </div>
        </div>
    </div>

</div>
