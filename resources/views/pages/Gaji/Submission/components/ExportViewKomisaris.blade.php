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

            <td style="background-color: #696cff">Gaji Pokok</td>
            <td style="background-color: #696cff">Tunjangan Jabatan</td>
            <td style="background-color: #696cff">UBP</td>
            <td style="background-color: #696cff">Tunjangan Makan</td>
            <td style="background-color: #696cff">Tunjangan Transport</td>
            <td style="background-color: #696cff">Tunjangan Shift</td>
            <td style="background-color: #696cff">Rapel</td>
            <td style="background-color: #696cff">Tunjangan Pajak</td>
            <td style="background-color: #696cff">Tunjangan Lain</td>
            <td style="background-color: #696cff">Potongan Pajak</td>
            <td style="background-color: #696cff">Potongan Lain</td>
            <td style="background-color: #696cff">Jumlah</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection->gajislip->where('type', 'KOMISARIS') as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="x">{{ $item->name }}</td>
                <td>{{ $item->golongan }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->status_keluarga }}</td>

                <td>{{ $item->gapok }}</td>
                <td>{{ $item->tnj_jabatan }}</td>

                <td>{{ $item->tnj_bantuan_perumahan }}</td>
                <td>{{ $item->tnj_makan }}</td>
                <td>{{ $item->tnj_transport }}</td>
                <td>{{ $item->tnj_shift }}</td>

                <td>{{ $item->rapel }}</td>

                <td>{{ $item->tnj_pajak }}</td>
                <td>{{ $item->tnj_lain }}</td>

                <td>{{ $item->pot_pajak }}</td>
                <td>{{ $item->pot_lain }}</td>
                <td>{{ $item->total }}</td>
            </tr>
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="background-color: #696cff; height: 25px; vertical-align: middle">Total</td>
            <td></td>
        </tr>
    </tbody>
</table>
