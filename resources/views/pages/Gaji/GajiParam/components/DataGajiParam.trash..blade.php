{{-- @include('components.dataPerusahaan') --}}

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        Data Berhasil ditambahkan
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@elseif (session()->has('errors'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        Gagal menambahkan data
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
    </div>
@endif
<div class="card mb-md-3">
    <div class="card-header">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Parameter Gaji</h5>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="{{ route('page_gaji_param.store') }}" method="post" onsubmit="convertCurrencyBeforeSubmit()">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col mb-3">
                        <label for="struktural" class="form-label">Gaji Struktural</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="gajistruktural" id="struktural"
                                placeholder="Amount" aria-label="Amount (to the nearest dollar)">
                        </div>
                        {{-- <input type="text" onchange="formatCurrency(this)" class="input-group form-control" required> --}}
                    </div>
                    <div class="col mb-3">
                        <label for="fungsional" class="form-label">Gaji Fungsional</label>
                        <input type="text" name="gajifungsional" id="fungsional" onchange="formatCurrency(this)"
                            class="input-group form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="PositionSelect" class="form-label">Position</label>
                        <select id="PositionSelect" name="position_id" class="form-select">
                            <option>Select Position</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">{{ $position->position }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mb-3">
                        <label for="GolonganSelect" class="form-label">Golongan</label>
                        <select id="GolonganSelect" name="golongan_id" class="form-select" re>
                            <option>Select Golongan</option>
                            @foreach ($golongans as $golongan)
                                <option value="{{ $golongan->id }}">{{ $golongan->golongan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="justify-content-end d-flex">
                    <button class="btn btn-primary" type="submit" onkeypress="convertToNumber()">Create</button>

                </div>
            </form>

        </div>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between  flex-md-row flex-column pb-0">
        <div class="head-label text-center">
            <h5 class="card-title mb-0">Parameter Gaji</h5>
        </div>
        {{-- <div class="dt-action-buttons text-end pt-3 pt-md-0">
            <div class="dt-buttons">
                <button id="addbutton" class="dt-button create-new btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#addUserModal"tabindex="0" type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add New Parameter</span>
                    </span>
                </button> --}}
        {{-- <button type="button" class="btn btn-primary" ">
            Launch modal
          </button> --}}
        {{-- </div>
        </div> --}}
    </div>
    <div class="card-datatable text-nowrap">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5">
            <div class="dataTables_scroll">
                <table class="datatables-basic table border-top dataTable dtr-column coillapse"
                    aria-describedby="DataTables_Table_0_info" id="example">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Gaji Struktural</th>
                            <th>Gaji Fungsional</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gajiparams as $gajiparam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $gajiparam->position->position }}</td>
                                <td>{{ $gajiparam->golongan->golongan }}</td>
                                <td class="currency">{{ $gajiparam->gaji_struktural }} </td>
                                <td class="currency">{{ $gajiparam->gaji_fungsional }}</td>
                                <td>
                                    <button type="button" class="btn rounded-pill btn-icon btn-label-info"
                                        data-bs-toggle="modal" data-bs-target="#modalupdate{{ $gajiparam->id }}">
                                        <span class="tf-icons bx bx-edit-alt"></span>
                                    </button>
                                    @include('pages.Gaji.GajiParam.components.ModalGajiParam')
                                    <button type="button" class="btn rounded-pill btn-icon btn-label-danger"
                                        onclick="return confirm('Are you sure you want to delete this Param?')">
                                        <span class="tf-icons bx bx-trash-alt"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>Gaji Struktural</th>
                            <th>Gaji Fungsional</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    // Function to format currency

    function formatCurrency(input) {
        // Remove non-numeric characters and leading zeros
        const value = input.value.replace(/[^\d]/g, '').replace(/^0+/, '');

        // Format the value as currency (e.g., $1,234.56)
        const formattedValue = parseFloat(value).toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        // Update the input field with the formatted value
        input.value = formattedValue;
    }

    // Format currency in the table
    const currencyElements = document.querySelectorAll('.currency');
    currencyElements.forEach(function(element) {
        const value = parseFloat(element.textContent);
        element.textContent = value.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
    });
    // Format currency in the table
    const currencyElementsInpt = document.querySelectorAll('.currencyinp');
    currencyElementsInpt.forEach(function(element) {
        const values = parseFloat(element.value);
        element.value = values.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });
    });
</script>
