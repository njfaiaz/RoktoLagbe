@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/charts-c3/plugin.css') }}" />
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
                    <div class="card widget_2 big_icon email">
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
                    <div class="card widget_2 big_icon domains">
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
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong><i class="zmdi zmdi-chart"></i> Sales</strong> Report</h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                            class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Edit</a></li>
                                        <li><a href="javascript:void(0);">Delete</a></li>
                                        <li><a href="javascript:void(0);">Report</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body mb-2">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="state_w1 mb-1 mt-1">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>2,365</h5>
                                                <span><i class="zmdi zmdi-balance"></i> Revenue</span>
                                            </div>
                                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                                data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#868e96">
                                                5,2,3,7,6,4,8,1</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="state_w1 mb-1 mt-1">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>365</h5>
                                                <span><i class="zmdi zmdi-turning-sign"></i> Returns</span>
                                            </div>
                                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                                data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#2bcbba">
                                                8,2,6,5,1,4,4,3</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="state_w1 mb-1 mt-1">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>65</h5>
                                                <span><i class="zmdi zmdi-alert-circle-o"></i> Queries</span>
                                            </div>
                                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                                data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#82c885">
                                                4,4,3,9,2,1,5,7</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="state_w1 mb-1 mt-1">
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <h5>2,055</h5>
                                                <span><i class="zmdi zmdi-print"></i> Invoices</span>
                                            </div>
                                            <div class="sparkline" data-type="bar" data-width="97%" data-height="55px"
                                                data-bar-Width="3" data-bar-Spacing="5" data-bar-Color="#45aaf2">
                                                7,5,3,8,4,6,2,9</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div id="chart-area-spline-sracked" class="c3_chart d_sales"></div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row clearfix">

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Distribution</strong></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Edit</a></li>
                                        <li><a href="javascript:void(0);">Delete</a></li>
                                        <li><a href="javascript:void(0);">Report</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body text-center">
                            <div id="chart-pie" class="c3_chart d_distribution"></div>
                            <button class="btn btn-primary mt-4 mb-4">View More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('footer_scripts')
        <script src="{{ asset('assets/admin/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
        <script src="{{ asset('assets/admin/bundles/sparkline.bundle.js') }}"></script> <!-- Sparkline Plugin Js -->
        <script src="{{ asset('assets/admin/bundles/c3.bundle.js') }}"></script>
        <script src="{{ asset('assets/admin/js/pages/index.js') }}"></script>
    @endpush
@endsection
