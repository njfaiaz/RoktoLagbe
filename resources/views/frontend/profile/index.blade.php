@extends('app')
@section('title', 'Profile')



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
                        <p>AB+ <Strong>Blood Donar</Strong></p>
                        <a href="javascript:void(0)"
                            class="m-t-10 waves-effect waves-dark btn btn-primary btn-md btn-rounded" data-abc="true">Total
                            <strong class="text-warning">06</strong>
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
                                Junayed Rahman Faiaz
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Junayed Rahman Faiaz
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                njfaiaz@gmail.com
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                01533434652
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Blood Group</h6>
                            </div>
                            <div class="col-sm-9 text-success">
                                Ab+
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Last Donate Time</h6>
                            </div>
                            <div class="col-sm-9 text-success">
                                08-06-2024
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <strong class="text-primary">Dhaka</strong>, <strong
                                    class="text-secondary">Haluaghat</strong>,<strong
                                    class="text-warning">Haluaghat</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                Bay Area, San Francisco, CA
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " target="__blank" href="{{ route('user.profile.edit') }}">Edit</a>
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
                <li>
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="username">John Smith<small></small></span>
                        </div>
                        <div class="timeline-header">
                            <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong>
                                    Haluaghat</strong></span>
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
                <li>
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="username">John Smith<small></small></span>
                        </div>
                        <div class="timeline-header">
                            <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong>
                                    Haluaghat</strong></span>
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
                <li>
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="username">John Smith<small></small></span>
                        </div>
                        <div class="timeline-header">
                            <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong>
                                    Haluaghat</strong></span>
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
                <li>
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="username">John Smith<small></small></span>
                        </div>
                        <div class="timeline-header">
                            <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong>
                                    Haluaghat</strong></span>
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
                <li>
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="username">John Smith<small></small></span>
                        </div>
                        <div class="timeline-header">
                            <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong>
                                    Haluaghat</strong></span>
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
                <li>
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="username">John Smith<small></small></span>
                        </div>
                        <div class="timeline-header">
                            <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong>
                                    Haluaghat</strong></span>
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
                <li>
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="username">John Smith<small></small></span>
                        </div>
                        <div class="timeline-header">
                            <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong>
                                    Haluaghat</strong></span>
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
                <li>
                    <div class="timeline-time">
                        <span class="date">today</span>
                        <span class="time">04:20</span>
                    </div>
                    <div class="timeline-icon">
                        <a href="javascript:;">&nbsp;</a>
                    </div>
                    <div class="timeline-body">
                        <div class="timeline-header">
                            <span class="username">John Smith<small></small></span>
                        </div>
                        <div class="timeline-header">
                            <span class="address_name">Mymensingh, <strong>Haluaghat,</strong><strong>
                                    Haluaghat</strong></span>
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

            </ul>
        </div>
    </div>


@endsection
