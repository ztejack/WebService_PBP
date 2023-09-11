<div class="modal fade" id="addUserModal" tabindex="-1" style="display: none;" aria-hidden="true">
    <form method="POST" action="{{ route('store_user') }}">
        @csrf
        @method('POST')
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2 mb-2">
                        <div class="col mb-0">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col mb-0">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control"
                                placeholder="Enter Username" value="{{ old('username') }}">
                            <div class="form-text"></div>
                            @error('username')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control  mb-2"
                                placeholder="mail@example.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                            <label for="phonenumber" class="form-label">Phone Number</label>
                            <input type="text" id="phonenumber" name="phonenumber" class="form-control"
                                placeholder="+62" value="{{ old('phonenumber') }}">
                            @error('phonenumber')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" id="resetButton" class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="" class="btn btn-primary">Save
                        changes</button>
                </div>

            </div>
        </div>
    </form>
</div>
