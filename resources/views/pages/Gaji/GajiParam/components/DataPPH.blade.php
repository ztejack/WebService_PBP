<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title">PPH</h5>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('param.pph.update', $parampph->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <label for="biaya_jabatan" class="form-label">Biaya Jabatan</label>
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="biaya_jabatan" id="biaya_jabatan"
                            min="0" value="{{ $parampph->biaya_jabatan }}" placeholder="" required>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="jumlah_kategori_pertama" class="form-label">
                        Jumlah Kategori
                        <span class="text-primary">Pertama</span>
                    </label>
                    <div class="input-group input-group-merge mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="jumlah_kategori_pertama"
                            id="jumlah_kategori_pertama" min="0" value="{{ $parampph->jumlah_kategori_pertama }}"
                            placeholder="" required>
                    </div>
                    <label for="persentase_kategori_pertama" class="form-label">
                        Persentase Kategori
                        <span class="text-primary">Pertama</span>
                    </label>
                    <div class="input-group input-group-merge mb-3">
                        <input type="number" class="form-control" name="persentase_kategori_pertama"
                            id="persentase_kategori_pertama" min="0"
                            value="{{ $parampph->persentase_kategori_pertama }}" placeholder="" required>
                        <span class="input-group-text cursor-pointer">%</span>
                    </div>
                    <label for="pengurang_kategori_pertama" class="form-label">
                        Pengurang Kategori
                        <span class="text-primary">Pertama</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="pengurang_kategori_pertama"
                            id="pengurang_kategori_pertama" min="0"
                            value="{{ $parampph->pengurang_kategori_pertama }}" placeholder="" required>
                    </div>
                    <hr>
                    <label for="jumlah_kategori_kedua" class="form-label">
                        Jumlah Kategori
                        <span class="text-primary">Kedua</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="jumlah_kategori_kedua"
                            id="jumlah_kategori_kedua" min="0" value="{{ $parampph->jumlah_kategori_kedua }}"
                            placeholder="" required>
                    </div>
                    <label for="persentase_kategori_kedua" class="form-label">
                        Persentase Kategori
                        <span class="text-primary">Kedua</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <input type="number" class="form-control" name="persentase_kategori_kedua"
                            id="persentase_kategori_kedua" min="0"
                            value="{{ $parampph->persentase_kategori_kedua }}" placeholder="" required>
                        <span class="input-group-text cursor-pointer">%</span>
                    </div>
                    <label for="pengurang_kategori_kedua" class="form-label">
                        Pengurang Kategori
                        <span class="text-primary">Kedua</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="pengurang_kategori_kedua"
                            id="pengurang_kategori_kedua" min="0"
                            value="{{ $parampph->pengurang_kategori_kedua }}" placeholder="" required>
                    </div>
                    <hr>
                    <label for="jumlah_kategori_ketiga" class="form-label">
                        Jumlah Kategori
                        <span class="text-primary">Ketiga</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="jumlah_kategori_ketiga"
                            id="jumlah_kategori_ketiga" min="0"
                            value="{{ $parampph->jumlah_kategori_ketiga }}" placeholder="" required>
                    </div>
                    <label for="persentase_kategori_ketiga" class="form-label">
                        Persentase Kategori
                        <span class="text-primary">Ketiga</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <input type="number" class="form-control" name="persentase_kategori_ketiga"
                            id="persentase_kategori_ketiga" min="0"
                            value="{{ $parampph->persentase_kategori_ketiga }}" placeholder="" required>
                        <span class="input-group-text cursor-pointer">%</span>
                    </div>
                    <label for="pengurang_kategori_ketiga" class="form-label">
                        Pengurang Kategori
                        <span class="text-primary">Ketiga</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="pengurang_kategori_ketiga"
                            id="pengurang_kategori_ketiga" min="0"
                            value="{{ $parampph->pengurang_kategori_ketiga }}" placeholder="" required>
                    </div>

                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="jumlah_kategori_keempat" class="form-label">
                        Jumlah Kategori
                        <span class="text-primary">Keempat</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="jumlah_kategori_keempat"
                            id="jumlah_kategori_keempat" min="0"
                            value="{{ $parampph->jumlah_kategori_keempat }}" placeholder="" required>
                    </div>
                    <label for="persentase_kategori_keempat" class="form-label">
                        Persentase Kategori Keempat
                        <span class="text-primary">Keempat</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <input type="number" class="form-control" name="persentase_kategori_keempat"
                            id="persentase_kategori_keempat" min="0"
                            value="{{ $parampph->persentase_kategori_keempat }}" placeholder="" required>
                        <span class="input-group-text cursor-pointer">%</span>
                    </div>
                    <label for="pengurang_kategori_keempat" class="form-label">
                        Pengurang Kategori
                        <span class="text-primary">Keempat</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="pengurang_kategori_keempat"
                            id="pengurang_kategori_keempat" min="0"
                            value="{{ $parampph->pengurang_kategori_keempat }}" placeholder="" required>
                    </div>
                    <hr>
                    <label for="jumlah_kategori_kelima" class="form-label">
                        Jumlah Kategori
                        <span class="text-primary">Kelima</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="jumlah_kategori_kelima"
                            id="jumlah_kategori_kelima" min="0"
                            value="{{ $parampph->jumlah_kategori_kelima }}" placeholder="" required>
                    </div>
                    <label for="persentase_kategori_kelima" class="form-label">
                        Persentase Kategori
                        <span class="text-primary">Kelima</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <input type="number" class="form-control" name="persentase_kategori_kelima"
                            id="persentase_kategori_kelima" min="0"
                            value="{{ $parampph->persentase_kategori_kelima }}" placeholder="" required>
                        <span class="input-group-text cursor-pointer">%</span>
                    </div>
                    <label for="pengurang_kategori_kelima" class="form-label">
                        Pengurang Kategori
                        <span class="text-primary">Kelima</span>
                    </label>
                    <div class="input-group input-group-merge  mb-3">
                        <span class="input-group-text">Rp</span>
                        <input type="number" class="form-control" name="pengurang_kategori_kelima"
                            id="pengurang_kategori_kelima" min="0"
                            value="{{ $parampph->pengurang_kategori_kelima }}" placeholder="" required>
                    </div>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <h6 class="alert-heading d-flex align-items-center mb-1">Perhatian !!!</h6>
                        <p class="mb-0">Setelah melakukan update parameter <span class="fw-bold">Pajak</span>
                            diperlukan update keseluruhan gaji karyawan non <span class="fw-bold">Direksi &
                                Komisaris</span></p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                </div>
            </div>
            <div class="pt-4">
                <button type="submit" class="btn btn-primary me-sm-3 me-1">
                    <span class="bx bx-save"></span> Update</button>
            </div>
        </form>
    </div>
</div>
