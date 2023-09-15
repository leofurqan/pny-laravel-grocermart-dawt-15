@extends('admin/template')

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <!-- <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div> -->
                </div>
                <span class="fw-semibold d-block mb-1">Products</span>
                <h3 class="card-title mb-2">{{count($products)}}</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <!-- <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div> -->
                </div>
                <span class="fw-semibold d-block mb-1">Categories</span>
                <h3 class="card-title mb-2">{{count($categories)}}</h3>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <!-- <div class="avatar flex-shrink-0">
                        <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                    </div> -->
                </div>
                <span class="fw-semibold d-block mb-1">Orders</span>
                <h3 class="card-title mb-2">0</h3>
            </div>
        </div>
    </div>
</div>

@endsection