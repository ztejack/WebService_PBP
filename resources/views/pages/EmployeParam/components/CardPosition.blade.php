{{-- <div class="mb-5"> --}}
<div class="col-md-6 col-lg-6">
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-text">Position</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{ route('position.store') }}" method="post">
                    @method('POST')
                    @csrf
                    <h6 class="mb-0">Add Position</h6>
                    <label for="position" class="form-label"></label>
                    <input id="position" type="text" value="" name="position" class="form-control ">
                    @error('position')
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
                            @foreach ($positions as $position)
                                <tr>
                                    <td><span class="fw-medium">{{ $position->position }}</span></td>
                                    <td><span class="badge bg-label-success"><i class="bx bx-user"></i>
                                            {{ $position->employee->count() }}</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-label-warning btn-sm"
                                                id="BtnDropdownFormPosition{{ $position->id }}"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</button>
                                            {{-- Form Edit position --}}
                                            <div class="dropdown-menu dropdown-menu-end w-px-300" style="">
                                                <form class="p-4" method="post"
                                                    action="{{ route('position.update', $position->id) }}">
                                                    @method('POST')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="DropdownFormPosition" class="form-label">Position
                                                            Name</label>
                                                        <input type="name" name="positionname"
                                                            value="position{{ $position->id }}" hidden>
                                                        <input type="name" name="position{{ $position->id }}"
                                                            class="form-control" id="DropdownFormPosition"
                                                            placeholder="Enter Position Name"
                                                            value="{{ old('position' . $position->id . '') }}">
                                                        @error('position' . $position->id . '')
                                                            <script>
                                                                $(document).ready(function() {
                                                                    // Trigger a click event on the button when the document is ready
                                                                    $('#BtnDropdownFormPosition{{ $position->id }}').click();
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
                                                action="{{ route('position.destroy', $position->id) }}">
                                                @method('POST')
                                                @csrf
                                                <button type="submit" class="btn btn-label-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this position?')"><i
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
