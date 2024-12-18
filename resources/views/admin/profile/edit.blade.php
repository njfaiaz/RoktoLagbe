@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-select/css/bootstrap-select.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                    <div class="card ">
                        <div class="header">
                            <h2><strong>Profile</strong> Settings</h2>
                        </div>
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
                            <h2><strong>Basic</strong> Settings</h2>
                        </div>
                        <div class="body">
                            <form action="{{ route('profileInfo.update', $profile->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $profile->id }}">
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
                                        <select name="blood_id" id="blood_group" class="form-control">
                                            <option selected disabled>Select Your Blood Group</option>
                                            @foreach ($bloods as $blood)
                                                <option value="{{ $blood->id }}"
                                                    {{ old('blood_id', $profile->blood_id) == $blood->id ? 'selected' : '' }}>
                                                    {{ $blood->blood_name }}
                                                </option>
                                            @endforeach

                                        </select>
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
                            <form action="{{ route('addressInfo.update', $profile->id) }}" method="POST">
                                @csrf
                                <div class="col-lg-12 col-md-12">
                                    <label for="district_id">Select District:</label>
                                    <select name="district_id" id="district_id" class="form-control " required>
                                        <option value="" selected disabled>Select District</option>
                                        @foreach ($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->district_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <label for="upazila_id">Select Upazila:</label>
                                    <select name="upazila_id" id="upazila_id" class="form-control " required>
                                        @foreach ($upazilaes as $upazila)
                                            <option value="{{ $upazila->id }}">{{ $upazila->upazila_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <label for="union_id">Select Union:</label>
                                    <select name="union_id" id="union_id" class="form-control " required>
                                        @foreach ($unions as $union)
                                            <option value="{{ $union->id }}">{{ $union->union_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Address Update</button>
                            </form>
                        </div>
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
