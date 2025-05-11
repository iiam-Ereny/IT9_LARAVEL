@extends('layouts.app')
@section('title', 'Reports')
@section('content')
    <div class="container">
        <h1>Medicine Monitoring Report</h1>
        <p>Report Generated: {{ $reportDate }}</p>
        <a href="{{ route('reports.download') }}" class="btn btn-primary mb-3">
            <i class="fa-solid fa-file-pdf"></i>
            Download PDF Report
        </a>
        @if($medicines->isEmpty())
            <p>No medicines found.</p>
        @else
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Medicine Name</th>
                            <th>Packing</th>
                            <th>Generic Name</th>
                            <th>Expiry Date</th>
                            <th>Supplier</th>
                            <th>Quantity</th>
                            <th>Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicines as $medicine)
                            <tr>
                                <td>{{ $medicine->medicine_name }}</td>
                                <td>{{ $medicine->packing }}</td>
                                <td>{{ $medicine->generic_name }}</td>
                                <td>{{ $medicine->expiry_date }}</td>
                                <td>{{ $medicine->supplier->name ?? 'N/A' }}</td>
                                <td>{{ $medicine->quantity }}</td>
                                <td>{{ $medicine->rate }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection