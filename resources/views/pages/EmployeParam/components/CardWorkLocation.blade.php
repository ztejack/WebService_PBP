<div class="card mb-4">
    <div class="card-header">
        <h5 class="card-text">Lokasi Kerja</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="{{ route('worklocation.store') }}" method="post">
                @method('POST')
                @csrf
                <h6 class="mb-0">Add Lokasi Kerja</h6>
                <label for="location" class="form-label"></label>
                <input id="location" type="text" value="" name="location" class="form-control">
                @error('location')
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
            <div class="table-responsive text-nowrap" style="max-height: 25rem;">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Employe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($worklocations as $worklocation)
                            <tr>
                                <td><span class="fw-medium">{{ $worklocation->location }}</span></td>
                                <td><span class="badge bg-label-success"><i class="bx bx-user"></i>
                                        {{ $worklocation->employee->count() }}</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-label-warning btn-sm"
                                            id="BtnDropdownFormWorkLocation{{ $worklocation->id }}"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                class="bx bx-edit-alt me-1"></i> Edit</button>
                                        {{-- Form Edit Work Location --}}
                                        <div class="dropdown-menu dropdown-menu-end w-px-300" style="">
                                            <form class="p-4" method="post"
                                                action="{{ route('worklocation.update', $worklocation->id) }}">
                                                @method('POST')
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="DropdownFormWorkLocation" class="form-label">Location
                                                        Name</label>
                                                    <input type="name" name="locationname"
                                                        value="location{{ $worklocation->id }}" hidden>
                                                    <input type="name" name="location{{ $worklocation->id }}"
                                                        class="form-control" id="DropdownFormWorkLocation"
                                                        placeholder="Enter Location Name"
                                                        value="{{ old('location' . $worklocation->id . '') }}">
                                                    @error('location' . $worklocation->id . '')
                                                        <script>
                                                            $(document).ready(function() {
                                                                // Trigger a click event on the button when the document is ready
                                                                $('#BtnDropdownFormWorkLocation{{ $worklocation->id }}').click();
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
                                            action="{{ route('worklocation.destroy', $worklocation->id) }}">
                                            @method('POST')
                                            @csrf
                                            <button type="submit" class="btn btn-label-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this Locationt?')"><i
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
