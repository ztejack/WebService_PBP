{{-- <div class="mb-5"> --}}
<div class="col-md-6 col-lg-6">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-text">Golongan</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('golongan.store') }}" method="post">
                    @method('POST')
                    @csrf
                    <h6 class="mb-0">Add Golongan</h6>
                    <label for="golongan" class="form-label"></label>
                    <input id="golongan" type="text" value="" name="golongan" class="form-control">
                    @error('golongan')
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
                            @foreach ($golongans as $golongan)
                                <tr>
                                    <td><span class="fw-medium">{{ $golongan->golongan }}</span></td>
                                    <td><span class="badge bg-label-success"><i class="bx bx-user"></i>
                                            {{ $golongan->employee->count() }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-label-warning btn-sm"
                                                id="BtnDropdownFormgolongan{{ $golongan->id }}"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</button>
                                            {{-- Form Edit golongan --}}
                                            <div class="dropdown-menu dropdown-menu-end w-px-300" style="">
                                                <form class="p-4" method="post"
                                                    action="{{ route('golongan.update', $golongan->id) }}">
                                                    @method('POST')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="DropdownFormgolongan" class="form-label">golongan
                                                            Name</label>
                                                        <input type="name" name="golonganname"
                                                            value="golongan{{ $golongan->id }}" hidden>
                                                        <input type="name" name="golongan{{ $golongan->id }}"
                                                            class="form-control" id="DropdownFormgolongan"
                                                            placeholder="Enter golongan Name"
                                                            value="{{ old('golongan' . $golongan->id . '') }}">
                                                        @error('golongan' . $golongan->id . '')
                                                            <script>
                                                                $(document).ready(function() {
                                                                    // Trigger a click event on the button when the document is ready
                                                                    $('#BtnDropdownFormgolongan{{ $golongan->id }}').click();
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
                                                action="{{ route('golongan.destroy', $golongan->id) }}">
                                                @method('POST')
                                                @csrf
                                                <button type="submit" class="btn btn-label-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this Contract?')"><i
                                                        class="bx  bx-trash me-1"></i> Delete</button>
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
