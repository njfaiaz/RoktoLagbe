@extends('app')
@section('title', 'Search')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/coustom/css/search.css') }}">
@endpush
@section('frontend_content')

    <div class="container ">
        <main class="main">
            <div class="d-flex justify-content-end align-items-end py-2">
                <a href="{{ route('user.fake.create') }}" class="btn filter_search" href="">Add To New Fake User</a>
            </div>

            <div class="">
                <!-- Filter Section -->
                <form action="{{ route('user.fake') }}" method="GET">
                    <div class="filter-section" style="background-color: #ffcaca">

                        <div>
                            <input type="text" name="name" class="form-control w-100" value="{{ request('name') }}"
                                placeholder="Complain User Name">
                        </div>

                        <div>
                            <input type="text" name="fake_user_name" class="form-control w-100"
                                value="{{ request('fake_user_name') }}" placeholder="Fake User Name">
                        </div>

                        <div>
                            <input type="text" name="fake_user_phone_number" class="form-control w-100"
                                value="{{ request('fake_user_phone_number') }}" placeholder="Fake User Number">
                        </div>
                        <div>
                            <input type="text" name="fake_user_details" class="form-control w-100"
                                value="{{ request('fake_user_details') }}" placeholder="Details">
                        </div>

                        <div>
                            <button type="submit" class="btn filter_search w-100">Search</button>
                            <a class="btn filter_search w-100" href="{{ url()->current() }}">Reset </a>
                        </div>
                    </div>
                </form>


                <div class="">

                    {{-- Table --------------------------------------------------------------------- --}}
                    <table
                        class="table table-hover product_item_list c_table theme-color mb-0 footable footable-1 footable-paging footable-paging-center breakpoint-lg"
                        style="">
                        <thead>
                            <tr class="footable-header">
                                <th class="footable-sortable" style="display: table-cell;">ID Name<span
                                        class="fooicon fooicon-sort"></span></th>

                                <th class="footable-sortable" style="display: table-cell;">Complain User
                                    Name<span class="fooicon fooicon-sort"></span></th>
                                <th data-breakpoints="sm xs" class="footable-sortable" style="display: table-cell;">
                                    Fake User Name<span class="fooicon fooicon-sort"></span></th>
                                <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">
                                    Fake User Number<span class="fooicon fooicon-sort"></span></th>
                                <th data-breakpoints="xs" class="footable-sortable" style="display: table-cell;">
                                    Complain Details<span class="fooicon fooicon-sort"></span></th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse ($users as $key => $user)
                                <tr>
                                    <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                        {{ ($users->currentPage() - 1) * $users->perPage() + $key + 1 }}

                                    <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                        <h5>{{ $user->user->name ?? 'N/A' }}</h5>
                                    </td>
                                    <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                        <span class="text-muted">{{ $user->fake_user_name ?? 'N/A' }}</span>
                                    </td>
                                    <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                        <span class="text-muted">{{ $user->fake_user_phone_number ?? 'N/A' }}</span>
                                    </td>
                                    <td style="display: table-cell; vertical-align: middle; text-align: center;">
                                        <span class="col-green">
                                            {{ Str::words($user->fake_user_details ?? 'N/A', 10) }}
                                        </span>
                                    </td>
                                    <td class="footable-last-visible" style="display: table-cell;">
                                        <a href="{{ route('user.fake.details', $user->id) }}"
                                            class="btn btn-default waves-effect waves-float btn-sm waves-red">Details</a>
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


            <div class=" d-flex justify-content-start align-items-start py-3">
                <div class="body">
                    <ul class="pagination pagination-primary m-b-0">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </ul>
                </div>
            </div>
        </main>
    </div>

@endsection
