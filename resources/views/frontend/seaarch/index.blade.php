@extends('app')
@section('title', 'Search')

@section('frontend_content')

    <div class="container ">
        <main class="main">
            <div class="">
                <!-- Filter Section -->
                <div class="filter-section">

                    <select name="blood_id" id="blood_group" class="d-block">
                        <option selected disabled>Select Blood</option>
                        @foreach ($bloods as $blood)
                            <option value="{{ $blood->id }}">
                                {{ $blood->blood_name }}
                            </option>
                        @endforeach
                    </select>

                    <input type="text" class="form-control" id="district" autocomplete="off" placeholder="District Name">
                    <input type="hidden" id="district_id" name="district_id" value="" class="form-control">

                    <div id="district-list-container">
                        <ul id="district-list" class="list-group phone_version mt-4"></ul>
                    </div>

                    <input type="text" id="upazila" autocomplete="off"
                        value="{{ old('upazila', auth()->user()->upazila->name ?? '') }}" class="form-control"
                        placeholder="Upazila Name">
                    <input type="hidden" id="upazila_id" name="upazila_id" value="{{ auth()->user()->id ?? '' }}"
                        class="form-control">
                    <div id="upazila-list-container">
                        <ul id="upazila-list" class="list-group phone_version mt-4"></ul>
                    </div>


                    <input type="text" id="union" autocomplete="off"
                        value="{{ old('union', auth()->user()->union->name ?? '') }}" class="form-control"
                        placeholder="Union Name">
                    <input type="hidden" id="union_id" name="union_id" value="{{ auth()->user()->id ?? '' }}"
                        class="form-control">
                    <div id="union-list-container">
                        <ul id="union-list" class="list-group phone_version mt-4"></ul>
                    </div>



                    <select class="d-block">
                        <option>All Users</option>
                        <option>Users Eligible to Donate</option>
                        <option>Users Not Yet Eligible </option>
                    </select>
                    <div>

                        <a class="btn filter_search" href="">Search </a>
                    </div>
                    <div>

                        <a class="btn filter_search" href="">Reset </a>
                    </div>
                </div>

                <!-- Cards Section -->
                <div class="card-container">
                    @foreach ($users as $user)
                        @php
                            $loggedInUserId = auth()->id();
                            $loggedInUser = auth()->user();
                            $loggedInUserProfileComplete =
                                $loggedInUser->profiles && $loggedInUser->profiles->bloods && $loggedInUser->addresses;
                        @endphp

                        <div class="card bg-white">
                            <div class="body">
                                <div class="cover_bg_image">
                                    <h3>{{ $user->name }}</h3>
                                    <h4>{{ $user->profiles->bloods->blood_name ?? 'N/A' }}</h4>
                                </div>

                                @if ($user->profiles && $user->profiles->image)
                                    <img src="{{ asset($user->profiles->image) }}" width="60" height="60" />
                                @else
                                    <span>No Image</span>
                                @endif

                                <p>{{ $user->addresses->district->district_name ?? 'N/A' }},
                                    {{ $user->addresses->upazila->upazila_name ?? 'N/A' }},
                                    {{ $user->addresses->union->union_name ?? 'N/A' }}</p>

                                <div class="cardbtn">
                                    <button class="btn view"
                                        onclick="handleViewProfile('{{ $loggedInUserProfileComplete ? 'yes' : 'no' }}', '{{ route('user.profile.show', $user->username) }}')">
                                        View Profile
                                    </button>

                                    <button class="btn message">Message</button>
                                </div>


                                @php
                                    $profilePreviousDate = optional($user->profiles)->previous_donation_date;
                                    $latestDonationDate = optional(
                                        $user->donatehistories()->latest('donation_date')->first(),
                                    )->donation_date;

                                    $baseDate = null;

                                    if ($profilePreviousDate && $latestDonationDate) {
                                        $baseDate = \Carbon\Carbon::parse($profilePreviousDate)->gt(
                                            \Carbon\Carbon::parse($latestDonationDate),
                                        )
                                            ? $profilePreviousDate
                                            : $latestDonationDate;
                                    } elseif ($profilePreviousDate) {
                                        $baseDate = $profilePreviousDate;
                                    } elseif ($latestDonationDate) {
                                        $baseDate = $latestDonationDate;
                                    }

                                    $endDate = $baseDate
                                        ? \Carbon\Carbon::parse($baseDate)->addDays(120)->format('Y-m-d H:i:s')
                                        : null;

                                    $isLoggedInUser = auth()->check() && auth()->id() === $user->id;
                                @endphp

                                @if ($endDate)
                                    <div class="timer" data-endtime="{{ $endDate }}"
                                        data-userid="{{ $user->id }}"
                                        data-is-logged-in-user="{{ $isLoggedInUser ? 'yes' : 'no' }}">
                                    </div>
                                @endif


                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

            <!-- Pagination -->
            <div class="card mt-5">
                <div class="">
                    <ul class="pagination pagination-primary m-b-0">
                        {{ $users->links('pagination::bootstrap-4') }}
                    </ul>
                </div>
            </div>

        </main>
    </div>

    @push('footer_scripts')
        <script src="{{ asset('assets/coustom/js/toastr.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('assets/coustom/css/toastr.css') }}">
        <script>
            function handleViewProfile(isProfileComplete, profileUrl) {
                if (isProfileComplete === 'yes') {
                    window.location.href = profileUrl;
                } else {
                    toastr.options = {
                        "positionClass": "toast-top-right",
                        "timeOut": "3000",
                        "closeButton": true
                    };
                    toastr.error('Please complete your profile first!', 'Profile Incomplete');
                }
            }
        </script>

        <script>
            document.getElementById('district').addEventListener('input', function() {
                // Fetch and display suggestions in #district-list
            });
        </script>
        <script>
            $(document).ready(function() {
                // District autocomplete
                $('#district').on('keyup', function() {
                    let query = $(this).val();
                    $.ajax({
                        url: '/search-districts',
                        type: 'GET',
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('#district-list').empty();
                            data.forEach(district => {
                                $('#district-list').append(
                                    `<li class="form-control" data-id="${district.id}">${district.district_name}</li>`
                                );
                            });
                        }
                    });
                });

                // Select District
                $(document).on('click', '#district-list li', function() {
                    let districtId = $(this).data('id');
                    $('#district').val($(this).text());
                    $('#district_id').val(districtId);
                    $('#district-list').empty();
                    loadUpazilas(districtId);
                });

                // Load Upazilas
                function loadUpazilas(districtId) {
                    $('#upazila').on('keyup', function() {
                        let query = $(this).val();
                        $.ajax({
                            url: '/search-upazilas',
                            type: 'GET',
                            data: {
                                query: query,
                                district_id: districtId
                            },
                            success: function(data) {
                                $('#upazila-list').empty();
                                data.forEach(upazila => {
                                    $('#upazila-list').append(
                                        `<li class="form-control" data-id="${upazila.id}">${upazila.upazila_name}</li>`
                                    );
                                });
                            }
                        });
                    });

                    // Select Upazila
                    $(document).on('click', '#upazila-list li', function() {
                        let upazilaId = $(this).data('id');
                        $('#upazila').val($(this).text());
                        $('#upazila_id').val(upazilaId);
                        $('#upazila-list').empty();
                        loadUnions(upazilaId);
                    });
                }

                // Load Unions
                function loadUnions(upazilaId) {
                    $('#union').on('keyup', function() {
                        let query = $(this).val();
                        $.ajax({
                            url: '/search-unions',
                            type: 'GET',
                            data: {
                                query: query,
                                upazila_id: upazilaId
                            },
                            success: function(data) {
                                $('#union-list').empty();
                                data.forEach(union => {
                                    $('#union-list').append(
                                        `<li class="form-control" data-id="${union.id}">${union.union_name}</li>`
                                    );
                                });
                            }
                        });
                    });

                    // Select Union
                    $(document).on('click', '#union-list li', function() {
                        let unionId = $(this).data('id');
                        $('#union').val($(this).text());
                        $('#union_id').val(unionId);
                        $('#union-list').empty();
                    });
                }
            });
        </script>
    @endpush
@endsection
