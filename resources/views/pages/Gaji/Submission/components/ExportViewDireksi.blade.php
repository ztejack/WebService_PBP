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
            <td style="background-color: #696cff">Tunjangan Perumahan</td>
            <td style="background-color: #696cff">UBP</td>
            <td style="background-color: #696cff">SIMMODE1</td>
            <td style="background-color: #696cff">DPBA</td>
            <td style="background-color: #696cff">Rapel</td>
            <td style="background-color: #696cff">T.BPJS TK</td>
            <td style="background-color: #696cff">T.BPJS JKM</td>
            <td style="background-color: #696cff">T.BPJS JHT</td>
            <td style="background-color: #696cff">T.BPJS JP</td>
            <td style="background-color: #696cff">T.BPJS KES</td>
            <td style="background-color: #696cff">Tunjangan Pajak</td>
            <td style="background-color: #696cff">Tunjangan Lain</td>

            <td style="background-color: #696cff">SPBA</td>
            <td style="background-color: #696cff">Potongan Lazis</td>
            <td style="background-color: #696cff">Potongan DPBA</td>
            <td style="background-color: #696cff">Potongan SIMMODE 1</td>
            <td style="background-color: #696cff">Potongan KOPERASI</td>
            <td style="background-color: #696cff">POT.BPJS TK</td>
            <td style="background-color: #696cff">POT.BPJS JKM</td>
            <td style="background-color: #696cff">POT.BPJS JHT</td>
            <td style="background-color: #696cff">POT.BPJS JP</td>
            <td style="background-color: #696cff">POT.BPJS KES</td>
            <td style="background-color: #696cff">Potongan Pajak</td>
            <td style="background-color: #696cff">Potongan Lain</td>
            <td style="background-color: #696cff">Jumlah</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($collection->gajislip->where('type', 'DIREKSI') as $item)
            <tr>
                <td style="text-align: center">{{ $loop->iteration }}</td>
                <td class="x">{{ $item->name }}</td>
                <td>{{ $item->golongan }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->status_keluarga }}</td>

                <td>{{ $item->gapok }}</td>
                <td>{{ $item->tnj_jabatan }}</td>
                <td>{{ $item->tnj_perumahan }}</td>
                <td>{{ $item->tnj_bantuan_perumahan }}</td>

                <td>{{ $item->tnj_simmode }}</td>
                <td>{{ $item->tnj_dana_pensiun }}</td>

                <td>{{ $item->rapel }}</td>

                <td>{{ $item->tnj_bpjs_tk }}</td>
                <td>{{ $item->tnj_bpjs_jkm }}</td>
                <td>{{ $item->tnj_bpjs_jht }}</td>
                <td>{{ $item->tnj_bpjs_jp }}</td>
                <td>{{ $item->tnj_bpjs_kes }}</td>
                <td>{{ $item->tnj_pajak }}</td>
                <td>{{ $item->tnj_lain }}</td>

                <td>{{ $item->pot_serikat_pegawai_ba }}</td>
                <td>{{ $item->pot_lazis }}</td>
                <td>{{ $item->pot_dana_pensiun }}</td>
                <td>{{ $item->pot_simmode }}</td>
                <td>{{ $item->pot_koperasi }}</td>

                <td>{{ $item->pot_bpjs_tk }}</td>
                <td>{{ $item->pot_bpjs_jkm }}</td>
                <td>{{ $item->pot_bpjs_jht }}</td>
                <td>{{ $item->pot_bpjs_jp }}</td>
                <td>{{ $item->pot_bpjs_kes }}</td>

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
