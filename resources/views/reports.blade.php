@extends('layouts.app')
@section('title', 'Reports')
@section('content')
    <div class="container">
        <h1>Medicine Stock Reports</h1>
        <a href="{{ route('reports.download') }}" class="btn btn-primary">Download PDF Report</a>
    </div>
@endsection