<div class="card accordion-item mb-3">
    <h2 class="accordion-header d-flex align-items-center">
        <button type="button" class="accordion-button" data-bs-toggle="collapse"
            data-bs-target="#accordionuser{{ $user->id }}" aria-expanded="false">
            <i class="bx bxs-user-detail me-2"></i>
            {{ $user->name }}
        </button>
    </h2>

    <div id="accordionuser{{ $user->id }}" class="accordion-collapse collapse show" style="">
        <div class="accordion-body">
            <div class="row">
                <div class="col-md-12 col-xl-4">
                    <p class="mb-xl-3 mb-0">Nama User : {{ $user->name }}</p>
                    <p class="mb-xl-3 mb-0">Username : {{ $user->username }}</p>
                    <p class="mb-xl-3 mb-0">Perusahaan : {{ $perusahaan }}

                    </p>
                </div>
                <div class="col-md-12 col-xl-4">
                    <p class="mb-xl-3 mb-0">Level User :
                        {{-- {{ $user->level->level }} --}}
                        @if ($user->level->id == 1)
                            <span class="badge bg-label-danger">ADMIN</span>
                        @elseif($user->level->id == 2)
                            <span class="badge bg-label-info">KASIR</span>
                        @elseif($user->level->id == 3)
                            <span class="badge bg-label-success">USER</span>
                        @endif
                    </p>
                    <p class="mb-xl-3 mb-0">Email : {{ $user->email }}</p>
                    <p class="mb-xl-3 mb-0">Nomor Telepon : {{ $user->phonenumber }}</p>
                </div>
                <div class="col-md-12 col-xl-4">
                    <div class="d-flex justify-content-end  pt-xl-0 pt-3">
                        <a href="" type="button" class="align-self-md-end btn btn-primary buttons-collection">
                            <i class="tf-icons bx bx-edit"></i>
                            <span>
                                &nbsp; Edit
                            </span>
                        </a>
                    </div>

                    {{-- <p class="mb-xl-3 mb-0">Email : {{ $user->email }}</p>
                    <p class="mb-xl-3 mb-0">Nomor Telepon : {{ $user->phonenumber }}</p> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header d-flex justify-content-between flex-md-row  pb-0 row">
        <div class="head-label text-center col-xl-2 col-5 p-0">
            <h5 class="card-title mb-0">Data Tagihan</h5>

        </div>
        <div class="dt-action-buttons text-end p-0 pt-xl-3  col-xl-8 col-7">
            <div class="dt-buttons">
                <button class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2" tabindex="0"
                    aria-controls="DataTables_Table_0" type="button" aria-haspopup="true" aria-expanded="false">
                    <span>
                        <i class="bx bx-export me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Export</span>
                    </span>
                </button>
                <button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0"
                    type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add New Record</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-datatable mt-2">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-responsive text-nowrap">
                <table id="tableTagihan" class="table table-hover display" style="width:100%">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>ID Tagihan</th>
                            <th>Tanggal</th>
                            <th>Nama User</th>
                            <th>Status</th>
                            <th>Total Tagihan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tagihans->where('user_id', $user->id)->where('id', '!=', 1) as $tagihan)
                            @foreach ($transaksis->where('id_pelanggan', $user->id) as $transaksi)
                                @php
                                    $totalByr = 0;
                                @endphp
                                @foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)
                                    @foreach ($detail->produk as $produk)
                                        @php
                                            $total = $detail->qty * $produk->price;
                                            $totalByr += $total;
                                        @endphp
                                    @endforeach
                                @endforeach
                            @endforeach
                            <tr>
                                <td></td>
                                <td>{{ $tagihan->id }}</td>
                                <td>{{ date('d-m-y', strtotime($tagihan->created_at)) }}</td>
                                <td>{{ $tagihan->user->name }}</td>
                                @if ($tagihan->status = 0)
                                    <td>
                                        <span class="badge rounded-pill bg-label-warning">
                                            Belum Lunas
                                        </span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge rounded-pill bg-label-info">
                                            Lunas
                                        </span>
                                    </td>
                                @endif
                                <td>@currency($tagihan->total) </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary">Detail</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>NO</th>
                            <th>ID Tagihan</th>
                            <th>Tanggal</th>
                            <th>Nama User</th>
                            <th>Status</th>
                            <th>Total Tagihan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between flex-md-row pb-0 row">

        <div class="head-label text-center col-xl-2 col-5 p-0">
            <h5 class="card-title mb-0">Data Transaksi</h5>
        </div>
        <div class="dt-action-buttons text-end p-0 pt-xl-3  col-xl-8 col-7">
            <div class="dt-buttons">
                <button class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2" tabindex="0"
                    aria-controls="DataTables_Table_0" type="button" aria-haspopup="true" aria-expanded="false">
                    <span>
                        <i class="bx bx-export me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Export</span>
                    </span>
                </button>
                <button class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0"
                    type="button">
                    <span>
                        <i class="bx bx-plus me-sm-2"></i>
                        <span class="d-none d-sm-inline-block">Add New Record</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="card-datatable mt-2">
        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="table-responsive text-nowrap">
                {{-- <table id="tableTransaksi" class="table table-hover display" style="width:100%">
                    <thead>
                        <tr class="text-nowrap">
                            <th>NO</th>
                            <th>ID Transaksi</th>
                            <th>ID Tagihan</th>
                            <th>Nama User</th>
                            <th>Tanggal Transaksi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transaksis->where('id_pelanggan', $user->id) as $transaksi)
                            @php
                                $totalByr = 0;
                            @endphp
                            @foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)
                                @foreach ($detail->produk as $produk)
                                    @php
                                        $total = $detail->qty * $produk->price;
                                        $totalByr += $total;
                                    @endphp
                                @endforeach
                            @endforeach
                            <tr>
                                <td></td>
                                <td>{{ $transaksi->id }}</td>
                                <td>{{ $transaksi->tagihan->id }}</td>
                                <td>{{ $transaksi->user->name }}</td>
                                <td>{{ $transaksi->created_at }}</td>
                                @if ($transaksi->tagihan->status = 0)
                                    <td>
                                        <span class="badge rounded-pill bg-label-warning">
                                            Belum Lunas
                                        </span>
                                    </td>
                                @else
                                    <td>
                                        <span class="badge rounded-pill bg-label-info">
                                            Lunas
                                        </span>
                                    </td>
                                @endif
                                {{-- <th>{{ }}</th> --}}
                <th>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalTR{{ $transaksi->id }}">
                        Detail
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalTR{{ $transaksi->id }}" tabindex="-1" style="display: none;"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Detail Transaksi
                                        <strong> {{ $transaksi->id }}</strong>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h6 class="modal-title">Tanggal Transaksi :
                                        {{ date('d M Y', strtotime($transaksi->created_at)) }}
                                    </h6>
                                    <hr>
                                    <div class="card-datatable">
                                        <div id="DataTables_Table_0_wrapper"
                                            class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <div class="table-responsive text-nowrap">
                                                <table id="tableDetail" class="display table table-hover w-100">
                                                    <thead>
                                                        <tr class="text-nowrap">
                                                            <th>NO</th>
                                                            <th>Kode Produk</th>
                                                            <th>Nama Produk</th>
                                                            <th>Harga</th>
                                                            <th>Jumlah</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        @foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)
                                                            <tr class="ctn">
                                                                <td></td>
                                                                @foreach ($detail->produk as $produk)
                                                                    <td>{{ $produk->kodePrd }}</td>
                                                                    <td>{{ $produk->namaPrd }}</td>
                                                                    <td>@currency($produk->price)</td>
                                                                @endforeach
                                                                <td>{{ $detail->qty }}</td>
                                                                <td>@currency($total)
                                                                </td>
                                                                {{-- <td>{{ $detail->subtotal }}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-end">
                                                <h4>Total : @currency($totalByr) </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="button" class="btn btn-primary">Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </th>
                </tr>
                {{-- @foreach ($details->where('id_Transaksi', '=', $transaksi->id) as $detail)
                                <tr class="ctn">
                                    <td>{{ $detail->id_Produk }}</td>
                                </tr>
                            @endforeach --}}
                {{-- @endforeach --}}

                {{-- </tbody>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>ID Transaksi</th>
                        <th>ID Tagihan</th>
                        <th>Nama User</th>
                        <th>Tanggal Transaksi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                </table> --}} --}}
            </div>
        </div>
    </div>
</div>
