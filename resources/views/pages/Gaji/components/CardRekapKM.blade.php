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
                        @if ($tnj_jabatan)
                            <tr>
                                <td class="pe-3">Tunjangan Jabatan:</td>
                                <td><span class="numbers">{{ $tnj_jabatan }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_bantuan_perumahan)
                            <tr>
                                <td class="pe-3">Uang Bantuan Perumahan:</td>
                                <td><span class="numbers">{{ $tunjangan_bantuan_perumahan }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_makan)
                            <tr>
                                <td class="pe-3">Tnj Uang Makan:</td>
                                <td><span class="numbers">{{ $tunjangan_makan }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_transport)
                            <tr>
                                <td class="pe-3">Tnj Uang Transport:</td>
                                <td><span class="numbers">{{ $tunjangan_transport }}</span></td>
                            </tr>
                        @endif
                        @if ($tunjangan_shift)
                            <tr>
                                <td class="pe-3">Tnj Uang Shift:</td>
                                <td><span class="numbers">{{ $tunjangan_shift }}</span></td>
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
                                <td class="pe-3">Tunjangan Lain:</td>
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
                            <td class="fst-normal fw-bold numbers">Rp <span
                                    class="numbers">{{ $total1 + $total2 }}</span>
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
                        @if ($potongan_pajak)
                            <tr>
                                <td class="pe-3">Potongan Pajak:</td>
                                <td><span class="numbers">{{ $potongan_pajak }}</span></td>
                            </tr>
                        @endif
                        @if ($potongan_lain)
                            <tr>
                                <td class="pe-3">Potongan Lain:</td>
                                <td><span class="numbers">{{ $potongan_lain }}</span></td>
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
                <input type="text" class="form-control readonly numberin" id="input-gaji-pokok"
                    placeholder="Input Gaji Pokok..." readonly disabled value="{{ $total }}">
            </div>
        </div>
    </div>

</div>
