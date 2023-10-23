{{-- Card Form --}}
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <h5 class="">Data Gaji</h5>
        <small class="text-muted float-end">Data Gaji</small>
    </div>
    <div class="card-body">
        <form action="{{ route('store_gaji_employee') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label class="form-label" for="input-gaji-pokok">
                    Gaji Pokok
                </label>
                <input type="number" class="form-control" id="input-gaji-pokok" placeholder="Input Gaji Pokok...">
            </div>
            <div class="mb-3">

                <label class="form-label" for="input-tunjangan-jabatan">
                    Tunjangan Jabatan
                </label>
                <input type="number" class="form-control readonly" name="input-tunjab" id="input-tunjangan-jabatan"
                    placeholder="Tunjangan Jabatan..." readonly disabled value="">
                <div class="col mt-2">
                    <div class="form-check form-check-inline">
                        <input name="collapsible-tunjab-type" class="form-check-input" onclick="updateInput(this)"
                            type="radio" value="{{ $gaji_struktural }}" id="collapsible-tunjab-type-struktural">
                        <label class="form-check-label" for="collapsible-tunjab-type-struktural">Strukturral</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input name="collapsible-tunjab-type" class="form-check-input" onclick="updateInput(this)"
                            type="radio" value="{{ $gaji_fungsional }}" id="collapsible-tunjab-type-Fungsional">
                        <label class="form-check-label" for="collapsible-tunjab-type-Fungsional">Fungsional</label>
                    </div>
                </div>
                <label class="form-label" for="total-gaji1">
                    Total
                </label>
                <input type="number" class="form-control readonly" name="total-gaji1" id="total-gaji1"
                    placeholder="Total.." readonly disabled value="{{ $total1 }}">
                <script>
                    function setInputValue() {
                        var radioButtons = document.querySelectorAll('input[type="radio"]');
                        var inputField = document.getElementById('input-tunjangan-jabatan');

                        for (var i = 0; i < radioButtons.length; i++) {
                            if (radioButtons[i].checked) {
                                inputField.value = radioButtons[i].value;
                                break;
                            }
                        }
                    }

                    function setTotal() {
                        var gapok = document.getElementById('input-gaji-pokok')
                        var tunjab = document.getElementById('input-tunjangan-jabatan')
                        var total = document.getElementById('total-gaji1')
                        total = gapok.value + tunjab.value
                    }
                    var gapok = document.getElementById('input-gaji-pokok')
                    var tunjab = document.getElementById('input-tunjangan-jabatan')

                    gapok.addEventListener('change', setTotal)
                    tunjab.addEventListener('change', setTotal)
                    window.addEventListener('load', setInputValue);

                    function updateInput(radio) {
                        // Get the selected radio button's value
                        var selectedValue = radio.value;

                        // Update the input field with the selected value
                        document.getElementById('input-tunjangan-jabatan').value = selectedValue;
                    }
                </script>
            </div>
            <button type="submit" class="btn btn-primary"><i class="bx bx-save"></i> Save</button>
            <button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#addNewAddress"><i
                    class="bx bx-plus"></i> Tambah Tunjangan Lain</button>
        </form>
    </div>
</div>
<div class="modal fade" id="addNewAddress" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-simple modal-add-new-address">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3 class="address-title">Tambahkan Tunjangan Baru</h3>
                </div>
                <form id="addNewAddressForm" class="row g-3 fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                    action="{{ route('tunjangan.store', $gaji->id) }}">
                    @csrf

                    <div class="col-12 ">
                        <label class="form-label" for="namatunjangan">Nama Tunjangan</label>
                        <input type="text" id="namatunjangan" name="namatunjangan" class="form-control"
                            placeholder="..Tunjangan Ahli">
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="jumlahtunjangan">Jumlah Tunjangan</label>
                        <input type="number" id="jumlahtunjangan" name="jumlahtunjangan" class="form-control"
                            placeholder="Enter Amount">
                    </div>

                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                    </div>
                    <input type="hidden">
                </form>
            </div>
        </div>
    </div>
</div>
