@extends('layouts.app')
@section('title', 'Settings')

@section('content')
    <!-- Header Section -->
    <div class="container-fluid bg-white py-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <!-- Left Side: Icon, Title, and Subtitle -->
                <div class="d-flex align-items-center">
                    <i class="fas fa-cogs fa-lg text-dark mr-3"></i> 
                    <div>
                        <h1 class="h4 mb-0 font-weight-bold text-dark">Settings</h1>
                        <p class="text-muted mb-0">Set User and Password</p>
                    </div>
                </div>
            </div>
            <hr class="mt-3 mb-0" style="border-top: 2px solid #30AEDE;">
        </div>
    </div>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Username Field -->
                <div class="form-group">
                    <label class="font-weight-bold">Username</label>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Enter username">
                    <code id="username_error" class="text-danger small font-weight-bold float-right mb-2" style="display: none;"></code>
                </div>

                <!-- Password Change UI (No functionality) -->
                <div class="form-group">
                    <label class="font-weight-bold">Old Password</label>
                    <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Old password">
                    <code id="old_password_error" class="text-danger small font-weight-bold float-right mb-2" style="display: none;"></code>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">New Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="New password">
                    <code id="password_error" class="text-danger small font-weight-bold float-right mb-2" style="display: none;"></code>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm password">
                    <code id="confirm_password_error" class="text-danger small font-weight-bold float-right mb-2" style="display: none;"></code>
                </div>

                <div class="form-group d-flex justify-content-between">
                    <button class="btn btn-warning font-weight-bold">Reset Password</button>
                </div>
            </div>
        </div>
        <hr style="border-top: 2px solid #30AEDE;">
    </div>
@endsection
