@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-select/css/bootstrap-select.css') }}">
    <style>
        .dropify-wrapper .dropify-preview .dropify-render img {
            border-radius: 50%;
            object-fit: cover;
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
                    <div class="card mcard_3">
                        <div class="body">
                            <form action="{{ route('profile.update', $profile->id) }}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $profile->id }}">
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="file" name="profile_image" id="dropify-event"
                                            data-default-file="{{ $profile->profile_image ? asset($profile->profile_image) : asset('assets/admin/images/profile_av.jpg') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Username"
                                            value="{{ $profile->username ?? '' }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Full Name" name="name"
                                            value="{{ $profile->name ?? '' }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control @error('email') border border-danger @enderror"
                                            placeholder="Email Address" name="email" value="{{ $profile->email ?? '' }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger float-left">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic Information</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('profileInfo.update', $profile->id) }}" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $profile->id }}">
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <label for="phone_number">User Phone Number :</label>
                                    <div class="form-group">
                                        <input type="text" name="phone_number"
                                            class="form-control @error('phone_number') border border-danger @enderror"
                                            placeholder="Phone Number" value="{{ $profile->profile->phone_number ?? '' }}">
                                        @if ($errors->has('phone_number'))
                                            <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="" disabled
                                                {{ optional($profile->profile)->gender ? '' : 'selected' }}>
                                                Select Gender
                                            </option>
                                            <option value="Male"
                                                {{ old('gender', optional($profile->profile)->gender) === 'Male' ? 'selected' : '' }}>
                                                Male
                                            </option>
                                            <option value="Female"
                                                {{ old('gender', optional($profile->profile)->gender) === 'Female' ? 'selected' : '' }}>
                                                Female
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label for="email_address">Select Your Blood Group :</label>
                                    <div class="form-group">
                                        <select name="blood_group" id="blood_group" class="form-control">
                                            <option selected disabled>Select Your Blood Group</option>
                                            <option value="A+"
                                                {{ old('blood_group', optional($profile->profile)->blood_group) === 'A+' ? 'selected' : '' }}>
                                                A+
                                            </option>
                                            <option value="B+"
                                                {{ old('blood_group', optional($profile->profile)->blood_group) === 'B+' ? 'selected' : '' }}>
                                                B+
                                            </option>
                                            <option value="A-"
                                                {{ old('blood_group', optional($profile->profile)->blood_group) === 'A-' ? 'selected' : '' }}>
                                                A-
                                            </option>
                                            <option value="B-"
                                                {{ old('blood_group', optional($profile->profile)->blood_group) === 'B-' ? 'selected' : '' }}>
                                                B-
                                            </option>
                                            <option value="AB+"
                                                {{ old('blood_group', optional($profile->profile)->blood_group) === 'AB+' ? 'selected' : '' }}>
                                                AB+
                                            </option>
                                            <option value="AB-"
                                                {{ old('blood_group', optional($profile->profile)->blood_group) === 'AB-' ? 'selected' : '' }}>
                                                AB-
                                            </option>
                                            <option value="O-"
                                                {{ old('blood_group', optional($profile->profile)->blood_group) === 'O-' ? 'selected' : '' }}>
                                                O-
                                            </option>
                                            <option value="O+"
                                                {{ old('blood_group', optional($profile->profile)->blood_group) === 'O+' ? 'selected' : '' }}>
                                                O+
                                            </option>

                                        </select>

                                        @if ($errors->has('blood_name'))
                                            <span class="text-danger">{{ $errors->first('blood_name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="all_donation_time"> All Donation Time :</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="All Donation Time"
                                            name="all_donation_time"
                                            value="{{ $profile->profile->all_donation_time ?? '' }}">
                                        @if ($errors->has('all_donation_time'))
                                            <span class="text-danger">{{ $errors->first('all_donation_time') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label for="email_address">Previous Donation Date :</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="dateInput"
                                            placeholder="Previous Donation Date" onfocus="(this.type='date')"
                                            onblur="(this.type='text')" name="previous_donation_date"
                                            value="{{ $profile->profile->previous_donation_date ?? '' }}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info">Update Information</button>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Address Change</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <div class="col-lg-12 col-md-12">
                                <label for="email_address">Username :</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="email_address">User Phone Number :</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Phone Number">
                                </div>
                            </div>
                            <button class="btn btn-info">Update Address</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Password Change</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('profile.ChangePassword') }}" method="POST">
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <label for="email_address">Old Password :</label>
                                    <div class="form-group">
                                        <input type="password" name="old_password"
                                            class="form-control @error('old_password') border border-danger @enderror"
                                            placeholder="Old Password ">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label for="email_address">New Password :</label>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control @error('new_password') border border-danger @enderror"
                                            placeholder="New Password" name="new_password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label for="email_address">Confirm password :</label>
                                    <div class="form-group">
                                        <input type="password"
                                            class="form-control @error('con_password') border border-danger @enderror"
                                            name="con_password" placeholder="Confirm password">
                                    </div>
                                    @error('con_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-info">Update Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @push('footer_scripts')
            <script src="{{ asset('assets/admin/plugins/dropify/js/dropify.min.js') }}"></script>
            <script src="{{ asset('assets/admin/js/pages/forms/dropify.js') }}"></script>
            <script src="{{ asset('assets/coustom/address.js') }}"></script>
        @endpush
    @endsection
