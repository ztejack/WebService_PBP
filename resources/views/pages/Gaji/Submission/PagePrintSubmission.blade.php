@extends('layouts.print')

@section('content')
    <div class="table-wrapper">
        <div>
            <h2 class="card-header">Pengajuan Gaji <span class="text-info">{{ $payroll->payroll->format('d-m-Y') }}</span>
            </h2>
            <h5>Pengajuan :
                {{ $payroll->name }}
            </h5>
            <div class="divider">
                <div class="divider-text">
                    Data Gaji
                </div>
            </div>
        </div>
        <table class="fl-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Total Gaji</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payroll->gajislip as $slip)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $slip->employee->getUserNameAttribute() }}</td>
                        <td>Rp <span class="numberin">{{ $slip->total }}</span></td>

                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td class="text-end fw-bold">Total :</td>
                    <td class="fw-bold">Rp <span class="numberin">{{ $payroll->total }}</span></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
