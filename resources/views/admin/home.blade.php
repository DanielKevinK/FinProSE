@extends('admin/components/layout')

@section('page-title', 'Home')

@section('content')
<!-- Page layout -->
@if (auth()->user()->role == 'admin')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">Home</h4>
  </div>
  <div class="card-body">
    <div class="card-text">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus eum maiores eligendi illo at ducimus facilis blanditiis, totam beatae eaque quo. Expedita est aperiam voluptates dicta. Minus, exercitationem commodi? Perspiciatis!
    </div>
  </div>
</div>
@elseif (auth()->user()->role == 'investor')
<div class="row match-height">
  <!-- Statistics Card -->
  <div class="col-xl-12 col-md-12 col-12">
    <div class="card card-statistics">
      <div class="card-header">
        <h4 class="card-title">Statistics</h4>
      </div>
      <div class="card-body statistics-body">
        <div class="row">
          <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
            <div class="media row">
              <div class="avatar bg-light-danger mr-2 col-2">
                <div class="avatar-content">
                  <i data-feather="box" class="avatar-icon"></i>
                </div>
              </div>
              <div class="media-body my-auto col-10">
                <p class="card-text font-small-3 mb-0">Products</p>
                <h4 class="font-weight-bolder mb-0">{{ $investment[0]['product'] }}</h4>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
            <div class="media row">
              <div class="avatar bg-light-info mr-2 col-2">
                <div class="avatar-content">
                  <i data-feather="user" class="avatar-icon"></i>
                </div>
              </div>
              <div class="media-body my-auto col-10">
                <p class="card-text font-small-3 mb-0">Commission</p>
                <h4 class="font-weight-bolder mb-0">{{ $investment[0]['commission'] }}%</h4>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
            <div class="media row">
              <div class="avatar bg-light-primary mr-2 col-2">
                <div class="avatar-content">
                  <i data-feather="trending-up" class="avatar-icon"></i>
                </div>
              </div>
              <div class="media-body my-auto col-10">
                <p class="card-text font-small-3 mb-0">Quantity</p>
                <h4 class="font-weight-bolder mb-0">{{ $investment[0]['quantity'] }}</h4>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 col-12">
            <div class="media row">
              <div class="avatar bg-light-success mr-2 col-2">
                <div class="avatar-content">
                  <i data-feather="dollar-sign" class="avatar-icon"></i>
                </div>
              </div>
              <div class="media-body my-auto col-10">
                <p class="card-text font-small-3 mb-0">Income</p>
                <h4 class="font-weight-bolder mb-0">Rp. {{ $investment[0]['income'] }}</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Statistics Card -->
</div>
@endif
<!--/ Page layout -->
@endsection
<script>
  var userRole = "{{ auth()->user()->role }}";
  console.log(userRole)
  if (userRole == 'user') {
    window.location.href = "/";
  }
</script>