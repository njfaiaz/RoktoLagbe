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
                                <div class="body">
                                    <div id="chart-bar" style="height: 16rem"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Blood </strong> Group</h2>

                                </div>
                                <div class="body">
                                    <div class="row clearfix">
                                        <div class="col-lg-6 col-md-12">
                                            <div id="chart-donut" style="height: 17rem"></div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover c_table mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>AB+</td>
                                                            <td>6985 <i class="zmdi zmdi-caret-up text-success"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>AB_</td>
                                                            <td>2697 <i class="zmdi zmdi-caret-up text-success"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>A+</td>
                                                            <td>3597 <i class="zmdi zmdi-caret-down text-danger"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>A-</td>
                                                            <td>2145 <i class="zmdi zmdi-caret-up text-success"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>B+</td>
                                                            <td>54 <i class="zmdi zmdi-caret-down text-danger"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>B-</td>
                                                            <td>54 <i class="zmdi zmdi-caret-down text-danger"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>O+</td>
                                                            <td>54 <i class="zmdi zmdi-caret-down text-danger"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>O-</td>
                                                            <td>54 <i class="zmdi zmdi-caret-down text-danger"></i>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
        <script src="{{ asset('assets/admin/js/pages/blog/blog.js') }}"></script>
        <script src="{{ asset('assets/admin/js/pages/index.js') }}"></script>
    @endpush
@endsection
