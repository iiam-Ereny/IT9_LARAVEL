@extends('layouts.app')

@section('title', 'Edit Medicine')

@section('content')
<div class="container mt-4">
    <h2>Edit Medicine</h2>
    <form method="POST" action="{{ route('medicine.update', $medicine->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="medicine_name">Medicine Name</label>
            <input type="text" name="medicine_name" class="form-control" value="{{ $medicine->medicine_name }}" required>
        </div>

        <div class="form-group">
            <label for="packing">Packing</label>
            <input type="text" name="packing" class="form-control" value="{{ $medicine->packing }}" required>
        </div>

        <div class="form-group">
            <label for="generic_name">Generic Name</label>
            <input type="text" name="generic_name" class="form-control" value="{{ $medicine->generic_name }}" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Expiry Date</label>
            <input type="date" name="expiry_date" class="form-control" value="{{ \Carbon\Carbon::parse($medicine->expiry_date)->format('Y-m-d') }}" required>
        </div>

        <div class="form-group">
            <label for="supplier_id">Supplier</label>
            <select name="supplier_id" class="form-control" required>
                @foreach(App\Models\Supplier::all() as $supplier)
                    <option value="{{ $supplier->id }}" {{ $supplier->id == $medicine->supplier_id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $medicine->quantity }}" required>
        </div>

        <div class="form-group">
            <label for="rate">Rate</label>
            <input type="number" step="0.01" name="rate" class="form-control" value="{{ $medicine->rate }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Medicine</button>
        <a href="{{ route('medicine.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
