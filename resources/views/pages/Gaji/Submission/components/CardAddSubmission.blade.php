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
                                            class="dt-checkboxes form-check-input row-checkbox {{ $user->employee->payrolcheck() ? 'enable' : 'disabled' }}"
                                            value="{{ $user->employee->id }}"{{ $user->employee->payrolcheck() ? 'enable' : 'disabled' }}>
                                    </td>
                                    <td class="sorting_1"><span class="fw-medium">{{ $user->name }}</span></td>
                                    <td class=""><span class="text-nowrap">{{ now()->format('M Y') }}</span></td>

                                    <td class="text-nowrap">
                                        <h6 class="mb-0 w-px-100">Rp <span
                                                class="numberin">{{ $user->employee->gajicount()->total }}</span>
                                        </h6>
                                    </td>
                                    <td><span
                                            class="badge px-2 {{ $user->employee->payrolcheck() ? 'bg-label-info' : 'bg-label-danger' }}"
                                            text-capitalized="">{{ $user->employee->payrolcheck() ? 'Ready' : 'Not ready' }}
                                            to
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
<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs nav-fill" role="tablist">
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-home" aria-controls="navs-justified-home" aria-selected="true"><i
                    class="tf-icons bx bx-home me-1"></i> Home <span
                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-label-danger ms-1">3</span></button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-profile" aria-controls="navs-justified-profile" aria-selected="false"
                tabindex="-1"><i class="tf-icons bx bx-user me-1"></i> Profile</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-messages" aria-controls="navs-justified-messages"
                aria-selected="false" tabindex="-1"><i class="tf-icons bx bx-message-square me-1"></i>
                Messages</button>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active show" id="navs-justified-home" role="tabpanel">
            <p>
                Icing pastry pudding oat cake. Lemon drops cotton candy caramels cake caramels sesame snaps powder. Bear
                claw
                candy topping.
            </p>
            <p class="mb-0">
                Tootsie roll fruitcake cookie. Dessert topping pie. Jujubes wafer carrot cake jelly. Bonbon jelly-o
                jelly-o ice
                cream jelly beans candy canes cake bonbon. Cookie jelly beans marshmallow jujubes sweet.
            </p>
        </div>
        <div class="tab-pane fade" id="navs-justified-profile" role="tabpanel">
            <p>
                Donut dragée jelly pie halvah. Danish gingerbread bonbon cookie wafer candy oat cake ice cream. Gummies
                halvah
                tootsie roll muffin biscuit icing dessert gingerbread. Pastry ice cream cheesecake fruitcake.
            </p>
            <p class="mb-0">
                Jelly-o jelly beans icing pastry cake cake lemon drops. Muffin muffin pie tiramisu halvah cotton candy
                liquorice caramels.
            </p>
        </div>
        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel">
            <p>
                Oat cake chupa chups dragée donut toffee. Sweet cotton candy jelly beans macaroon gummies cupcake gummi
                bears
                cake chocolate.
            </p>
            <p class="mb-0">
                Cake chocolate bar cotton candy apple pie tootsie roll ice cream apple pie brownie cake. Sweet roll
                icing
                sesame snaps caramels danish toffee. Brownie biscuit dessert dessert. Pudding jelly jelly-o tart brownie
                jelly.
            </p>
        </div>
    </div>
</div>
