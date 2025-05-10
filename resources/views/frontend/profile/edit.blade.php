@extends('app')

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



@section('frontend_content')
    <div class="row p-3">
        <div class="col-lg-4 col-md-4 col-sm-12 ">
            <div class="card bg-white">
                <div class="body p-4">
                    <h5><strong>Profile</strong> Settings</h5>
                    <form action="{{ route('user.name.change') }}" method="POST">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <label></label>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" value="{{ $user->username }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <label></label>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Full Name" name="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 my-2">
                            <div class="form-group">
                                <label></label>
                                <input type="email" name="email" value="{{ $user->email }}"
                                    class="form-control @error('email') border border-danger @enderror"
                                    placeholder="Email Address">
                                @error('email')
                                    <div class="text-red-500 text-sm">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>

            <div class="card bg-white my-3">
                <div class="body p-4">
                    <h5><strong>Address Change</strong> Settings</h5>


                    <form method="POST" action="{{ route('user.address.update') }}">
                        @csrf

                        <div>
                            <label></label>
                            <input type="text" class="form-control" id="district" autocomplete="off"
                                value="{{ old('district', $address?->district?->district_name) }}"
                                placeholder="District Name">
                            <input type="hidden" id="district_id" name="district_id"
                                value="{{ old('district_id', $address?->district_id) }}" class="form-control">
                            <ul id="district-list-profile"></ul>

                            <!-- Display error for district -->
                            @if ($errors->has('district_id'))
                                <span class="text-danger">{{ $errors->first('district_id') }}</span>
                            @endif
                        </div>

                        <div>
                            <label></label>
                            <input type="text" class="form-control" id="upazila" autocomplete="off"
                                value="{{ old('upazila', $address?->upazila?->upazila_name) }}" placeholder="Upazila Name">
                            <input type="hidden" id="upazila_id" name="upazila_id"
                                value="{{ old('upazila_id', $address?->upazila_id) }}" class="form-control">
                            <ul id="upazila-list-profile"></ul>

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
                            <ul id="union-list-profile"></ul>

                            <!-- Display error for union -->
                            @if ($errors->has('union_id'))
                                <span class="text-danger">{{ $errors->first('union_id') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-info mt-3">Update Address</button>
                    </form>


                </div>
            </div>

            <div class="card bg-white my-3">
                <div class="body p-4">
                    <h5><strong>Password</strong> Change</h5>
                    <form action="{{ route('admin.password.change') }}" method="POST">
                        @csrf
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label></label>
                                <input type="password" name="old_password" class="form-control"
                                    placeholder="Enter Old password" />
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label></label>
                                <input type="password" name="new_password" class="form-control"
                                    placeholder="Enter New password" />
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 my-2">
                            <div class="form-group">
                                <label></label>
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
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="card bg-white">
                <div class="body p-4">
                    <h5><strong>Basic</strong> Settings</h5>
                    <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
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
                            <label></label>
                            <div class="form-group">
                                <input type="text" name="phone_number" type="number"
                                    value="{{ old('phone_number', $profile->phone_number ?? '') }}"
                                    class="form-control @error('phone_number') border border-danger @enderror"
                                    placeholder="Phone Number">
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <label></label>
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
                            <label></label>
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

                        <div class="col-lg-12 col-md-12 py-2">
                            <label></label>
                            <div class="form-group">
                                @php
                                    $today = date('Y-m-d');
                                @endphp

                                <input type="date"
                                    class="form-control @error('previous_donation_date') border border-danger @enderror"
                                    name="previous_donation_date"
                                    value="{{ old('previous_donation_date', $profile->previous_donation_date ?? '') }}"
                                    max="{{ $today }}" required type="date"
                                    placeholder="Previous Donation Date">
                                @error('previous_donation_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Update Information</button>
                    </form>
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
                            $('#district-list-profile').empty();
                            data.forEach(district => {
                                $('#district-list-profile').append(
                                    `<li class="form-control" data-id="${district.id}">${district.district_name}</li>`
                                );
                            });
                        }
                    });
                });

                // Select District
                $(document).on('click', '#district-list-profile li', function() {
                    let districtId = $(this).data('id');
                    $('#district').val($(this).text());
                    $('#district_id').val(districtId);
                    $('#district-list-profile').empty();
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
                                $('#upazila-list-profile').empty();
                                data.forEach(upazila => {
                                    $('#upazila-list-profile').append(
                                        `<li class="form-control" data-id="${upazila.id}">${upazila.upazila_name}</li>`
                                    );
                                });
                            }
                        });
                    });

                    // Select Upazila
                    $(document).on('click', '#upazila-list-profile li', function() {
                        let upazilaId = $(this).data('id');
                        $('#upazila').val($(this).text());
                        $('#upazila_id').val(upazilaId);
                        $('#upazila-list-profile').empty();
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
                                $('#union-list-profile').empty();
                                data.forEach(union => {
                                    $('#union-list-profile').append(
                                        `<li class="form-control" data-id="${union.id}">${union.union_name}</li>`
                                    );
                                });
                            }
                        });
                    });

                    // Select Union
                    $(document).on('click', '#union-list-profile li', function() {
                        let unionId = $(this).data('id');
                        $('#union').val($(this).text());
                        $('#union_id').val(unionId);
                        $('#union-list-profile').empty();
                    });
                }
            });
        </script>
    @endpush
@endsection
