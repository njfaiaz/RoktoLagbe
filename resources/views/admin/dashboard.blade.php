@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/charts-c3/plugin.css') }}" />

    <style>
        .dashboard-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 20px;
        }

        .card-container {
            flex: 1 1 300px;
            max-width: 100%;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .card-container canvas {
            width: 100% !important;
            max-height: 300px !important;
        }

        @media (max-width: 768px) {
            .card-container {
                max-width: 100%;
            }
        }
    </style>
@endpush

@section('content')
    <div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Dashboard</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a>
                        </li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <h6>All User</h6>
                            <h2>{{ $totalUsers }} <small class="info">of {{ $totalUsers }}</small></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <h6>All Active User</h6>
                            <h2>{{ $activeUserCount }} <small class="info">of {{ $totalUsers }}</small></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <h6>All Inactive User</h6>
                            <h2>{{ $inactiveUserCount }} <small class="info">of {{ $totalUsers }}</small></h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <h6>Profile Complete All User </h6>
                            <h2>{{ $profile }} <small class="info">of {{ $activeUserCount }}</small></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_scroll">

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-container">
                                    <h2>User Chart</h2>
                                    <canvas id="userChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-container">
                                    <h2>Total Blood Group Chart</h2>
                                    <canvas id="bloodGroupChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-container my-3">
                        <h2>Users by District</h2>
                        <canvas id="locationChart"></canvas>
                    </div>

                    <div class="card-container my-3">
                        <h2>Top 10 Blood Donors User-Name</h2>
                        <canvas id="topDonorChart"></canvas>
                    </div>

                    <div class="card-container my-3">
                        <h2>Most Common Blood Group Name</h2>
                        <canvas id="bloodDonationChart"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('footer_scripts')
        <script src="{{ asset('assets/coustom/js/chart.js') }}"></script>
        <script src="{{ asset('assets/coustom/js/api.col.js') }}"></script>
    @endpush
@endsection
