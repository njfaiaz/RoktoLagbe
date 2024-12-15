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
                            <div>

                                <input type="file" id="dropify-event"
                                    data-default-file="{{ asset('assets/admin/images/profile_av.jpg') }}"
                                    class="rounded-circle shadow ">

                                @error('profile_image')
                                    <span class='text-danger'>{{ $message }}</span>
                                @enderror
                            </div><br>
                            <button class="btn btn-info">Save Changes</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Basic Information</strong> Settings</h2>
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
                            <div class="col-lg-12 col-md-12">
                                <label for="email_address">Select Your Gender :</label>
                                <div class="form-group">
                                    <div class="radio inlineblock m-r-20">
                                        <input type="radio" name="gender" class="with-gap" value="option1"
                                            checked="">
                                        <label for="male">Male</label>
                                    </div>
                                    <div class="radio inlineblock">
                                        <input type="radio" name="gender" class="with-gap" value="option2">
                                        <label for="Female">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="email_address">Select Your Blood Group :</label>
                                <div class="form-group">
                                    <select class="form-control">
                                        <option selected disabled>Select Your Blood Group</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <label for="email_address"> All Donation Time :</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="All Donation Time">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="email_address">Previous Donation Date :</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="dateInput"
                                        placeholder="Previous Donation Date" onfocus="(this.type='date')"
                                        onblur="(this.type='text')">
                                </div>
                            </div>
                            <button class="btn btn-info">Update Information</button>
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
                            <div class="col-lg-12 col-md-12">
                                <label for="email_address">Old Password :</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Old Password ">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="email_address">New Password :</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <label for="email_address">Confirm password :</label>
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Confirm password">
                                </div>
                            </div>
                            <button class="btn btn-info">Update Password</button>
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
