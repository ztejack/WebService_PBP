<div class="nav-align-top mb-4">
    <ul class="nav nav-tabs nav-fill" role="tablist">
        @foreach ($months as $mont)
            <li class="nav-item" role="presentation">
                <button type="button" class="nav-link {{ now()->format('M') == $mont ? 'active' : '' }}" role="tab"
                    data-bs-toggle="tab" data-bs-target="#navs-justified-{{ $mont }}"
                    aria-controls="navs-justified-{{ $mont }}" aria-selected="false" tabindex="-1">
                    {{ $mont }}</button>
            </li>
        @endforeach
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-trw1" aria-controls="navs-justified-trw1" aria-selected="false"
                tabindex="-1">
                TRW 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-trw2" aria-controls="navs-justified-trw2" aria-selected="false"
                tabindex="-1">
                TRW 2</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-trw3" aria-controls="navs-justified-trw3" aria-selected="false"
                tabindex="-1">
                TRW 3</button>
        </li>
        <li class="nav-item" role="presentation">
            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                data-bs-target="#navs-justified-thr" aria-controls="navs-justified-thr" aria-selected="false"
                tabindex="-1">
                THR</button>
        </li>
    </ul>
    <div class="tab-content">
        @foreach ($months as $mont)
            <div class="tab-pane fade {{ now()->format('M') == $mont ? 'active show' : '' }}"
                id="navs-justified-{{ $mont }}" role="tabpanel">
                <div class="card-datatable ">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <table
                            class="datatables-order table-sm table border-top dataTable no-footer dtr-column collapsed"
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
                                    <th class=" " aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        Name
                                    </th>
                                    <th class="" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        date
                                    </th>
                                    <th class="" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        payment
                                    </th>
                                    <th class="" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        status
                                    </th>
                                    <th class="" aria-controls="DataTables_Table_0" rowspan="1" colspan="1">
                                        attendance
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
                                                class="dt-checkboxes form-check-input row-checkbox {{ $user->employe->payrolcheck() ? 'enable' : 'disabled' }}"
                                                value="{{ $user->employe->id }}"{{ $user->employe->payrolcheck() ? 'enable' : 'disabled' }}>
                                        </td>
                                        <td class="sorting_1"><span class="fw-medium">{{ $user->name }}</span></td>
                                        <td class=""><span
                                                class="text-nowrap">{{ now()->format('M Y') }}</span></td>

                                        <td class="text-nowrap">
                                            <h6 class="mb-0 w-px-100">Rp <span
                                                    class="numberin">{{ $user->employe->gajicount()->total }}</span>
                                            </h6>
                                        </td>
                                        <td><span
                                                class="badge px-2 {{ $user->employe->payrolcheck() ? 'bg-label-info' : 'bg-label-danger' }}"
                                                text-capitalized="">{{ $user->employe->payrolcheck() ? 'Ready' : 'Not ready' }}
                                                to
                                                Payroll</span>
                                        </td>
                                        <td><span
                                                class="badge badge-pill bg-success fw-bold">{{ 24 - $user->absensi }}</span>
                                        </td>
                                        <td class="">
                                            <a href="{{ route('page_gaji_employe', $user->slug) }}"
                                                class="btn btn-primary btn-sm">
                                                Detail
                                            </a>
                                            <button type="button" class="btn btn-sm btn-dribbble"
                                                data-bs-toggle="modal"
                                                data-bs-target="#addLemburModal{{ $user->employe_uuid }}">
                                                Lembur
                                            </button>

                                            <button type="button" class="btn btn-sm btn-warning"
                                                data-bs-toggle="modal"
                                                data-bs-target="#addkehadiranModal{{ $user->slug }}">
                                                Absensi
                                            </button>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="tab-pane fade" id="navs-justified-trw1" role="tabpanel">
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
        <div class="tab-pane fade" id="navs-justified-trw2" role="tabpanel">
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
        <div class="tab-pane fade" id="navs-justified-trw3" role="tabpanel">
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
        <div class="tab-pane fade" id="navs-justified-thr" role="tabpanel">
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
