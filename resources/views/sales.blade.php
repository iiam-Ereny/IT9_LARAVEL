@extends('layouts.app')

@section('title', 'Sales')

@section('content')
<!-- Header Section -->
<div class="container-fluid bg-light py-3 mb-4 border-bottom">
    <div class="container">
        <div class="d-flex align-items-center">
            <i class="fas fa-chart-line fa-2x text-primary mr-3"></i>
            <div>
                <h1 class="h4 mb-0 font-weight-bold">Manage Sales</h1>
                <p class="text-muted mb-0">Manage Existing Sales</p>
                <hr class="mt-3 mb-0" style="border-top: 2px solid #30AEDE;">
            </div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-md-12 form-group form-inline">
            <label class="font-weight-bold">Search : </label>
            <input type="number" class="form-control" id="by_invoice_number" placeholder="By Invoice Number">
             <label class="font-weight-bold">By Sale Date : </label>
            <input type="date" class="form-control" id="by_sale_date">
             
            <button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addSaleModal">
                <i class="fas fa-plus mr-1"></i> Add Sale
            </button>
        </div>

        <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #02b6ff;">
        </div>

        @if(session('success'))
            <div class="alert alert-success col-md-12">
                {{ session('success') }}
            </div>
        @endif

        <div class="col col-md-12 table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Invoice Number</th>
                        <th class="text-center">Medicine Name</th>
                        <th class="text-center">Generic Name</th>
                        <th class="text-center">Sale Date</th>
                        <th class="text-center">Quantity</th>
                        <th class="text-center">Total Amount</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sales as $sale)
                        <tr>
                            <td class="text-center">{{ $sale->invoice_number }}</td>
                            <td class="text-center">{{ $sale->medicine_name }}</td>
                            <td class="text-center">{{ $sale->generic_name }}</td>
                            <td class="text-center">{{ $sale->sale_date }}</td>
                            <td class="text-center">{{ $sale->quantity }}</td>
                            <td class="text-center">{{ number_format($sale->total_amount, 2) }}</td>
                            <td class="text-center">
                                <!-- Future: Edit/Delete Buttons -->
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Sale Modal -->
<div class="modal fade" id="addSaleModal" tabindex="-1" role="dialog" aria-labelledby="addSaleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title font-weight-bold" id="addSaleModalLabel">
                    <i class="fas fa-plus mr-2"></i> Add New Sale
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('sales.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Invoice Number</label>
                                <input type="text" name="invoice_number" class="form-control" placeholder="Enter invoice number" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Medicine Name</label>
                                <select name="medicine_id" id="medicine_id" class="form-control" required>
                                    <option value="">Select Medicine</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Generic Name</label>
                                <input type="text" name="generic_name" class="form-control" placeholder="Enter generic name" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Sale Date</label>
                                <input type="date" name="sale_date" class="form-control" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Quantity</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Enter total quantity" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Total Amount</label>
                                <input type="number" name="total_amount" class="form-control" placeholder="Enter total amount" required>

                        </div>
                    </div>
                </div>

                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-primary font-weight-bold">
                        <i class="fas fa-save mr-1"></i> Save Sale
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const medicines = @json($medicines);

    document.addEventListener('DOMContentLoaded', function () {
        const medicineSelect = document.getElementById('medicine_id');

        medicines.forEach(medicine => {
            const option = document.createElement('option');
            option.value = medicine.id; // use ID here
            option.textContent = medicine.medicine_name; // show name to user
            medicineSelect.appendChild(option);
        });

        // Optional: auto-fill generic name
        const genericInput = document.querySelector('input[name="generic_name"]');
        medicineSelect.addEventListener('change', function () {
            const selected = medicines.find(m => m.id == this.value);
            if (selected) {
                genericInput.value = selected.generic_name;
            } else {
                genericInput.value = '';
            }
        });
    });
</script>

@endsection