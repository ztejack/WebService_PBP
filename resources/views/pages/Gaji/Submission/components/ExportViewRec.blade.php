<table>
    <thead>
        {{-- <tr>
            <th>Nama Pengaju</th>
            <th>{{ $collection->name }}</th>
            <th></th>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td>{{ $collection->payroll->format('d-m-Y') }}</td>
            <td></td>
        </tr>
        <tr>
            <td>Total Gaji Diajukan</td>
            <td>{{ $collection->total }}</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr> --}}
        <tr>
            <td>Tanggal</td>
            <td>{{ $collection->payroll->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td style="background-color: #696cff">No</td>
            <td style="background-color: #696cff">Nama</td>
            <td style="background-color: #696cff">Golongan</td>
            <td style="background-color: #696cff">Jabatan</td>
            <td style="background-color: #696cff">Status (K)</td>

            <td style="background-color: #696cff">Jumlah</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection->gajislip as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="x">{{ $item->name }}</td>
                <td>{{ $item->golongan }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->status_keluarga }}</td>

                <td>{{ $item->total }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="background-color: #696cff; height: 25px; vertical-align: middle">Total</td>
            <td></td>
            {{-- <td>{{ $collection->total }}</td> --}}
            {{-- <td>{{ $collection->gajislip->where('type', '!=', 'DIREKSI')->where('type', '!=', 'KOMISARIS') ? '=SUM(X3:X' . (count($items) + 1) . ')' : '0' }}
            </td> --}}
        </tr>
    </tbody>
</table>
