@extends('app')
@section('title', 'Fake User Show')



@section('frontend_content')
    <div class="padding">
        <div class="row">


            <div class="row">
                <div class="card bg-white">
                    <div class="body">
                        <h1> Reported by ({{ $realUser->name ?? 'Unknown User' }})</h1>
                    </div>
                </div>
            </div>

            <ul class="timeline pt-3">
                @forelse($allFakeUsers as $fUser)
                    <li>
                        <div class="timeline-time">
                            <span class="date">{{ $fUser->created_at->format('d M Y') }}</span>
                            <span class="time">{{ $fUser->created_at->format('h:i A') }}</span>
                        </div>

                        <div class="timeline-icon">
                            <a href="javascript:;">&nbsp;</a>
                        </div>
                        <div class="timeline-body">
                            <div class="timeline-header">Fake User Name =
                                <span class="username">{{ $fUser->fake_user_name ?? 'N/A' }}</span>
                            </div>
                            <div class="timeline-header">Fake User Number =
                                <span class="username">{{ $fUser->fake_user_phone_number ?? 'N/A' }}</span>
                            </div>
                            <div class="timeline-header">Fake User Details =
                                <p class="username">{{ $fUser->fake_user_details ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </li>
                @empty
                    <li>
                        <p>No fake users found.</p>
                    </li>
                @endforelse


            </ul>

        </div>
    </div>


@endsection
