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
                            <td class="pe-3">Tunjangan Transport:</td>
                            <td class="numbers">{{ $tunjangan_transport }}</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Tunjangan Bantuan Perumahan:</td>
                            <td class="numbers">{{ $tunjangan_perumahan }}</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Tunjangan Makan:</td>
                            <td class="numbers">{{ $tunjangan_makan }}</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Tunjangan Shift:</td>
                            <td class="numbers">{{ $tunjangan_shift }}</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Tunjangan BPJS Tenaga Kerja:</td>
                            <td class="numbers">{{ $tunjangan_BPJS_tk }}</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Tunjangan BPJS Kesehatan:</td>
                            <td class="numbers">{{ $tunjangan_BPJS_kes }}</td>
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
                            <td class="fst-normal fw-bold pe-3">Total:</td>
                            <td class="fst-normal fw-bold numbers">{{ $total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 pb-4" style="height: inherit">
        <div class="card mb-4 h-100">
            <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
                <h5 class="">Potongan</h5>
                <small class="text-muted float-end">Potongan</small>
            </div>
            <div class="card-body">
                <table class="w-100">
                    <tbody class="text-end">
                        <tr>
                            <td class="pe-3">Iuran BPJS Tenaga Kerja:</td>
                            <td class="numbers">{{ $potongan_BPJS_tk }}</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Iuran BPJS Kesehatan:</td>
                            <td class="numbers">{{ $potongan_BPJS_kes }}</td>
                        </tr>
                        <tr>
                            <td class="pe-3">Potongan Lain:</td>
                            <td>12,110.55</td>
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
                            <td class="fst-normal fw-bold pe-3">Total:</td>
                            <td class="fst-normal fw-bold">12,110.55</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col mb-sm-4">
        <div class="card">
            <div class="card-body">
                <label class="form-label" for="input-gaji-pokok">
                    Total Gaji
                </label>
                <input type="number" class="form-control readonly" id="input-gaji-pokok"
                    placeholder="Input Gaji Pokok..." readonly disabled>
            </div>
        </div>
    </div>

</div>
