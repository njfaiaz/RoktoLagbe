@extends('app')
@section('title', 'History')



@section('frontend_content')

    <ul class="timeline">
        @forelse($donateHistories as $history)
            <li>
                <div class="timeline-time">
                    <span class="date">{{ \Carbon\Carbon::parse($history->donation_date)->format('d M Y') }}</span>
                    <span class="time">{{ \Carbon\Carbon::parse($history->donation_date)->format('h:i A') }}</span>
                </div>

                <div class="timeline-icon">
                    <a href="javascript:;">&nbsp;</a>
                </div>
                <div class="timeline-body">
                    <div class="timeline-header"> Donar Name =
                        <span class="username"> {{ $history->user->name }}<small></small></span>
                    </div>
                    <div class="timeline-header"> Peasant Name =
                        <span class="username">{{ $history->blood_receiver_name }}<small></small></span>
                    </div>
                    <div class="timeline-header"> Peasant Phone Number =
                        <span class="username">{{ $history->blood_receiver_number }}<small></small></span>
                    </div>
                    <div class="timeline-header">Peasant Blood Name =
                        <span class="username">{{ $history->blood->blood_name }}<small></small></span>
                    </div>
                    <div class="timeline-header"> Peasant Gender =
                        <span class="username">{{ $history->gender }}<small></small></span>
                    </div>
                    <div class="timeline-header">
                        <span class="address_name"> Peasant Address =
                            {{ $history->district->district_name ?? '' }},
                            <strong>{{ $history->upazila->upazila_name ?? '' }},</strong>
                            <strong>{{ $history->union->union_name ?? '' }}</strong>
                        </span>
                    </div>
                    <div class="timeline-header"> What problem did you take blood for? =
                        <p class="username">
                            {{ $history->patient_details ?? 'No patient details.' }}
                        </p>
                    </div>
                </div>
            </li>
        @empty
            <li>
                <p>No history history found.</p>
            </li>
        @endforelse


    </ul>


    {{-- <ul class="timeline">
        @foreach ($donateHistories as $history)
            <li>
                <div class="timeline-time">
                    <span class="date">{{ \Carbon\Carbon::parse($history->donation_date)->format('d M Y') }}</span>
                    <span class="time">{{ \Carbon\Carbon::parse($history->donation_date)->format('h:i A') }}</span>
                </div>
                <div class="timeline-icon">
                    <a href="javascript:;">&nbsp;</a>
                </div>
                <div class="timeline-body">
                    <div class="timeline-header">
                        <span class="username">{{ $history->recipient_name ?? 'Unknown Recipient' }}<small></small></span>
                    </div>
                    <div class="timeline-header">
                        <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong> Haluaghat</strong></span>
                    </div>
                    <div class="timeline-content">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc faucibus turpis quis tincidunt
                            luctus.
                            Nam sagittis dui in nunc consequat, in imperdiet nunc sagittis.
                        </p>
                    </div>
                </div>
            </li>
        @endforeach

    </ul> --}}
@endsection
