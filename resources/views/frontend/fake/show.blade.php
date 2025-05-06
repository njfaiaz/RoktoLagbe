@extends('app')
@section('title', 'Profile Show')



@section('frontend_content')
    <div class="padding">
        <div class="row">


            <div class="row">
                <div class="card bg-white">
                    <div class="body">
                        <h1> Names of all fake users reported by **{{ $user->name ?? 'N/A' }}**</h1>
                    </div>
                </div>
            </div>

            <ul class="timeline pt-3">
                @forelse($user->fakeUsers as $fakeUser)
                    <li>
                        <div class="timeline-time">
                            <span
                                class="date">{{ optional($user)->created_at ? \Carbon\Carbon::parse($user->created_at)->format('d M Y') : 'N/A' }}</span>
                            <span
                                class="time">{{ optional($user)->created_at ? \Carbon\Carbon::parse($user->created_at)->format('h:i A') : 'N/A' }}</span>
                        </div>

                        <div class="timeline-icon">
                            <a href="javascript:;">&nbsp;</a>
                        </div>
                        <div class="timeline-body">
                            <div class="timeline-header"> Fake User Name =
                                <span class="username">
                                    {{ $fakeUser->fake_user_name ?? 'No patient details.' }}<small></small></span>
                            </div>
                            <div class="timeline-header"> Fake User Number =
                                <span
                                    class="username">{{ $fakeUser->fake_user_phone_number ?? 'No patient details.' }}<small></small></span>
                            </div>

                            <div class="timeline-header"> Fake User Details =
                                <p class="username">
                                    {{ $fakeUser->fake_user_details ?? 'No patient details.' }}
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
