@extends('app')

@section('title', 'Home')

@section('frontend_content')
    <div class="container ">
        <main class="main">
            <div class="">

                <!-- Cards Section -->
                <div class="card-container">
                    <div class="card bg-white">
                        <div class="body">
                            <div class="cover_bg_image">
                                <h3>Junayed Rahman Faiaz</h3>
                                <h4>AB+ Blood Doner</h4>
                            </div>
                            <img src="{{ asset('assets/frontend/img/profile.png') }}" alt="Profile Image">
                            <p>Mymensingh, Haluaghat, Dhara</p>
                            <div class="cardbtn">
                                <button class="btn view">View Profile</button>
                                <button class="btn message">Message</button>
                            </div>
                            <div class="timer">

                            </div>
                        </div>
                    </div>
                    <div class="card bg-white">
                        <div class="body">
                            <a href="{{ route('user.history.store') }}">
                                <span>
                                    When this time is over, this user himself will be able to see a button with this name in
                                    place of this time. And if he clicks on this button, a file will open like this. If he
                                    fills it up and submits it, then a dead show for the next 120 days will be like this
                                    profile
                                    And if it is another user, then he will be able to see all 00 00 00 00.
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="bottomsec py-2">
                    <div class="pagination">
                        <a href="#" class="arrow">&laquo;</a>
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#">...</a>
                        <a href="#" class="arrow">&raquo;</a>
                    </div>
                </div>

            </div>
        </main>

    </div>
@endsection
