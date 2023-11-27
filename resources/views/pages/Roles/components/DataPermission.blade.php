<div class="col-xl-4 mb-4 order-1 order-xl-0">
    <div class="card h-100">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="card-title m-0 me-2">PERMISSION <span
                    class="badge bg-label-primary rounded-pill text-uppercase"><span class="bx bx-key"></span>
                    {{ $permissions->count() }}</span></h5>

        </div>
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th>Permission Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-0 text-truncate">{{ $permission->name }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    {{-- <a href="#" class="btn btn-sm btn-primary">
                                        Detail
                                    </a> --}}
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalpermission{{ $permission->name }}">
                                        Detail
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="modalpermission{{ $permission->name }}" tabindex="-1"
                            style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalpermission{{ $permission->name }}Title">
                                            {{ $permission->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img class="w-100"
                                            src="{{ asset('img/illustrations/website-launching-coming-soon.webp') }}"
                                            alt="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
