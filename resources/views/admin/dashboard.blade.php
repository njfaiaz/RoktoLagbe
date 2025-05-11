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
                            <h2>{{ $totalUsers }} <small class="info">of 1Tb</small></h2>
                            <small>2% higher than last month</small>
                            <div class="progress">
                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="45" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 45%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <h6>All Active User</h6>
                            <h2>{{ $activeUserCount }} <small class="info">of {{ $totalUsers }}</small></h2>
                            <small>6% higher than last month</small>
                            <div class="progress">
                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="38" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 38%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <h6>All Inactive User</h6>
                            <h2>{{ $inactiveUserCount }} <small class="info">of {{ $totalUsers }}</small></h2>
                            <small>Total Registered email</small>
                            <div class="progress">
                                <div class="progress-bar l-purple" role="progressbar" aria-valuenow="39" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 39%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon">
                        <div class="body">
                            <h6>Profile Complete All User </h6>
                            <h2>{{ $profile }} <small class="info">of {{ $activeUserCount }}</small></h2>
                            <small>Total Registered Domain</small>
                            <div class="progress">
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="89" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 89%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="body_scroll">

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>All </strong> District Data</h2>

                                </div>
                                <div class="card-container">
                                    <h2>User Chart</h2>
                                    <h4>Total Users: <span id="totalUsers">Loading...</span></h4>
                                    <canvas id="userChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dashboard-row">
                        <!-- User Chart -->


                        <!-- Users by District -->
                        <div class="card-container">
                            <h2>Users by District</h2>
                            <canvas id="locationChart"></canvas>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('footer_scripts')
        <script src="{{ asset('assets/coustom/js/chart.js') }}"></script>

        <script>
            fetch('/api/dashboard/user-stats')
                .then(response => response.json())
                .then(result => {
                    const total = result.data.reduce((a, b) => a + b, 0);
                    document.getElementById('totalUsers').textContent = total;

                    const ctx = document.getElementById('userChart');
                    new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: result.labels,
                            datasets: [{
                                data: result.data,
                                backgroundColor: ['#4CAF50', '#F44336']
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Active vs Inactive Users'
                                },
                                legend: {
                                    display: true,
                                    position: 'bottom'
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            const label = context.label || '';
                                            const value = context.raw || 0;
                                            const percentage = ((value / total) * 100).toFixed(1);
                                            return `${label}: ${value} (${percentage}%)`;
                                        }
                                    }
                                }
                            }
                        }
                    });
                });
        </script>

        <script>
            fetch('/api/dashboard/user-location-stats')
                .then(response => response.json())
                .then(result => {
                    const ctx = document.getElementById('locationChart');
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: result.labels,
                            datasets: [{
                                label: 'Users',
                                data: result.data,
                                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'User Count by District'
                                },
                                legend: {
                                    display: false
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1,
                                        precision: 0
                                    }
                                }
                            }
                        }
                    });
                });
        </script>
    @endpush
@endsection
