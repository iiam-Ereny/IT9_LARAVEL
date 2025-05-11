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
             <input type="text" class="form-control" id="by_customer_name" placeholder="By Customer Name">
             <label class="font-weight-bold">By Sale Date : </label>
            <input type="date" class="form-control" id="by_sale_date">
             
            <select class="form-control">
                <option value="DUE">DUE</option>
                <option value="PAID">PAID</option>
            </select>
             <button class="btn btn-success font-weight-bold mr-2">
                <i class="fas fa-sync"></i>
            </button>
            <button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addSaleModal">
                <i class="fas fa-plus mr-1"></i> Add Sale
            </button>
        </div>

        <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #02b6ff;">
        </div>

        <div class="col col-md-12 table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Invoice Number</th>
                        <th>Medicine Name</th>
                        <th>Generic Name</th>
                        <th>Sale Date</th>
                        <th>Quantity</th>
                        <th>Total Amount</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($sales->isEmpty())
                        <tr>
                            <td colspan="9" class="text-center text-muted">No data available</td>
                        </tr>
                    @else
                        @foreach($sales as $sale)
                            <tr>
                                <td>{{ $sale->id }}</td>
                                <td>{{ $sale->invoice_number }}</td>
                                <td>{{ $sale->medicine_name }}</td>
                                <td>{{ $sale->generic_name }}</td>
                                <td>{{ $sale->sale_date }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>₱{{ number_format($sale->quantity * 50, 2) }}</td>
                                <td>{{ $sale->payment_status }}</td>
                                <td class="d-flex justify-content-between">
                                    <!-- Edit Button -->
                                    <button class="btn btn-sm btn-warning btn-action mr-1" data-toggle="modal" data-target="#editSaleModal{{ $sale->id }}">
                                        Edit
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this sale?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-action text-white">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Sale Modal -->
                            <div class="modal fade" id="editSaleModal{{ $sale->id }}" tabindex="-1" role="dialog" aria-labelledby="editSaleModalLabel{{ $sale->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content shadow-lg border-0">
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class="modal-title font-weight-bold">
                                                <i class="fas fa-edit mr-2"></i> Edit Sale
                                            </h5>
                                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form method="POST" action="{{ route('sales.update', $sale->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="font-weight-bold">Invoice Number</label>
                                                            <input type="text" class="form-control" name="invoice_number" value="{{ $sale->invoice_number }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="font-weight-bold">Medicine Name</label>
                                                            <input type="text" class="form-control" name="medicine_name" value="{{ $sale->medicine_name }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="font-weight-bold">Generic Name</label>
                                                            <input type="text" class="form-control" name="generic_name" value="{{ $sale->generic_name }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="font-weight-bold">Sale Date</label>
                                                            <input type="date" class="form-control" name="sale_date" value="{{ $sale->sale_date }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="font-weight-bold">Quantity</label>
                                                            <input type="number" class="form-control" name="quantity" value="{{ $sale->quantity }}">
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="font-weight-bold">Payment Status</label>
                                                            <select class="form-control" name="payment_status">
                                                                <option value="PAID" {{ $sale->payment_status == 'PAID' ? 'selected' : '' }}>PAID</option>
                                                                <option value="DUE" {{ $sale->payment_status == 'DUE' ? 'selected' : '' }}>DUE</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer bg-light">
                                                <button type="submit" class="btn btn-warning font-weight-bold">
                                                    <i class="fas fa-save mr-1"></i> Update Sale
                                                </button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
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

            <form method="POST" action="{{ route('sales.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Invoice Number</label>
                                <input type="text" class="form-control" name="invoice_number" placeholder="Enter invoice number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Medicine Name</label>
                                <input type="text" class="form-control" name="medicine_name" placeholder="Enter medicine name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Generic Name</label>
                                <input type="text" class="form-control" name="generic_name" placeholder="Enter generic name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Sale Date</label>
                                <input type="date" class="form-control" name="sale_date">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Quantity</label>
                                <input type="number" class="form-control" name="quantity" placeholder="Enter total quantity">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="font-weight-bold">Payment Status</label>
                                <select class="form-control" name="payment_status">
                                    <option value="PAID">PAID</option>
                                    <option value="DUE">DUE</option>
                                </select>
                            </div>
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
@endsection
