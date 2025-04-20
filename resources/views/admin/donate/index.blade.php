@extends('admin.layouts.app')

@section('title', 'Donate History List')
@section('content')


    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>User List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">Patient Blood Donate List</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">

                            {{-- Table --------------------------------------------------------------------- --}}
                            <table
                                class="table table-hover product_item_list c_table theme-color mb-0 footable footable-1 footable-paging footable-paging-center breakpoint-lg"
                                style="">
                                <thead>
                                    <tr class="footable-header">
                                        <th class="footable-sortable" style="display: table-cell;">ID Name<span
                                                class="fooicon fooicon-sort"></span></th>
                                        <th class="footable-sortable" style="display: table-cell;">Donar Name<span
                                                class="fooicon fooicon-sort"></span></th>
                                        <th data-breakpoints="sm xs" class="footable-sortable" style="display: table-cell;">
                                            Patient Name<span class="fooicon fooicon-sort"></span></th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Patient Number<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Patient Blood Group<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Gender<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Blood Donation Date<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            District Name<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Upazila Name<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Union Name<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Patient Details<span class="fooicon fooicon-sort"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                {{ $key + 1 }}</td>

                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <h5>{{ $user->name }}</h5>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->donateHistory->blood_receiver_name ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->donateHistory->blood_receiver_number ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="col-green">{{ $user->donateHistory->bloods->blood_name ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span class="col-green">{{ $user->donateHistory->gender ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span class="text-muted">
                                                    {{ $user->donateHistory ? $user->donateHistory->created_at->format('F d, Y') : 'N/A' }}
                                                </span>
                                            </td>


                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->donateHistory->district->district_name ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->donateHistory->upazila->upazila_name ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->donateHistory->union->union_name ?? 'N/A' }}</span>
                                            </td>

                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span class="col-green">
                                                    {{ Str::words($user->donateHistory->patient_details ?? 'N/A', 10) }}
                                                </span>
                                            </td>


                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No users found.</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <ul class="pagination pagination-primary m-b-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i
                                            class="zmdi zmdi-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i
                                            class="zmdi zmdi-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
