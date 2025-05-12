@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
  <div class="container">
    <!-- Header Section -->
    <div class="row">
      <div class="col-12">
        <h3 class="mt-4 mb-3">Dashboard <small class="text-muted">Home</small></h3>
      </div>
    </div>
    <!-- End Header Section -->

    <!-- Stats Section -->
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
        <div class="dashboard-stats">
          <a class="text-dark text-decoration-none" href="#">
            <span class="h4">0</span>
            <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
            <div class="small font-weight-bold">Total Customer</div>
          </a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
        <div class="dashboard-stats">
          <a class="text-dark text-decoration-none" href="#">
            <span class="h4">0</span>
            <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
            <div class="small font-weight-bold">Total Supplier</div>
          </a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
        <div class="dashboard-stats">
          <a class="text-dark text-decoration-none" href="#">
            <span class="h4">0</span>
            <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
            <div class="small font-weight-bold">Total Medicine</div>
          </a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
        <div class="dashboard-stats">
          <a class="text-dark text-decoration-none" href="#">
            <span class="h4">0</span>
            <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
            <div class="small font-weight-bold">Out of Stock</div>
          </a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
        <div class="dashboard-stats">
          <a class="text-dark text-decoration-none" href="#">
            <span class="h4">0</span>
            <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
            <div class="small font-weight-bold">Expired</div>
          </a>
        </div>
      </div>

      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="padding: 10px">
        <div class="dashboard-stats">
          <a class="text-dark text-decoration-none" href="#">
            <span class="h4">0</span>
            <span class="h6"><i class="fa fa-play fa-rotate-270 text-warning"></i></span>
            <div class="small font-weight-bold">Total Invoice</div>
          </a>
        </div>
      </div>
    </div>
    <!-- End Stats Section -->

    <!-- Today's Report Section -->
    <div class="row mt-4" style="margin-left: 15px;">
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="todays-report">
          <div class="h5">Today's Report</div>
          <table class="table table-bordered table-striped table-hover">
            <tbody>
              <tr>
                <th>Total Sales</th>
                <th class="text-success"></th>
              </tr>
              <tr>
                <th>Total Purchase</th>
                <th class="text-danger"></th>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- End Today's Report Section -->

    <hr style="border-top: 2px solid #30AEDE;">
  </div>
</div>
@endsection
