<div class="card-body py-2">
    <div class="row">
        <div class="col-6 border-end">
            <span class="fw-semibold ">PENGHASILAN</span>
            <ul class="list-group list-group-timeline">
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>Gaji Pokok</span>
                        <span>
                            <span class="numberin">{{ $slip->gapok }}</span>
                        </span>
                    </div>
                </li>
                @if (optional($slip)->tnj_jabatan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Jabatan</span>
                            <span>
                                <span class="numberin">{{ optional($slip)->tnj_jabatan }}</span>
                            </span>
                        </div>
                    </li>
                @endif
                {{-- </ul>
            <hr class="my-1">
            <li class="list-group-item list-group-timeline-primary py-0 my-0 mb-2">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">JUMLAH I</span>
                    <span class="me-3 fw-semibold">Rp
                        <span class="numberin">
                            {{ array_sum([optional($slip)->gapok, optional($slip)->tnj_jabatan]) }}
                        </span>
                    </span>
                </div>
            </li>

            <span class="fw-semibold ">FASILITAS</span>
            <ul class="list-group list-group-timeline "> --}}
                @if (optional($slip)->tnj_perumahan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Perumahan</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_perumahan }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_bantuan_perumahan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. UBP</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_bantuan_perumahan }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_makan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Makan</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_makan }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_shift)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Shift</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_shift }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_transport)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Transport</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_transport }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_dana_pensiun)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Dana Pensiun (DPBA)</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_dana_pensiun }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_simmode)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. SIMMODE 1</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_simmode }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_bpjs_tk)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. BPJS (TK)</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_bpjs_tk }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_bpjs_jkm)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. BPJS (JKM)</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_bpjs_jkm }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_bpjs_jht)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. BPJS (JHT)</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_bpjs_jht }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_bpjs_jp)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. BPJS (JP)</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_bpjs_jp }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_bpjs_kes)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. BPJS (Kes)</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_bpjs_kes }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_pajak)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Pajak</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_pajak }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->tnj_lain)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Lain</span> <span><span
                                    class="numberin">{{ optional($slip)->tnj_lain }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->rapel)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Uang Rapel</span> <span><span
                                    class="numberin">{{ optional($slip)->rapel }}</span></span>
                        </div>
                    </li>
                @endif
            </ul>
            <hr class="my-1">
            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">JUMLAH PENDAPATAN</span>
                    <span class="me-3 fw-semibold"><span>Rp <span class="numberin">
                                {{ round(
                                    array_sum([
                                        $slip->gapok,
                                        $slip->tnj_jabatan,
                                        $slip->tnj_perumahan,
                                        $slip->tnj_bantuan_perumahan,
                                        $slip->tnj_makan,
                                        $slip->tnj_transport,
                                        $slip->tnj_shift,
                                        $slip->tnj_dana_pensiun,
                                        $slip->tnj_simmode,
                                        $slip->tnj_bpjs_tk,
                                        $slip->tnj_bpjs_jkm,
                                        $slip->tnj_bpjs_jht,
                                        $slip->tnj_bpjs_jp,
                                        $slip->tnj_hari_tua_p,
                                        $slip->tnj_bpjs_kes,
                                        $slip->tnj_pajak,
                                        $slip->tnj_lain,
                                        $slip->rapel,
                                    ]),
                                ) }}</span>
                        </span></span>
                </div>
            </li>
        </div>
        <div class="col-6">
            <span class="fw-semibold ">POTONGAN</span>
            <ul class="list-group list-group-timeline">
                @if (optional($slip)->pot_serikat_pegawai_ba)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>I. SPBA</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_serikat_pegawai_ba }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_lazis)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Pot. Lazis</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_lazis }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_dana_pensiun)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Pot. Dana Pensiun (DPBA)</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_dana_pensiun }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_simmode)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Pot. SIMMODE 1</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_simmode }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_koperasi)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Pot. Koperasi Tj. Enim</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_koperasi }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_bpjs_tk)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>I. BPJS (TK)</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_bpjs_tk }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_bpjs_jkm)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>I. BPJS (JKM)</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_bpjs_jkm }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_bpjs_jht)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>I. BPJS (JHT)</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_bpjs_jht }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_bpjs_jp)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>I. BPJS (JP)</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_bpjs_jp }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_bpjs_kes)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>I. BPJS (Kes)</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_bpjs_kes }}</span></span>
                        </div>
                    </li>
                @endif

                @if (optional($slip)->pot_pajak)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Pot. Pajak</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_pajak }}</span></span>
                        </div>
                    </li>
                @endif
                @if (optional($slip)->pot_lain)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Pot. Lain</span> <span><span
                                    class="numberin">{{ optional($slip)->pot_lain }}</span></span>
                        </div>
                    </li>
                @endif
            </ul>

            <hr class="my-1">
            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">JUMLAH POTONGAN</span>
                    <span class="me-3 fw-semibold">Rp <span
                            class="numberin">{{ array_sum([
                                $slip->pot_serikat_pegawai_ba,
                                $slip->pot_lazis,
                                $slip->pot_dana_pensiun,
                                $slip->pot_simmode,
                                $slip->pot_koperasi,
                                $slip->pot_bpjs_tk,
                                $slip->pot_bpjs_jkm,
                                $slip->pot_bpjs_jht,
                                $slip->pot_bpjs_jp,
                                $slip->pot_bpjs_kes,
                                $slip->pot_pajak,
                                $slip->pot_lain,
                            ]) }}
                        </span></span>
                </div>
            </li>
        </div>
    </div>
</div>
<div class="card-body pt-2">
    <div class="row">
        <div class="col-6">
            <ul class="list-group list-group-timeline">
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>JUMLAH PENDAPATAN</span>
                        <span>
                            <span class="numberin">
                                {{ array_sum([
                                    $slip->gapok,
                                    $slip->tnj_jabatan,
                                    $slip->tnj_perumahan,
                                    $slip->tnj_bantuan_perumahan,
                                    $slip->tnj_makan,
                                    $slip->tnj_transport,
                                    $slip->tnj_shift,
                                    $slip->tnj_dana_pensiun,
                                    $slip->tnj_simmode,
                                    $slip->tnj_bpjs_tk,
                                    $slip->tnj_bpjs_jkm,
                                    $slip->tnj_bpjs_jht,
                                    $slip->tnj_bpjs_jp,
                                    $slip->tnj_hari_tua_p,
                                    $slip->tnj_bpjs_kes,
                                    $slip->tnj_pajak,
                                    $slip->tnj_lain,
                                    $slip->rapel,
                                ]) }}
                            </span>
                        </span>
                    </div>
                </li>
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>JUMLAH POTONGAN</span>
                        <span>
                            <span class="numberin">
                                {{ array_sum([
                                    $slip->pot_serikat_pegawai_ba,
                                    $slip->pot_lazis,
                                    $slip->pot_dana_pensiun,
                                    $slip->pot_simmode,
                                    $slip->pot_koperasi,
                                    $slip->pot_bpjs_tk,
                                    $slip->pot_bpjs_jkm,
                                    $slip->pot_bpjs_jht,
                                    $slip->pot_bpjs_jp,
                                    $slip->pot_bpjs_kes,
                                    $slip->pot_pajak,
                                    $slip->pot_lain,
                                ]) }}
                            </span>
                        </span>
                    </div>
                </li>
            </ul>
            <hr class="my-2">
            <span class=" py-0 my-0">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">TOTAL DITERIMA KARYAWAN</span>
                    <span id="ttlterima" class="d-none hidden" hidden>{{ $slip->total }}</span>
                    <span class="me-3 fw-semibold numbers">Rp <span
                            class="numberin">{{ $slip->total }}</span></span>
                </div>
            </span>
        </div>
        <div class="col-12 my-2">
            <span class="fw-medium ">Terbilang:</span>
            <span id="spelling"></span>
        </div>
    </div>
</div>
