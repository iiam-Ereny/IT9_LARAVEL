@extends('layouts.app')

@section('title', 'Sales')

@section('content')
    <!-- Header Section -->
    <div class="container-fluid bg-light py-3 mb-4 border-bottom">
        <div class="container">
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <i class="fas fa-chart-line fa-2x text-primary mr-3"></i>
                <!-- Title and Subtitle -->
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
                <div class="table-responsive">  
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 1%;">ID</th>
                                <th style="width: 14%;">Invoice Number</th>
                                <th style="width: 14%;">Medicine Name</th>
                                <th style="width: 14%;">Generic Name</th>
                                <th style="width: 15%;">Sale Date</th>
                                <th style="width: 15%;">Quantity</th>
                                <th style="width: 15%;">Total Amount</th>
                                <th style="width: 10%;">Payment Status</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="9" class="text-center text-muted">No data available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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

                <form>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- Invoice Number -->
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Invoice Number</label>
                                    <input type="text" class="form-control" placeholder="Enter invoice number">
                                </div>

                                <!-- Customer Name -->
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Medicine Name</label>
                                    <input type="text" class="form-control" placeholder="Enter medicine name">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Generic Name</label>
                                    <input type="text" class="form-control" placeholder="Enter generic name">
                                </div>

                                <!-- Sale Date -->
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Sale Date</label>
                                    <input type="date" class="form-control">
                                </div>

                                <!-- Total Amount -->
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Quantity</label>
                                    <input type="number" class="form-control" placeholder="Enter total Qantity">
                                </div>

                                <!-- Payment Status -->
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">Payment Status</label>
                                    <select class="form-control">
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
