@extends('admin.layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css') }}">
@endpush

@section('title', 'Address')
@section('content')


    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Jquery DataTables</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Address</a></li>
                        <li class="breadcrumb-item active">All Address List</li>
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
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>All Address</strong> </h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                            class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right slideUp">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Id Name</th>
                                            <th>District Name</th>
                                            <th>Upazila Name</th>
                                            <th>Union Name</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Id Name</th>
                                            <th>District Name</th>
                                            <th>Upazila Name</th>
                                            <th>Union Name</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        @foreach ($addresses as $addressIndex => $address)
                                            @foreach ($address->upazilas as $upazilaIndex => $upazila)
                                                @foreach ($upazila->unions as $unionIndex => $union)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $upazilaIndex === 0 && $unionIndex === 0 ? $address->district_name : $address->district_name }}
                                                        </td>
                                                        <td>{{ $unionIndex === 0 ? $upazila->upazila_name : $upazila->upazila_name }}
                                                        </td>
                                                        <td>{{ $union->union_name }}</td>
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>




    @push('footer_scripts')
        <script src="{{ asset('assets/admin/bundles/datatablescripts.bundle.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/jquery-datatable/buttons/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/pages/tables/jquery-datatable.js') }}"></script>
    @endpush
@endsection
