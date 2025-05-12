{{-- filepath: c:\IT9_LARAVEL\resources\views\medicine\edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Medicine')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Medicine</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('medicine.update', $medicine->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="medicine_name">Medicine Name</label>
                            <input type="text" name="medicine_name" id="medicine_name" class="form-control" value="{{ old('medicine_name', $medicine->medicine_name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="packing">Packing</label>
                            <input type="text" name="packing" id="packing" class="form-control" value="{{ old('packing', $medicine->packing) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="generic_name">Generic Name</label>
                            <input type="text" name="generic_name" id="generic_name" class="form-control" value="{{ old('generic_name', $medicine->generic_name) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ old('expiry_date', $medicine->expiry_date) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="supplier_id">Supplier</label>
                            <select name="supplier_id" id="supplier_id" class="form-control" required>
                                <option value="">Select Supplier</option>
                                @foreach(App\Models\Supplier::all() as $supplier)
                                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $medicine->supplier_id) == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Stocks</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $medicine->quantity) }}" required>
                        </div>

                        <div class="form-group">
                            <label for="rate">Rate</label>
                            <input type="number" step="0.01" name="rate" id="rate" class="form-control" value="{{ old('rate', $medicine->rate) }}" required>
                        </div>

                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('medicines.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection