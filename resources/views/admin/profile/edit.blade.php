@extends('admin.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-select/css/bootstrap-select.css') }}">
@endpush

@section('title', 'Profile Edit')
@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Profile Edit</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item">Profile</li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                    <a href="{{ route('profile') }}" class="btn btn-info btn-icon float-right"><i
                            class="zmdi zmdi-check"></i></a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Example Tab -->
            <div class="row clearfix">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Account Settings</strong></h2>
                            <ul class="header-dropdown">
                                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i
                                            class="zmdi zmdi-more"></i> </a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                                <li class="remove">
                                    <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <p>Account Settings</p>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs p-0 mb-3">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                        href="#profile_edit">Profile</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address">Address</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#basic_information">Basic
                                        Information</a>
                                </li>
                            </ul>













                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="profile_edit">
                                    <div class="container-fluid">
                                        <form action="{{ route('profile.update', $profile->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $profile->id }}">
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-12">
                                                    <div class="card mcard_3">
                                                        <div class="body">
                                                            <div>
                                                                <input type="file" name="profile_image"
                                                                    id="dropify-event"
                                                                    data-default-file="{{ $profile->profile_image ? asset($profile->profile_image) : asset('assets/admin/images/profile_av.jpg') }}">

                                                                @error('profile_image')
                                                                    <span class='text-danger'>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-12">
                                                    <div class="card">
                                                        <div class="body">
                                                            <div class="row clearfix">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Username"
                                                                            value="{{ $profile->username }}" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            placeholder="Full Name" name="name"
                                                                            value="{{ $profile->name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control"
                                                                            placeholder="Email" name="email"
                                                                            value="{{ $profile->email }}">
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-info waves-effect m-t-20">Profile
                                                                        Update</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div role="tabpanel" class="tab-pane" id="address">
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="{{ route('address.update', $profile->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $profile->user_id }}">
                                        <div class="row clearfix">

                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="district">District Name:</label>
                                                    <input list="district-suggestions" id="district" name="district_id"
                                                        placeholder="Search District" class='form-control'>
                                                    <datalist id="district-suggestions">
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->district_name }}">
                                                                {{ $district->district_name }}</option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="district">Thana Name:</label>
                                                    <input list="thana-suggestions" id="thana" name="thana_id"
                                                        placeholder="Search Thana" disabled class='form-control'>
                                                    <datalist id="thana-suggestions">
                                                        @foreach ($thanas as $thana)
                                                            <option value="{{ $thana->thana_name }}">
                                                                {{ $thana->thana_name }}</option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="district">Union Name:</label>
                                                    <input list="union-suggestions" id="union" name="union_id"
                                                        placeholder="Search Union" disabled class='form-control'>
                                                    <datalist id="union-suggestions">
                                                        @foreach ($unions as $union)
                                                            <option value="{{ $union->union_name }}">
                                                                {{ $union->union_name }}</option>
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                            </div>


                                        </div>
                                        <button type="submit" class="btn btn-info waves-effect m-t-20">Address
                                            Update</button>
                                    </form>
                                </div>


                                <div role="tabpanel" class="tab-pane" id="basic_information">
                                    <form action="{{ route('basic-info.update', $profile->id) }}" method="POST">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="{{ $profile->profile->phone_number ?? '' }}"
                                                        placeholder="Enter phone number" name="phone_number">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="{{ $profile->profile->donation_time ?? '' }}"
                                                        placeholder="Enter Donation Time" name="donation_time">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                        value="{{ $profile->profile->donation_last_time ?? '' }}"
                                                        placeholder="Enter Your Last Donation Time"
                                                        name="donation_last_time">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="" disabled
                                                        {{ !$profile->profile->gender ? 'selected' : '' }}>
                                                        Select Gender</option>
                                                    <option value="Male"
                                                        {{ old('gender', $profile->profile->gender) === 'Male' ? 'selected' : '' }}>
                                                        Male
                                                    </option>
                                                    <option value="Female"
                                                        {{ old('gender', $profile->profile->gender) === 'Female' ? 'selected' : '' }}>
                                                        Female</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select name="blood_group" id="blood_group" class="form-control">
                                                    <option value="A+"
                                                        {{ old('blood_group', $profile->profile->blood_group) === '' ? 'selected' : '' }}>
                                                        A+</option>
                                                    <option value="B+"
                                                        {{ old('blood_group', $profile->profile->blood_group) === '' ? 'selected' : '' }}>
                                                        B+</option>
                                                    <option value="A-"
                                                        {{ old('blood_group', $profile->profile->blood_group) === '' ? 'selected' : '' }}>
                                                        B-</option>
                                                    <option value="B-"
                                                        {{ old('blood_group', $profile->profile->blood_group) === '' ? 'selected' : '' }}>
                                                        B-</option>
                                                    <option value="AB+"
                                                        {{ old('blood_group', $profile->profile->blood_group) === '' ? 'selected' : '' }}>
                                                        AB+</option>
                                                    <option value="AB-"
                                                        {{ old('blood_group', $profile->profile->blood_group) === '' ? 'selected' : '' }}>
                                                        AB-</option>
                                                    <option value="O-"
                                                        {{ old('blood_group', $profile->profile->blood_group) === '' ? 'selected' : '' }}>
                                                        O-</option>
                                                    <option value="O+"
                                                        {{ old('blood_group', $profile->profile->blood_group) === '' ? 'selected' : '' }}>
                                                        O+</option>
                                                </select>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-info waves-effect m-t-20">Basic Information
                                            Update</button>
                                    </form>


                                </div>
                            </div>
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
