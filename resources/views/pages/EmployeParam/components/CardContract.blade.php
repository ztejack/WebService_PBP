{{-- <div class="mb-5"> --}}
<div class="col-md-6 col-lg-6">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-text">Contract</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('contract.store') }}" method="post">
                    @method('POST')
                    @csrf
                    <h6 class="mb-0">Add Contract</h6>
                    <label for="contract" class="form-label"></label>
                    <input id="contract" type="text" name="contract" value="{{ old('contract') }}"
                        class="form-control">
                    @error('contract')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                    <button class="btn btn-primary btn-sm btn-block d-flex align-content-between mt-4" type="submit">
                        <i class="bx bx-send"></i> Submit
                    </button>
                </form>
            </div>
            <hr class="my-4 mx-n4">
            <div class="mt-4">
                <div class="table-responsive text-nowrap">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Employe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($contracs as $contract)
                                <tr>
                                    <td><span class="fw-medium">{{ $contract->contract }}</span></td>
                                    <td><span class="badge bg-label-success"><i class="bx bx-user"></i>
                                            {{ $contract->employee->count() }}</span></td>
                                    <td>
                                        <div class="dropdown">

                                            <button type="button" class="btn btn-label-warning btn-sm"
                                                id="BtnDropdownFormSatker{{ $contract->id }}" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</button>
                                            {{-- Form Edit contract --}}
                                            <div class="dropdown-menu dropdown-menu-end w-px-300" style="">
                                                <form class="p-4" method="post"
                                                    action="{{ route('contract.update', $contract->id) }}">
                                                    @method('POST')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="DropdownFormContract" class="form-label">Contract
                                                            Name</label>
                                                        <input type="name" name="contractname"
                                                            value="contract{{ $contract->id }}" hidden>
                                                        <input type="name" name="contract{{ $contract->id }}"
                                                            class="form-control" id="DropdownFormContract"
                                                            placeholder="Enter Conttract Name"
                                                            value="{{ old('contract' . $contract->id . '') }}">
                                                        @error('contract' . $contract->id . '')
                                                            <script>
                                                                $(document).ready(function() {
                                                                    // Trigger a click event on the button when the document is ready
                                                                    $('#BtnDropdownFormContract{{ $contract->id }}').click();
                                                                });
                                                            </script>

                                                            <div class="invalid-feedback d-block">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <button type="Submit" class="btn btn-primary">Submit</button>
                                                </form>
                                                <div class="dropdown-divider"></div>
                                            </div>
                                            <form class="d-inline" method="post"
                                                action="{{ route('contract.destroy', $contract->id) }}">
                                                @method('POST')
                                                @csrf
                                                <button type="submit" class="btn btn-label-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this Contract?')"><i
                                                        class="bx
                                                    bx-trash me-1"></i>
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- </div> --}}
