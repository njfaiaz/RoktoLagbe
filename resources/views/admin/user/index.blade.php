@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/coustom/css/search.css') }}">
@endpush
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

                        {{-- Search Option ------------------------------------------------------------------------------ --}}

                        <form action="{{ route('user.list') }}" method="GET">
                            <div class="filter-section">

                                <select name="blood_name" id="blood_group" class="d-block">
                                    <option selected disabled>Select Blood</option>
                                    @foreach ($bloods as $blood)
                                        <option value="{{ $blood->id }}"
                                            {{ request()->query('blood_name') == $blood->id ? 'selected' : '' }}>
                                            {{ $blood->blood_name }}
                                        </option>
                                    @endforeach
                                </select>

                                <input type="text" name="district_name" class="form-control" id="district"
                                    autocomplete="off" value="{{ old('district_name', $districtName ?? '') }}"
                                    placeholder="District Name">

                                <input type="hidden" id="district_id" name="district_id" class="form-control"
                                    value="{{ request()->query('district_id') ?? '' }}">


                                <div id="district-list-container">
                                    <ul id="district-list" class="list-group phone_version mt-4"></ul>
                                </div>

                                <input type="text" name="upazila_name" class="form-control" id="upazila"
                                    autocomplete="off" value="{{ old('upazila_name', request()->query('upazila_name')) }}"
                                    placeholder="Upazila Name">
                                <input type="hidden" id="upazila_id" name="upazila_id"
                                    value="{{ old('upazila_id', request()->query('upazila_id')) }}">
                                <div id="upazila-list-container">
                                    <ul id="upazila-list" class="list-group phone_version mt-4"></ul>
                                </div>

                                <input type="text" name="union_name" class="form-control" id="union"
                                    autocomplete="off" value="{{ old('union_name', request()->query('union_name')) }}"
                                    placeholder="Union Name">
                                <input type="hidden" id="union_id" name="union_id"
                                    value="{{ old('union_id', request()->query('union_id')) }}">
                                <div id="union-list-container">
                                    <ul id="union-list" class="list-group phone_version mt-4"></ul>
                                </div>

                                <select name="eligibility" class="d-block">
                                    <option value="all"
                                        {{ request()->query('eligibility') == 'all' ? 'selected' : '' }}>All
                                        Users</option>
                                    <option value="eligible"
                                        {{ request()->query('eligibility') == 'eligible' ? 'selected' : '' }}>
                                        Users Eligible to Donate</option>
                                    <option value="not_eligible"
                                        {{ request()->query('eligibility') == 'not_eligible' ? 'selected' : '' }}>Users Not
                                        Yet
                                        Eligible</option>
                                </select>

                                <div>
                                    <button type="submit" class="btn filter_search">Search</button>
                                </div>
                                <div>
                                    <a class="btn filter_search" href="{{ url()->current() }}">Reset </a>
                                </div>
                            </div>
                        </form>


                        <div class="table-responsive">

                            {{-- Table --------------------------------------------------------------------- --}}
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
                                        <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">
                                            Status<span class="fooicon fooicon-sort"></span></th>
                                        <th data-breakpoints="xs md" class="footable-sortable"
                                            style="display: table-cell;">
                                            Number<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable"
                                            style="display: table-cell;">
                                            Blood Group<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable"
                                            style="display: table-cell;">
                                            Gender<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable"
                                            style="display: table-cell;">
                                            Last Blood Donation Date<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable"
                                            style="display: table-cell;">
                                            District Name<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable"
                                            style="display: table-cell;">
                                            Upazila Name<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="xs md" class="footable-sortable"
                                            style="display: table-cell;">
                                            Union Name<span class="fooicon fooicon-sort"></span>
                                        </th>
                                        <th data-breakpoints="sm xs md" class="footable-sortable footable-last-visible"
                                            style="display: table-cell;">Action<span class="fooicon fooicon-sort"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($users as $key => $user)
                                        <tr>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                {{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}
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
                                                @if ($user->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                                <span
                                                    class="text-muted">{{ $user->profiles->phone_number ?? 'N/A' }}</span>
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
                                {{ $users->links('pagination::bootstrap-4') }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Address Search Option Script --------------------------------------------------- --}}
    @push('footer_scripts')
        <script src="{{ asset('assets/coustom/js/address.js') }}"></script>
        <script>
            $(document).ready(function() {
                autocompleteInput('district', 'district-list', 'district_id', '/admin/user-search-districts', () =>
                    ({}),
                    () => {
                        $('#upazila, #upazila_id').val('');
                        $('#upazila-list').empty();
                        $('#union, #union_id').val('');
                        $('#union-list').empty();
                    });

                autocompleteInput('upazila', 'upazila-list', 'upazila_id', '/admin/user-search-upazilas', () => ({
                    district_id: $('#district_id').val()
                }), () => {
                    $('#union, #union_id').val('');
                    $('#union-list').empty();
                });

                autocompleteInput('union', 'union-list', 'union_id', '/admin/user-search-unions', () => ({
                    upazila_id: $('#upazila_id').val()
                }));
            });
        </script>
    @endpush

@endsection
