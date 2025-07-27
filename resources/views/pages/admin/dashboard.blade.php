@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
    </a> --}}
</div>



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            
            <div class="bg-white shadow-sm p-3 mb-4 border-start border-primary border-5">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-2">
                        <div class="text-primary text-uppercase fw-bold mb-1">
                            <small>Skill yang di miliki</small>
                        </div>
                        <div class="h5 mb-0 fw-bold text-dark">Rp 65.000.000</div>
                    </div>
                    <div class="ms-auto">
                        <i class="fas fa-calendar fa-2x text-body-tertiary"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm p-3 mb-4 border-start border-success border-5">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 me-2">
                        <div class="text-success text-uppercase fw-bold mb-1">
                            <small>Project yang sudah di buat</small>
                        </div>
                        <div class="h5 mb-0 fw-bold text-dark">Rp 815.000.000</div>
                    </div>
                    <div class="ms-auto">
                        <i class="fas fa-dollar-sign fa-2x text-body-tertiary"></i>
                    </div>
                </div>
            </div>

@endsection

@push('scripts')
<script src="{{ asset('frontend/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('frontend/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('frontend/js/demo/chart-pie-demo.js') }}"></script>
@endpush