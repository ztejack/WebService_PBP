<div class="card mb-4">
    <h5 class="card-header">Payroll</h5>
    <div class="card-body demo-vertical-spacing demo-only-element">
        <form action="{{ route('submission.store') }}" method="POST">
            @method('POST')
            @csrf
            <div class="col mb-4">
                <label class="form-label" for="bs-datepicker-autoclose">Date</label>
                <div class="input-group">
                    <input type="text" class="add-on form-control form-control-sm" id="bs-datepicker-autoclose"
                        data-date-format="mm-yyyy" aria-describedby="bs-datepicker-autoclose"
                        value="{{ now()->format('d-m-Y') }}" name="date">
                    <span class="input-group-text"><i class="bx bx-calendar"></i></span>
                </div>
            </div>

            {{-- <div class="col mb-4">
            <label class="form-label" for="bs-datepicker-autoclose">Some</label>
            <input type="text" class="form-control form-control-sm" placeholder="Recipient's username"
                aria-label="Recipient's username" aria-describedby="basic-addon13">
        </div> --}}
            <div class="divider divider-info">
                <div class="divider-text">
                    Gaji Karyawan
                </div>
            </div>
            <div class="card-datatable ">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <table class="datatables-order table-sm table border-top dataTable no-footer dtr-column collapsed"
                        id="example-form" aria-describedby="DataTables_Table_0_info" data-page-length='25'>
                        <thead>
                            <tr>
                                <th class="" rowspan="1" colspan="1" style="width: 2px" aria-label="">
                                    No</th>
                                {{-- <th class="select-checkbox">
                                <input type="checkbox" class="select-all form-check-input">
                            </th> --}}
                                <th class="select-checkbox">
                                    <input type="checkbox" id="select-all" class="select-all form-check-input">
                                </th>
                                {{-- <th class="select-checkbox">
                                <input type="checkbox" class="select-all form-check-input">
                            </th> --}}
                                <th class=" " aria-controls="DataTables_Table_0" rowspan="1" colspan="1">Name
                                </th>
                                <th class="" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">date
                                </th>
                                <th class="" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                    payment
                                </th>
                                <th class="" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                    status
                                </th>
                                <th class="" rowspan="1" colspan="1" aria-label="Actions">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="control">{{ $loop->iteration }}</td>
                                    <td class="dt-checkboxes-cell">
                                        <input type="checkbox" name="submisiions[]"
                                            class="dt-checkboxes form-check-input row-checkbox"
                                            value="{{ $user->employee->gaji->id }}" required>
                                    </td>
                                    <td class="sorting_1"><span class="fw-medium">{{ $user->name }}</span></td>
                                    <td class=""><span class="text-nowrap">{{ now()->format('M Y') }}</span></td>

                                    <td>
                                        <h6 class="mb-0 w-px-100">Rp <span
                                                class="numberin">{{ $user->employee->totalgaji() }}</span>
                                        </h6>
                                    </td>
                                    <td><span class="badge px-2 bg-label-info" text-capitalized="">Ready to
                                            Payroll</span>
                                    </td>
                                    <td class="">
                                        <a href="{{ route('page_gaji_employe', $user->slug) }}"
                                            class="btn btn-primary btn-sm">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>

    </div>


</div>
</div>
