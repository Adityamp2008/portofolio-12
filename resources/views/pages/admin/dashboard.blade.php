@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <!-- Total Project -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Project
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalProject }}
                    </div>
                </div>
                <i class="fas fa-folder fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>

    <!-- Total Skill -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total Skill
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        {{ $totalSkill }}
                    </div>
                </div>
                <i class="fas fa-tools fa-2x text-gray-300"></i>
            </div>
        </div>
    </div>
</div>
@endsection
