@extends('admin.layouts.app')

@section('title', 'All User List')
@section('content')


    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>User List</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">All User List</li>
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
                            <table
                                class="table table-hover product_item_list c_table theme-color mb-0 footable footable-1 footable-paging footable-paging-center breakpoint-lg"
                                style="">
                                <thead>
                                    <tr class="footable-header">
                                        <th class="footable-sortable" style="display: table-cell;">ID Name<span
                                                class="fooicon fooicon-sort"></span></th>
                                        <th class="footable-sortable footable-first-visible" style="display: table-cell;">
                                            Image<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th class="footable-sortable" style="display: table-cell;">Full Name<span
                                                class="fooicon fooicon-sort"></span></th>
                                        <th data-breakpoints="sm xs" class="footable-sortable" style="display: table-cell;">
                                            User Name<span class="fooicon fooicon-sort"></span></th>
                                        <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">
                                            Email<span class="fooicon fooicon-sort"></span></th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Number<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Blood Group<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Gender<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable" style="display: table-cell;">
                                            Last Blood Donation Date<span class="fooicon fooicon-sort"></span>
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
                                        <th data-breakpoints="sm xs md" class="footable-sortable footable-last-visible"
                                            style="display: table-cell;">Action<span class="fooicon fooicon-sort"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($ActiveVendor as $key => $user)
                                        <tr>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                {{ $key + 1 }}</td>
                                            <td class="footable-first-visible" style="display: table-cell;">
                                                @if ($user->profiles && $user->profiles->image)
                                                    <img src="{{ asset($user->profiles->image) }}" width="60"
                                                        height="60" />
                                                @else
                                                    <span>No Image</span>
                                                @endif

                                            </td>


                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <h5>{{ $user->name }}</h5>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span class="text-muted">{{ $user->username }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span class="text-muted">{{ $user->email }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span class="text-muted">{{ $user->profiles->phone_number ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="col-green">{{ $user->profiles->bloods->blood_name ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span class="col-green">{{ $user->profiles->gender ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->profiles->previous_donation_date ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->addresses->district->district_name ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->addresses->upazila->upazila_name ?? 'N/A' }}</span>
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->addresses->union->union_name ?? 'N/A' }}</span>
                                            </td>
                                            <td class="footable-last-visible" style="display: table-cell;">
                                                <a href="{{ route('inactive.approve', $user->id) }}" id="block"
                                                    class="btn btn-default waves-effect waves-float btn-sm waves-red"><i
                                                        class="zmdi zmdi-delete"></i></a>
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
