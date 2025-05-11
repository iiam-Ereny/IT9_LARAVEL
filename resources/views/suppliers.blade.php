@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')
    <div class="container-fluid bg-light py-3 mb-4 border-bottom">
        <div class="container">
            <div class="d-flex align-items-center">
                <i class="fas fa-users fa-2x text-primary mr-3"></i>
                <div>
                    <h1 class="h4 mb-0 font-weight-bold">Manage Suppliers</h1>
                    <p class="text-muted mb-0">Manage Existing Suppliers</p>
                    <hr class="mt-3 mb-0" style="border-top: 2px solid #30AEDE;">
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 form-group form-inline">
                <label class="font-weight-bold">Search : </label>
                <input type="text" class="form-control mr-2" id="by_name" placeholder="By Supplier Name">
                <button class="btn btn-primary font-weight-bold" data-toggle="modal" data-target="#addSupplierModal">
                    <i class="fas fa-plus"></i> Add Supplier
                </button>
            </div>

            <div class="col-md-12">
                <hr class="col-md-12" style="padding: 0px; border-top: 2px solid #02b6ff;">
            </div>

            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ID</th>
                            <th style="width: 25%;">Supplier Name</th>
                            <th style="width: 15%;">Email</th>
                            <th style="width: 20%;">Contact Number</th>
                            <th style="width: 20%;">Address</th>
                            <th style="width: 10%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->id }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td>{{ $supplier->contact_number }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td class="d-flex justify-content-between">
                                    <!-- Edit Button -->
                                    <button class="btn btn-sm btn-warning btn-action mr-1" data-toggle="modal" data-target="#editSupplierModal{{ $supplier->id }}">
                                        Edit
                                    </button>

                                    <!-- Delete Button -->
                                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this supplier?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger btn-action text-white">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Supplier Modal -->
    <div class="modal fade" id="addSupplierModal" tabindex="-1" role="dialog" aria-labelledby="addSupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('suppliers.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSupplierModalLabel">Add New Supplier</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Supplier Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter supplier name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email address" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" placeholder="Enter contact number" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" rows="3" placeholder="Enter address" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Supplier Modal -->
    @foreach ($suppliers as $supplier)
        <div class="modal fade" id="editSupplierModal{{ $supplier->id }}" tabindex="-1" role="dialog" aria-labelledby="editSupplierModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="{{ route('suppliers.update', $supplier->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title" id="editSupplierModalLabel">Edit Supplier</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Supplier Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $supplier->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $supplier->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_number">Contact Number</label>
                                <input type="text" class="form-control" name="contact_number" value="{{ $supplier->contact_number }}" required>
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" rows="3" required>{{ $supplier->address }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('styles')
    <style>
        /* Ensure buttons have consistent sizes */
        .btn-action {
            min-width: 100px;
            padding: 6px 10px;
            text-align: center;
        }
    </style>
@endsection
