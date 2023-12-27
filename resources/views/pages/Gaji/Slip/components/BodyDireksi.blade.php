<div class="card-body pb-2">
    <div class="row">
        <div class="col-lg-6 border-end">
            <span class="fw-semibold ">I Penghasilan</span>
            <ul class="list-group list-group-timeline ">
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>Gaji Pokok</span> <span><span class="numberin">{{ $slip->gapok }}</span></span>
                    </div>
                </li>
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
                @if ($slip->tnj_taspen)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Uang Tabungan Pensiun</span> <span><span
                                    class="numberin">{{ $slip->tnj_taspen }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_dana_pensiun)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Dana Pensiun</span> <span><span
                                    class="numberin">{{ $slip->tnj_dana_pensiun }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_hari_tua_p)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Hari Tua</span> <span><span
                                    class="numberin">{{ $slip->tnj_hari_tua_p }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_jmn_hari_tua_p)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Uang Jaminan Hari Tua</span> <span><span
                                    class="numberin">{{ $slip->tnj_jmn_hari_tua_p }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_pph21)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Pajak</span> <span><span
                                    class="numberin">{{ $slip->tnj_pph21 }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_simponi)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Simponi</span> <span><span
                                    class="numberin">{{ $slip->tnj_simponi }}</span></span>
                        </div>
                    </li>
                @endif

                @if ($slip->tnj_lain)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan Lain</span> <span><span class="numberin">{{ $slip->tnj_lain }}</span></span>
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
                @if ($slip->tnj_bpjs_tk)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tunjangan BPJS Ketenaga Kerjaan</span> <span><span
                                    class="numberin">{{ $slip->tnj_bpjs_tk }}</span></span>
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

            </ul>
            <hr class="my-1">
            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">JUMLAH PENDAPATAN</span>
                    <span class="me-3 fw-semibold"><span>
                            Rp <span class="numberin">
                                {{ round(
                                    array_sum([
                                        $slip->gapok,
                                        $slip->tnj_perumahan,
                                        $slip->tnj_bantuan_perumahan,
                                        $slip->tnj_taspen,
                                        $slip->tnj_dana_pensiun,
                                        $slip->tnj_hari_tua_p,
                                        $slip->tnj_pph21,
                                        $slip->tnj_jmn_hari_tua_p,
                                        $slip->tnj_simponi,
                                        $slip->tnj_bpjs_tk,
                                        $slip->tnj_bpjs_kes,
                                        $slip->tnj_lain,
                                    ]),
                                ) }}</span>
                        </span>
                    </span>
                </div>
            </li>
        </div>

        <div class="col-lg-6 ">
            <span class="fw-semibold ">II POTONGAN</span>
            <ul class="list-group list-group-timeline">
                @if ($slip->pot_serikat_pegawai_ba)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran Serikat Pegawai Bukit Asam</span> <span><span
                                    class="numberin">{{ $slip->pot_serikat_pegawai_ba }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_koperasi)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan Koperasi</span> <span><span
                                    class="numberin">{{ $slip->pot_koperasi }}</span></span>
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
                            <span>Potongan Dana Pensiun</span> <span><span
                                    class="numberin">{{ $slip->pot_dana_pensiun }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_premi_jht)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Premi Jaminan Hari Tua</span> <span><span
                                    class="numberin">{{ $slip->pot_premi_jht }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_tht)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran Tunjangan Hari Tua</span> <span><span
                                    class="numberin">{{ $slip->pot_tht }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_taspen)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran Tabungan Pensiun</span> <span><span
                                    class="numberin">{{ $slip->pot_taspen }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_pph21)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan Pajak</span> <span><span
                                    class="numberin">{{ $slip->pot_pph21 }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_simponi)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Potongan Somponi</span> <span><span
                                    class="numberin">{{ $slip->pot_simponi }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_bpjs_kes)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Iuran BPJS Ketenaga Kerjaan</span> <span><span
                                    class="numberin">{{ $slip->pot_bpjs_tk }}</span></span>
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

            </ul>

            <hr class="my-1">
            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">JUMLAH POTONGAN</span>
                    <span class="me-3 fw-semibold">Rp <span
                            class="numberin">{{ array_sum([
                                $slip->pot_bpjs_kes,
                                $slip->pot_bpjs_tk,
                                $slip->pot_serikat_pegawai_ba,
                                $slip->pot_koperasi,
                                $slip->pot_lazis,
                                $slip->pot_dana_pensiun,
                                $slip->pot_premi_jht,
                                $slip->pot_tht,
                                $slip->pot_taspen,
                                $slip->pot_pph21,
                                $slip->pot_simponi,
                                $slip->pot_lain,
                                ]) }}
                                </span></span>
                </div>
            </li>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group list-group-timeline">
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>JUMLAH GAJI I</span> <span> <span
                                class="numberin">{{ array_sum([$slip->gapok, $slip->tnj_ahli, $slip->tnj_jabatan]) }}</span></span>
                    </div>
                </li>
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>JUMLAH GAJI II</span> <span> <span
                                class="numberin">{{ array_sum([$slip->tnj_bpjs_tk, $slip->tnj_bpjs_kes, $slip->total_tnj_transport, $slip->total_tnj_shift, $slip->tnj_perumahan, $slip->total_tnj_makan]) }}</span></span>
                    </div>
                </li>
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>JUMLAH POTONGAN</span> <span> <span
                                class="numberin">{{ array_sum([$slip->pot_bpjs_kes, $slip->pot_bpjs_tk]) }}</span></span>
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
