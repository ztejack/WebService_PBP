<div class="modal fade" id="modalupdateBPJS" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Update Parameter BPJS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="modal-body text-start">
                <h6>1. Parameter BPJS Tenaga Kerja</h6>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-Pensiun">Jaminan Pensiun <span
                                class="text-info">(Karyawan)</span></label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-Pensiun" class="form-control" value="0">
                            <span class="input-group-text cursor-pointer">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-Hari-Tua-P">Jaminan Hari Tua <span
                                class="text-info">(Karyawan)</span> </label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-Hari-Tua-P" class="form-control" value="0">
                            <span class="input-group-text cursor-pointer">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-Kecelakaan-Kerja-P">Jaminan Kecelakaan Kerja
                            <span class="text-primary">(Perusahaan)</span></label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-Kecelakaan-Kerja-P" class="form-control"
                                value="0">
                            <span class="input-group-text cursor-pointer">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-Pensiun-P">Jaminan Pensiun <span
                                class="text-primary">(Perusahaan)</span></label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-Pensiun-P" class="form-control" value="0">
                            <span class="input-group-text cursor-pointer">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-Hari-Tua-P">Jaminan Hari Tua <span
                                class="text-primary">(Perusahaan)</span></label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-Hari-Tua-P" class="form-control" value="0">
                            <span class="input-group-text cursor-pointer">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-Kematian-P">Jaminan Kematian <span
                                class="text-primary">(Perusahaan)</span></label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-Kematian-P" class="form-control" value="0">
                            <span class="input-group-text cursor-pointer">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-gaji-max-jp-P">Parameter Gaji Maksimum Perhitungan
                            JP</label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-gaji-max-jp-P" class="form-control" value="0">

                        </div>
                    </div>
                </div>
                <hr class="my-4 mx-n4">
                <h6>2. Parameter BPJS Kesehatan</h6>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Kesehatan">Jaminan Kesehatan <span
                                class="text-info">(Karyawan)</span> </label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Kesehatan" class="form-control" value="0">
                            <span class="input-group-text cursor-pointer">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-Kesehatan-P">Jaminan Kesehatan <span
                                class="text-primary">(Perusahaan)</span></label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-Kesehatan-P" class="form-control"
                                value="0">
                            <span class="input-group-text cursor-pointer">%</span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-gajimax">Parameter Gaji Maksimum <span
                                class="text-warning">(Kesehatan)</span></label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-gajimax" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label" for="multicol-Jaminan-gajimin">Parameter Gaji Minimum <span
                                class="text-warning">(Kesehatan)</span></label>
                        <div class="input-group input-group-merge">
                            <input type="number" id="multicol-Jaminan-gajimin" class="form-control" value="0">
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Update</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>