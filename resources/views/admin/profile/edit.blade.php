@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-select/css/bootstrap-select.css') }}">
    <style>
        .dropify-wrapper {
            height: 180px;
            width: 180px;
            margin: 0 auto;
            border-radius: 5%;
        }

        dl,
        ol,
        ul {
            margin-top: 0;
            margin-bottom: 1rem;
            margin-left: -38px;
        }
    </style>
@endpush

@section('title', 'Profile Edit')
@section('content')


    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">Profile Edit</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                    <a href="profile.html" class="btn btn-info btn-icon float-right"><i class="zmdi zmdi-check"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card ">
                        <div class="header">
                            <h2><strong>Profile</strong> Settings</h2>
                        </div>
                        <div class="body">
<<<<<<< HEAD
                            <form action="">
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">


                                        <input type="file" id="imageUpload" name="profile_image" class="dropify"
                                            data-max-file-size="2M" data-default-file=""
                                            data-msg-placeholder="Upload
                                            your Profile" />
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username" value=""
=======
                            <form action="{{ route('admin.name.change') }}" method="POST">
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Username" value="{{ $user->username }}"
>>>>>>> main
                                            disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name"
<<<<<<< HEAD
                                            value="">
=======
                                            value="{{ $user->name }}">
>>>>>>> main
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
<<<<<<< HEAD
                                        <input type="text"
                                            class="form-control @error('email') border border-danger @enderror"
                                            placeholder="Email Address" name="email" value="">
=======
                                        <input type="email"
                                            class="form-control @error('email') border border-danger @enderror"
                                            placeholder="Email Address" name="email" value="{{ $user->email }}">
>>>>>>> main
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Save Changes</button>
                            </form>
                        </div>
                    </div>
<<<<<<< HEAD
=======
                    <div class="card">
                        <div class="header">
                            <h2><strong>Address Change</strong> Settings</h2>
                        </div>
                        <div class="body">


                            <form method="POST" action="{{ route('address.update') }}">
                                @csrf
                                <div>
                                    <label></label>
                                    <input type="text" class="form-control" id="district" autocomplete="off"
                                        value="{{ old('district', $address?->district?->district_name) }}"
                                        placeholder="District Name">
                                    <input type="hidden" id="district_id" name="district_id"
                                        value="{{ old('district_id', $address?->district_id) }}" class="form-control">
                                    <ul id="district-list"></ul>

                                    <!-- Display error for district -->
                                    @if ($errors->has('district_id'))
                                        <span class="text-danger">{{ $errors->first('district_id') }}</span>
                                    @endif
                                </div>

                                <div>
                                    <label></label>
                                    <input type="text" class="form-control" id="upazila" autocomplete="off"
                                        value="{{ old('upazila', $address?->upazila?->upazila_name) }}"
                                        placeholder="Upazila Name">
                                    <input type="hidden" id="upazila_id" name="upazila_id"
                                        value="{{ old('upazila_id', $address?->upazila_id) }}" class="form-control">
                                    <ul id="upazila-list"></ul>

                                    <!-- Display error for upazila -->
                                    @if ($errors->has('upazila_id'))
                                        <span class="text-danger">{{ $errors->first('upazila_id') }}</span>
                                    @endif
                                </div>

                                <div>
                                    <label></label>
                                    <input type="text" class="form-control" id="union" autocomplete="off"
                                        value="{{ old('union', $address?->union?->union_name) }}" placeholder="Union Name">
                                    <input type="hidden" id="union_id" name="union_id"
                                        value="{{ old('union_id', $address?->union_id) }}" class="form-control">
                                    <ul id="union-list"></ul>

                                    <!-- Display error for union -->
                                    @if ($errors->has('union_id'))
                                        <span class="text-danger">{{ $errors->first('union_id') }}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-info mt-3">Update Address</button>
                            </form>


                        </div>
                    </div>

                    <div class="card ">
                        <div class="header">
                            <h2><strong>Password</strong> Change</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('admin.password.change') }}" method="POST">
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="old_password" class="form-control"
                                            placeholder="Enter Old password" />
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="new_password" class="form-control"
                                            placeholder="Enter New password" />
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="password" name="con_password" class="form-control"
                                            placeholder="Enter Confirm password" />
                                        @error('con_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info submit font-weight-bold" name="submit"
                                    value="Submit">Password Change</button>
                            </form>
                        </div>
                    </div>

>>>>>>> main
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic</strong> Settings</h2>

<<<<<<< HEAD
                            @if (session('success'))
                                <div class="alert alert-success mt-2">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger mt-2">
                                    {{ session('error') }}
                                </div>
                            @endif

                        </div>
                        <div class="body">
                            <form action="{{ route('profile.update') }}" method="POST">
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <label for="phone_number">User Phone Number :</label>
                                    <div class="form-group">
                                        <input type="text" name="phone_number" value="{{ $profile->phone_number ?? '' }}"
=======
                        </div>
                        <div class="body">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">

                                        <input type="file" id="imageUpload" name="image" class="dropify"
                                            data-max-file-size="2M"
                                            data-default-file="{{ optional($profile)->image ? asset($profile->image) : '' }}"
                                            data-msg-placeholder="Upload your Profile" />

                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12">
                                    <label for="phone_number">User Phone Number :</label>
                                    <div class="form-group">
                                        <input type="text" name="phone_number" type="number"
                                            value="{{ old('phone_number', $profile->phone_number ?? '') }}"
>>>>>>> main
                                            class="form-control @error('phone_number') border border-danger @enderror"
                                            placeholder="Phone Number" required>
                                        @error('phone_number')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="gender">Select Gender :</label>
                                    <div class="form-group">
                                        <select name="gender" id="gender" class="form-control" required>
                                            <option disabled>Select Gender</option>
                                            <option value="Male"
                                                {{ isset($profile->gender) && $profile->gender == 'Male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="Female"
                                                {{ isset($profile->gender) && $profile->gender == 'Female' ? 'selected' : '' }}>
                                                Female</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="blood_id">Select Your Blood Group :</label>
                                    <div class="form-group">
                                        <select name="blood_id" id="blood_group" class="form-control" required>
                                            <option selected disabled>Select Your Blood Group</option>
                                            @foreach ($bloods as $blood)
                                                <option value="{{ $blood->id }}"
                                                    {{ old('blood_id', isset($profile) && $profile ? $profile->blood_id : null) == $blood->id || (empty($profile->blood_id) && $loop->first) ? 'selected' : '' }}>
                                                    {{ $blood->blood_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="previous_donation_date">Previous Donation Date :</label>
                                    <div class="form-group">
<<<<<<< HEAD
                                        <input type="date"
                                            class="form-control @error('previous_donation_date') border border-danger @enderror"
                                            name="previous_donation_date"
                                            value="{{ $profile->previous_donation_date ?? '' }}" required>
=======
                                        @php
                                            $today = date('Y-m-d');
                                        @endphp

                                        <input type="date"
                                            class="form-control @error('previous_donation_date') border border-danger @enderror"
                                            name="previous_donation_date"
                                            value="{{ old('previous_donation_date', $profile->previous_donation_date ?? '') }}"
                                            max="{{ $today }}" required type="date">
>>>>>>> main
                                        @error('previous_donation_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info">Update Information</button>
                            </form>
                        </div>
                    </div>
<<<<<<< HEAD
                    <div class="card">
                        <div class="header">
                            <h2><strong>Address Change</strong> Settings</h2>
                        </div>
                        <div class="body">



                            <form method="POST" action="{{route('address.update')}}">
                                @csrf
                                <div>
                                    <label></label>
                                    <input type="text" class="form-control" id="district" autocomplete="off"
                                        value="{{$address ? $address->district->district_name : null}}"
                                        placeholder="District Name">
                                    <input type="hidden" id="district_id" name="district_id"
                                        value="{{ auth()->user()->id ?? '' }}" class="form-control">
                                    <ul id="district-list"></ul>
                                </div>

                                <div>
                                    <label></label>
                                    <input type="text" id="upazila" autocomplete="off"
                                        value="{{ $address ? $address->upazila->upazila_name : null }}"
                                        class="form-control" placeholder="Upazila Name">
                                    <input type="hidden" id="upazila_id" name="upazila_id"
                                        value="{{ auth()->user()->id ?? '' }}" class="form-control">
                                    <ul id="upazila-list"></ul>
                                </div>

                                <div>
                                    <label></label>
                                    <input type="text" id="union" autocomplete="off"
                                        value="{{ $address ? $address->union->union_name : null }}"
                                        class="form-control" placeholder="Union Name">
                                    <input type="hidden" id="union_id" name="union_id"
                                        value="{{ auth()->user()->id ?? '' }}" class="form-control">
                                    <ul id="union-list"></ul>
                                </div>

                                <button type="submit" class="btn btn-info">Update Address</button>
                            </form>
                        </div>
                    </div>
=======

>>>>>>> main
                </div>
            </div>
        </div>
    </div>


    @push('footer_scripts')
        <script src="{{ asset('assets/admin/plugins/dropify/js/dropify.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                // Initialize Dropify
                $('.dropify').dropify({
                    messages: {
                        'default': 'Upload Your Profile',
                        'replace': 'Are you sure to upload this image?',
                        'remove': 'Remove',
                        'error': 'Oops! Something went wrong.'
                    }
                });
            });
        </script>
        <script src="{{ asset('assets/admin/js/pages/forms/dropify.js') }}"></script>
<<<<<<< HEAD
        <script src="{{ asset('assets/coustom/address.js') }}"></script>

        <script>
            $(document).ready(function() {
                // District autocomplete
                $('#district').on('keyup', function() {
                    let query = $(this).val();
                    $.ajax({
                        url: '/admin/search-districts',
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
                            url: '/admin/search-upazilas',
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
                            url: '/admin/search-unions',
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
=======

        <script src="{{ asset('assets/coustom/js/address.js') }}"></script>
        <script>
            $(document).ready(function() {
                autocompleteInput('district', 'district-list', 'district_id', '/admin/search-districts', () => ({}),
                    () => {
                        $('#upazila, #upazila_id').val('');
                        $('#upazila-list').empty();
                        $('#union, #union_id').val('');
                        $('#union-list').empty();
                    });

                autocompleteInput('upazila', 'upazila-list', 'upazila_id', '/admin/search-upazilas', () => ({
                    district_id: $('#district_id').val()
                }), () => {
                    $('#union, #union_id').val('');
                    $('#union-list').empty();
                });

                autocompleteInput('union', 'union-list', 'union_id', '/admin/search-unions', () => ({
                    upazila_id: $('#upazila_id').val()
                }));
>>>>>>> main
            });
        </script>
    @endpush

@endsection
