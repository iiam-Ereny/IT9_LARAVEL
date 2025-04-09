@extends('layouts.app') 
@section('title', 'Suppliers')

@section('content')
    <!-- Header Section -->
    <div class="container-fluid bg-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Left Side: Icon, Title, and Subtitle -->
                <div class="d-flex align-items-center">
                    <i class="fas fa-users fa-lg text-dark mr-3"></i> 
                    <div>
                        <h1 class="h4 mb-0 font-weight-bold text-dark">Manage Supplier</h1>
                        <p class="text-muted mb-0">Manage Existing Supplier</p>
                    </div>
                </div>
            </div>
            <hr class="mt-3 mb-0" style="border-top: 2px solid #30AEDE;">
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-12 form-group form-inline">
                <label class="font-weight-bold" for="">Search : </label>
                <input type="text" class="form-control" id="" placeholder="Search Supplier">
                 <button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addSupplierModal">
                    <i class="fas fa-plus"></i> Add Supplier
                </button>
            </div>

            <div class="col col-md-12">
                <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #30AEDE;">
            </div>

            <div class="col col-md-12 table-responsive">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 10%;">ID</th>
                                <th style="width: 20%;">Name</th>
                                <th style="width: 15%;">Email</th>
                                <th style="width: 15%;">Contact Number</th>
                                <th style="width: 20%;">Address</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody id="suppliers_div">
                            <tr>
                                <td colspan="6" class="text-center text-muted">No data available</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Supplier Modal -->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplierModalLabel">Add New Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form fields for adding a supplier -->
                    <form>
                        <div class="form-group">
                            <label for="supplierName">Name</label>
                            <input type="text" class="form-control" id="supplierName" placeholder="Enter supplier name">
                        </div>
                        <div class="form-group">
                            <label for="supplierEmail">Email</label>
                            <input type="email" class="form-control" id="supplierEmail" placeholder="Enter supplier email">
                        </div>
                        <div class="form-group">
                            <label for="supplierContact">Contact Number</label>
                            <input type="text" class="form-control" id="supplierContact" placeholder="Enter contact number">
                        </div>
                        <div class="form-group">
                            <label for="supplierAddress">Address</label>
                            <textarea class="form-control" id="supplierAddress" rows="3" placeholder="Enter supplier address"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Supplier</button>
                </div>
            </div>
        </div>
    </div>
@endsection