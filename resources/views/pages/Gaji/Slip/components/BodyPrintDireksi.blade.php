<div class="card-body py-2">
    <div class="row">
        <div class="col-7 border-end">
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
                @if ($slip->tnj_jabatan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Jabatan</span>
                            <span>
                                <span class="numberin">{{ $slip->tnj_jabatan }}</span>
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
                            {{ array_sum([$slip->gapok, $slip->tnj_jabatan]) }}
                        </span>
                    </span>
                </div>
            </li>

            <span class="fw-semibold ">FASILITAS</span>
            <ul class="list-group list-group-timeline "> --}}
                @if ($slip->tnj_perumahan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Perumahan</span> <span><span
                                    class="numberin">{{ $slip->tnj_perumahan }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_bantuan_perumahan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Uang Bantuan Perumahan</span> <span><span
                                    class="numberin">{{ $slip->tnj_bantuan_perumahan }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_dana_pensiun)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Dana Pensiun (DPBA)</span> <span><span
                                    class="numberin">{{ $slip->tnj_dana_pensiun }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_simmode)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan SIMMODE 1</span> <span><span
                                    class="numberin">{{ $slip->tnj_simmode }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_bpjs_tk)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan BPJS Ketenaga Kerjaan</span> <span><span
                                    class="numberin">{{ $slip->tnj_bpjs_tk }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_bpjs_jkm)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan BPJS (JKM)</span> <span><span
                                    class="numberin">{{ $slip->tnj_bpjs_jkm }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_bpjs_jht)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan BPJS (JHT)</span> <span><span
                                    class="numberin">{{ $slip->tnj_bpjs_jht }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_bpjs_jp)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan BPJS (JP)</span> <span><span
                                    class="numberin">{{ $slip->tnj_bpjs_jp }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_bpjs_kes)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan BPJS Kesehatan</span> <span><span
                                    class="numberin">{{ $slip->tnj_bpjs_kes }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_pajak)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Pajak</span> <span><span
                                    class="numberin">{{ $slip->tnj_pajak }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_lain)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Lain</span> <span><span
                                    class="numberin">{{ $slip->tnj_lain }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->rapel)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Uang Rapel</span> <span><span class="numberin">{{ $slip->rapel }}</span></span>
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
                                    ]),
                                ) }}</span>
                        </span></span>
                </div>
            </li>
        </div>
        <div class="col-5">
            <span class="fw-semibold ">POTONGAN</span>
            <ul class="list-group list-group-timeline">
                @if ($slip->pot_serikat_pegawai_ba)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran Serikat Pegawai Bukit Asam (SPBA)</span> <span><span
                                    class="numberin">{{ $slip->pot_serikat_pegawai_ba }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_lazis)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan Lazis</span> <span><span
                                    class="numberin">{{ $slip->pot_lazis }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_dana_pensiun)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan Dana Pensiun (DPBA)</span> <span><span
                                    class="numberin">{{ $slip->pot_dana_pensiun }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_simmode)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan SIMMODE 1</span> <span><span
                                    class="numberin">{{ $slip->pot_simmode }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_koperasi)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan Koperasi Tj. Enim</span> <span><span
                                    class="numberin">{{ $slip->pot_koperasi }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_bpjs_tk)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran BPJS Ketenaga Kerjaan</span> <span><span
                                    class="numberin">{{ $slip->pot_bpjs_tk }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_bpjs_jkm)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran BPJS (JKM)</span> <span><span
                                    class="numberin">{{ $slip->pot_bpjs_jkm }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_bpjs_jht)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran BPJS (JHT)</span> <span><span
                                    class="numberin">{{ $slip->pot_bpjs_jht }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_bpjs_jp)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran BPJS (JP)</span> <span><span
                                    class="numberin">{{ $slip->pot_bpjs_jp }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_bpjs_kes)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran BPJS Kesehatan</span> <span><span
                                    class="numberin">{{ $slip->pot_bpjs_kes }}</span></span>
                        </div>
                    </li>
                @endif

                @if ($slip->pot_pajak)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan Pajak</span> <span><span
                                    class="numberin">{{ $slip->pot_pajak }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_lain)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan Lain</span> <span><span class="numberin">{{ $slip->pot_lain }}</span></span>
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
        <div class="col-7">
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
                                    $slip->tnj_dana_pensiun,
                                    $slip->tnj_simmode,
                                    $slip->tnj_bpjs_tk,
                                    $slip->tnj_bpjs_jkm,
                                    $slip->tnj_bpjs_jht,
                                    $slip->tnj_bpjs_jp,
                                    $slip->tnj_bpjs_kes,
                                    $slip->tnj_pajak,
                                    $slip->tnj_lain,
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
