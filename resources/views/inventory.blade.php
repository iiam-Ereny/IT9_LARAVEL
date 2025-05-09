@extends('layouts.app') {{-- Extending the main layout --}}

@section('title', 'Inventory')

@section('content')
    <div class="container-fluid bg-light py-3 mb-4 border-bottom">
        <div class="container">
            <div class="d-flex align-items-center">
                <i class="fas fa-pills fa-2x text-primary mr-3"></i>
                <div>
                    <h1 class="h4 mb-0 font-weight-bold">Medicines Inventory</h1>
                    <p class="text-muted mb-0">Manage Existing Medicine Inventory</p>
                    <hr class="mt-3 mb-0" style="border-top: 2px solid #30AEDE;">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 form-group form-inline">
                <label class="font-weight-bold">Search : </label>
                <input type="text" class="form-control" id="by_name" placeholder="By Medicine Name">
                <input type="text" class="form-control" id="by_generic_name" placeholder="By Generic Name">
                <input type="text" class="form-control" id="by_suppliers_name" placeholder="By Supplier Name">
                <button class="btn btn-danger font-weight-bold">Out of Stock</button>
                <button class="btn btn-warning font-weight-bold">Expired</button>
                <button class="btn btn-success font-weight-bold"><i class="fas fa-sync"></i></button>
                <button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addMedicineModal">
                    <i class="fas fa-plus"></i> Add Stock
                </button>
            </div>

            <div class="col col-md-12">
                <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #02b6ff;">
            </div>

            <div class="col col-md-12 table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 1%;">ID</th>
                                <th style="width: 14%;">Medicine Name</th>
                                <th style="width: 5%;">Packing</th>
                                <th style="width: 14%;">Generic Name</th>
                                <th style="width: 8%;">Ex. Date (dd/mm/yy)</th>
                                <th style="width: 15%;">Supplier</th>
                                <th style="width: 7%;">Qty.</th>
                                <th style="width: 8%;">Rate</th>
                                <th style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($medicines->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center text-muted">No data available</td>
                                </tr>
                            @else
                                @foreach($medicines as $medicine)
                                    <tr>
                                        <td>{{ $medicine->id }}</td>
                                        <td>{{ $medicine->medicine_name }}</td>
                                        <td>{{ $medicine->packing }}</td>
                                        <td>{{ $medicine->generic_name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($medicine->expiry_date)->format('d/m/y') }}</td>
                                        <td>{{ $medicine->supplier->name ?? 'N/A' }}</td>
                                        <td>{{ $medicine->quantity }}</td>
                                        <td>₱{{ number_format($medicine->rate, 2) }}</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning">Edit</button>
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Medicine Modal -->
    <div class="modal fade" id="addMedicineModal" tabindex="-1" role="dialog" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h5 class="modal-title" id="addMedicineModalLabel">Add New Medicine</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('medicine.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="medicineName">Medicine Name</label>
                            <input type="text" class="form-control" id="medicineName" name="medicine_name" placeholder="Enter medicine name">
                        </div>
                        <div class="form-group">
                            <label for="packing">Packing</label>
                            <input type="text" class="form-control" id="packing" name="packing" placeholder="e.g., Box of 10, Bottle">
                        </div>
                        <div class="form-group">
                            <label for="genericName">Generic Name</label>
                            <input type="text" class="form-control" id="genericName" name="generic_name" placeholder="Enter generic name">
                        </div>
                        <div class="form-group">
                            <label for="expiryDate">Expiry Date</label>
                            <input type="date" class="form-control" id="expiryDate" name="expiry_date">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_id" class="form-label">Supplier</label>
                            <select name="supplier_id" class="form-select">
                                <option value="">Select Supplier</option>
                                @foreach(App\Models\Supplier::all() as $supplier)
                                    <option value="{{ $supplier->id }}" {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                        </div>
                        <div class="form-group">
                            <label for="rate">Rate</label>
                            <input type="number" step="0.01" class="form-control" id="rate" name="rate" placeholder="Enter rate/price">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
