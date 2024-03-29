<div class="card-body py-2">
    <div class="row">
        <div class="col-7 border-end">
            <span class="fw-semibold ">GAJI I</span>
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
                            <span>Tnj. Jabatan</span>
                            <span>
                                <span class="numberin">{{ $slip->tnj_jabatan }}</span>
                            </span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_ahli)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Ahli</span>
                            <span>
                                <span class="numberin">{{ $slip->tnj_ahli }}</span>
                            </span>
                        </div>
                    </li>
                @endif
            </ul>
            <hr class="my-1">
            <li class="list-group-item list-group-timeline-primary py-0 my-0 mb-2">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">JUMLAH I</span>
                    <span class="me-3 fw-semibold">Rp
                        <span class="numberin">
                            {{ array_sum([$slip->gapok, $slip->tnj_ahli, $slip->tnj_jabatan]) }}
                        </span>
                    </span>
                </div>
            </li>

            <span class="fw-semibold ">GAJI II</span>
            <ul class="list-group list-group-timeline ">
                @if ($slip->tnj_bantuan_perumahan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. UBP</span> <span><span
                                    class="numberin">{{ $slip->tnj_bantuan_perumahan }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->total_tnj_makan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Makan</span> <span><span
                                    class="numberin">{{ $slip->total_tnj_makan }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->total_tnj_transport)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Transportasi</span> <span><span
                                    class="numberin">{{ $slip->total_tnj_transport }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->total_tnj_shift)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Shift</span> <span><span
                                    class="numberin">{{ $slip->total_tnj_shift }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_lapangan)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Lapangan</span> <span><span
                                    class="numberin">{{ $slip->tnj_lapangan }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_lain)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Lain</span> <span><span class="numberin">{{ $slip->tnj_lain }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_pajak)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. Pajak</span> <span><span class="numberin">{{ $slip->tnj_pajak }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->lembur)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Uang Lembur</span> <span><span class="numberin">{{ $slip->lembur }}</span></span>
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
                            <span>Tnj. BPJS TK</span> <span><span
                                    class="numberin">{{ $slip->tnj_bpjs_tk }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->tnj_bpjs_kes)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>Tnj. BPJS Kes</span> <span><span
                                    class="numberin">{{ $slip->tnj_bpjs_kes }}</span></span>
                        </div>
                    </li>
                @endif
            </ul>
            <hr class="my-1">
            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">JUMLAH II</span>
                    <span class="me-3 fw-semibold"><span>Rp <span
                                class="numberin">{{ array_sum([$slip->tnj_bpjs_tk, $slip->tnj_bpjs_kes, $slip->total_tnj_transport, $slip->total_tnj_shift, $slip->tnj_bantuan_perumahan, $slip->total_tnj_makan]) }}</span></span></span>
                </div>
            </li>
        </div>


        <div class="col-5">
            <span class="fw-semibold ">POTONGAN</span>
            <ul class="list-group list-group-timeline">
                @if ($slip->pot_bpjs_tk)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>I. BPJS TK</span> <span><span class="numberin">{{ $slip->pot_bpjs_tk }}</span></span>
                        </div>
                    </li>
                @endif
                @if ($slip->pot_bpjs_kes)
                    <li class="list-group-item list-group-timeline-primary py-0 my-0">
                        <div class="d-flex justify-content-between">
                            <span>I. BPJS Kes</span> <span><span
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

            </ul>
            @if ($slip->pot_sakit || $slip->pot_kosong || $slip->pot_terlambat || $slip->pot_perjalanan)
                <span class="fw-semibold ">LAIN-LAIN</span>
                <ul class="list-group list-group-timeline">

                    @if ($slip->pot_sakit)
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Sakit</span> <span><span class="numberin">{{ $slip->pot_sakit }}</span></span>
                            </div>
                        </li>
                    @endif
                    @if ($slip->pot_kosong)
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Absen</span> <span><span class="numberin">{{ $slip->pot_kosong }}</span></span>
                            </div>
                        </li>
                    @endif
                    @if ($slip->pot_terlambat)
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Terlambat</span> <span><span
                                        class="numberin">{{ $slip->pot_terlambat }}</span></span>
                            </div>
                        </li>
                    @endif
                    @if ($slip->pot_perjalanan)
                        <li class="list-group-item list-group-timeline-primary py-0 my-0">
                            <div class="d-flex justify-content-between">
                                <span>Dinas</span>
                                <span>
                                    <span class="numberin">
                                        {{ $slip->pot_perjalanan }}
                                    </span>
                                </span>
                            </div>
                        </li>
                    @endif
                </ul>
            @endif
            <hr class="my-1">
            <li class="list-group-item list-group-timeline-primary py-0 my-0">
                <div class="d-flex justify-content-between">
                    <span class="fw-semibold ">JUMLAH POTONGAN</span>
                    <span class="me-3 fw-semibold">Rp <span
                            class="numberin">{{ array_sum([$slip->pot_bpjs_kes, $slip->pot_bpjs_tk]) }}</span></span>
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
                        <span>JUMLAH GAJI I</span>
                        <span>
                            <span class="numberin">
                                {{ array_sum([$slip->gapok, $slip->tnj_ahli, $slip->tnj_jabatan]) }}
                            </span>
                        </span>
                    </div>
                </li>
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>JUMLAH GAJI II</span>
                        <span>
                            <span class="numberin">
                                {{ array_sum([$slip->tnj_bpjs_tk, $slip->tnj_bpjs_kes, $slip->total_tnj_transport, $slip->total_tnj_shift, $slip->tnj_bantuan_perumahan, $slip->total_tnj_makan]) }}
                            </span>
                        </span>
                    </div>
                </li>
                <li class="list-group-item list-group-timeline-primary py-0 my-0">
                    <div class="d-flex justify-content-between">
                        <span>JUMLAH POT</span>
                        <span>
                            <span class="numberin">
                                {{ array_sum([$slip->pot_bpjs_kes, $slip->pot_bpjs_tk]) }}
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
