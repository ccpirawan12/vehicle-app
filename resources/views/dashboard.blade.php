@extends('layouts.app')
@section('title', 'dashboard')
@section('content-header', 'Dashboard')
@section('content-action')
@endsection

@section('content_page')

<!-- first row starts here -->
<div class="row">
  <div class="col stretch-card grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="d-flex border-bottom mb-4 pb-2">
          <div class="hexagon">
            <div class="hex-mid hexagon-danger">
              <i class="mdi mdi-car"></i>
            </div>
          </div>
          <div class="pl-4">
            <h4 class="font-weight-bold text-danger mb-0"> {{ $vehicles }} </h4>
            <h6 class="text-muted">Vehicle</h6>
          </div>
        </div>
        <div class="d-flex border-bottom mb-4 pb-2">
          <div class="hexagon">
            <div class="hex-mid hexagon-success">
              <i class="mdi mdi-map-marker"></i>
            </div>
          </div>
          <div class="pl-4">
            <h4 class="font-weight-bold text-success mb-0"> {{ $locations }} </h4>
            <h6 class="text-muted">Location</h6>
          </div>
        </div>
        <div class="d-flex border-bottom mb-4 pb-2">
          <div class="hexagon">
            <div class="hex-mid hexagon-info">
              <i class="mdi mdi-steering"></i>
            </div>
          </div>
          <div class="pl-4">
            <h4 class="font-weight-bold text-info mb-0">{{ $drivers }}</h4>
            <h6 class="text-muted">Driver</h6>
          </div>
        </div>
        <div class="d-flex">
          <div class="hexagon">
            <div class="hex-mid hexagon-primary">
              <i class="mdi mdi-file-document"></i>
            </div>
          </div>
          <div class="pl-4">
            <h4 class="font-weight-bold text-primary mb-0"> {{ $owners }} </h4>
            <h6 class="text-muted mb-0">Owner</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- Bar Chart --}}
  <div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Total Vehicles based on Owner</h4>
        <canvas id="barChart" style="height: 230px;"></canvas>
      </div>
    </div>
  </div>
</div>
<!-- doughnut chart row starts -->
<div class="row">
  <div class="col-sm-12 stretch-card grid-margin">
    <div class="card">
      <div class="row">
{{-- doughnut chart --}}
        <div class="col-md-6">
          <div class="card border-0">
            <div class="card-body">
              <div class="card-title">Vehicle Location</div>
              <div class="d-flex flex-wrap">
                <div class="doughnut-wrapper w-50">
                  <canvas id="doChart1" width="100" height="100"></canvas>
                </div>
                <div id="doughnut-chart-legend1" class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left"></div>
              </div>
            </div>
          </div>
        </div>
{{--  --}}
        {{-- <div class="col-md-6">
          <div class="card border-0">
            <div class="card-body">
              <div class="card-title">Vehicle Status</div>
              <div class="d-flex flex-wrap">
                <div class="doughnut-wrapper w-50">
                  <canvas id="doChart2" width="100" height="100"></canvas>
                </div>
                <div id="doughnut-chart-legend2" class="pl-lg-3 rounded-legend align-self-center flex-grow legend-vertical legend-bottom-left"></div>
              </div>
            </div>
          </div>
        </div> --}}
{{-- end doughnut chart --}}
      </div>
    </div>
  </div>
</div>
<!-- last row starts here -->
<div class="row">
  {{-- <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="card-title mb-2">Upcoming events (3)</div>
        <h3 class="mb-3">23 september 2019</h3>
        <div class="d-flex border-bottom border-top py-3">
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" checked /></label>
          </div>
          <div class="pl-2">
            <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
            <p class="m-0 text-black"> Hey I attached some new PSD files… </p>
          </div>
        </div>
        <div class="d-flex border-bottom py-3">
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" /></label>
          </div>
          <div class="pl-2">
            <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
            <p class="m-0 text-black"> Discuss performance with manager </p>
          </div>
        </div>
        <div class="d-flex border-bottom py-3">
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" /></label>
          </div>
          <div class="pl-2">
            <span class="font-12 text-muted">Tue, Mar 5, 9.30am</span>
            <p class="m-0 text-black">Meeting with Alisa</p>
          </div>
        </div>
        <div class="d-flex pt-3">
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input" /></label>
          </div>
          <div class="pl-2">
            <span class="font-12 text-muted">Mon, Mar 11, 4.30 PM</span>
            <p class="m-0 text-black"> Hey I attached some new PSD files… </p>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  {{-- <div class="col-sm-6 col-xl-4 stretch-card grid-margin">
    <div class="card color-card-wrapper">
      <div class="card-body">
        <img class="img-fluid card-top-img w-100" src="{{asset('assets_plugin_admin/images/dashboard/img_5.jpg')}}" alt="" />
        <div class="d-flex flex-wrap justify-content-around color-card-outer">
          <div class="col-6 p-0 mb-4">
            <div class="color-card primary m-auto">
              <i class="mdi mdi-clock-outline"></i>
              <p class="font-weight-semibold mb-0">Delivered</p>
              <span class="small">15 Packages</span>
            </div>
          </div>
          <div class="col-6 p-0 mb-4">
            <div class="color-card bg-success m-auto">
              <i class="mdi mdi-tshirt-crew"></i>
              <p class="font-weight-semibold mb-0">Ordered</p>
              <span class="small">72 Items</span>
            </div>
          </div>
          <div class="col-6 p-0">
            <div class="color-card bg-info m-auto">
              <i class="mdi mdi-trophy-outline"></i>
              <p class="font-weight-semibold mb-0">Arrived</p>
              <span class="small">34 Upgraded</span>
            </div>
          </div>
          <div class="col-6 p-0">
            <div class="color-card bg-danger m-auto">
              <i class="mdi mdi-presentation"></i>
              <p class="font-weight-semibold mb-0">Reported</p>
              <span class="small">72 Support</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
</div>
@endsection
@include('layouts.partial.chart_script')