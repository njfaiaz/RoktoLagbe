@extends('app')
@section('title', 'Profile Show')



@section('frontend_content')
    <div class="padding">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card_setting">
                    <img class="card-img-top" src="https://i.imgur.com/K7A78We.jpg" alt="Card image cap">
                    <div class="card-body little-profile text-center">
                        <div class="pro-img">
                            @if ($user->profiles && $user->profiles->image)
                                <img src="{{ asset($user->profiles->image) }}" width="60" height="60" />
                            @else
                                <span>No Image</span>
                            @endif
                        </div>
                        <h3 class="m-b-0">{{ $user->name }}</h3>
                        <p>{{ $user->profiles->bloods->blood_name ?? 'N/A' }} <Strong>Blood Donar</Strong></p>
                        <a href="javascript:void(0)"
                            class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Total
                            <strong class="text-warning">{{ str_pad($totalDonateCount ?? 0, 2, '0', STR_PAD_LEFT) }}
                            </strong>
                            <strong>Donate</strong></a>

                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">User Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->username }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->profiles->phone_number ?? 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Blood Group</h6>
                            </div>
                            <div class="col-sm-9 text-success">
                                {{ $user->profiles->bloods->blood_name ?? 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Donate Time</h6>
                            </div>
                            <div class="col-sm-9 text-success">
                                {{ $user->profiles->previous_donation_date ?? 'N/A' }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <strong
                                    class="text-primary">{{ $user->addresses->district->district_name ?? 'N/A' }}</strong>,
                                <strong
                                    class="text-secondary">{{ $user->addresses->upazila->upazila_name ?? 'N/A' }}</strong>,<strong
                                    class="text-warning">{{ $user->addresses->union->union_name ?? 'N/A' }}</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                @if (Auth::id() == $user->id)
                                    <a class="btn btn-info"
                                        href="{{ route('user.profile.edit', $user->username) }}">Edit</a>
                                @else
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card bg-white">
                    <div class="body">
                        <h1> History Of Last Blood Donate</h1>
                    </div>
                </div>
            </div>
            <ul class="timeline pt-3">
                @forelse($user->donateHistories as $donation)
                    <li>
                        <div class="timeline-time">
                            <span class="date">{{ $donation->created_at->format('d M Y') }}</span>
                            <span class="time">{{ $donation->created_at->format('h:i A') }}</span>
                        </div>
                        <div class="timeline-icon">
                            <a href="javascript:;">&nbsp;</a>
                        </div>
                        <div class="timeline-body">
                            <div class="timeline-header">
                                <span class="username">{{ $donation->blood_receiver_name }}<small></small></span>
                            </div>
                            <div class="timeline-header">
                                <span class="address_name">
                                    {{ $donation->district->district_name ?? '' }},
                                    <strong>{{ $donation->upazila->upazila_name ?? '' }},</strong>
                                    <strong>{{ $donation->union->union_name ?? '' }}</strong>
                                </span>
                            </div>
                            <div class="timeline-content">
                                <p>
                                    {{ $donation->patient_details ?? 'No patient details.' }}
                                </p>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>
                        <p>No donation history found.</p>
                    </li>
                @endforelse


            </ul>
        </div>
    </div>


@endsection
