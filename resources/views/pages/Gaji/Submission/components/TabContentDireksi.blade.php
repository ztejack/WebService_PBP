 <div class="card-body">
     <form action="{{ route('submission.store_direksi') }}" method="POST">
         @method('POST')
         @csrf
         <div class="col mb-4">
             <label class="form-label" for="bs-datepicker-autoclose-direksi">Date</label>
             <div class="input-group">
                 <input type="text" class="add-on form-control form-control-sm" id="bs-datepicker-autoclose-direksi"
                     data-date-format="dd-mm-yyyy" aria-describedby="bs-datepicker-autoclose-direksi"
                     value="{{ now()->format('Y-m-d') }}" name="date">
                 <span class="input-group-text"><i class="bx bx-calendar"></i></span>
             </div>
         </div>

         <div class="divider divider-info">
             <div class="divider-text">
                 Gaji Direksi
             </div>
         </div>
         <div class="card-datatable ">
             <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                 <table
                     class="dt-scrollableTable datatables-order table-sm table border-top dataTable
                 no-footer dtr-column collapsed table-display"
                     aria-describedby="DataTables_Table_0_info" data-page-length='25'>
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
                         @foreach ($userdireksis as $user)
                             <tr>
                                 <td class="control">{{ $loop->iteration }}</td>
                                 <td class="dt-checkboxes-cell">
                                     <input type="checkbox" name="submisiions[]"
                                         class="dt-checkboxes form-check-input row-checkbox {{ $user->employee->payrolcheck() ? 'enable' : 'disabled' }}"
                                         value="{{ $user->employee->id }}"{{ $user->employee->payrolcheck() ? 'enable' : 'disabled' }}>
                                 </td>
                                 <td class="sorting_1 "><span class="fw-medium text-nowrap">{{ $user->name }}</span>
                                 </td>
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
                                 </td>
                                 <td>
                                     <div class="text-nowrap">
                                         <a href="{{ route('page_gaji_employe', $user->slug) }}"
                                             class="btn btn-primary btn-sm">
                                             Detail
                                         </a>
                                         <button type="button" class="btn btn-sm btn-dribbble" data-bs-toggle="modal"
                                             data-bs-target="#addRapelModal{{ $user->slug }}">
                                             Rapel
                                         </button>
                                     </div>
                                     {{-- @include('pages.Gaji.components.ModalAddRapel') --}}

                                 </td>
                         @endforeach
                     </tbody>
                 </table>
             </div>
         </div>
         <button type="submit" class="btn btn-primary">Send</button>
     </form>
 </div>