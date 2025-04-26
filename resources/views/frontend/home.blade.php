@extends('app')

@section('title', 'Home')

@section('frontend_content')
    <div class="container ">
        <main class="main">
            <div class="">
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
                                    $previousDonationDate = optional($user->profiles)->previous_donation_date;
                                    $endDate = $previousDonationDate
                                        ? \Carbon\Carbon::parse($previousDonationDate)
                                            ->addDays(120)
                                            ->format('Y-m-d H:i:s')
                                        : null;
                                    $isLoggedInUser = auth()->check() && auth()->id() === $user->id;
                                @endphp

                                @if ($endDate)
                                    <div class="timer" data-endtime="{{ $endDate }}" data-userid="{{ $user->id }}"
                                        data-is-logged-in-user="{{ $isLoggedInUser ? 'yes' : 'no' }}">
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach


                </div>

                <!-- Pagination -->
                <div class="card mt-5">
                    <div class="">
                        <ul class="pagination pagination-primary m-b-0">
                            {{ $users->links('pagination::bootstrap-4') }}
                        </ul>
                    </div>
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
    @endpush
@endsection
