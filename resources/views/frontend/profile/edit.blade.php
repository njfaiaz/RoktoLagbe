@extends('app')

@push('style')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/dropify.min.css') }}">
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
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
            <div class="container">

                <form class="py-3">
                    <div class="form-group">
                        <input type="file" id="imageUpload" class="dropify custom-dropify" data-max-file-size="2M"
                            data-msg-placeholder="Upload your Profile" />
                    </div>
                    <div class="form-group mt-3">
                        <label for="exampleInputEmail1">Username :</label>
                        <input type="text" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name :</label>
                        <input type="text" class="form-control" placeholder="Enter Your Full Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 mt-3">
            <div class="container">

                <form action="{{ route('user.profile.store') }}" method="POST" class="py-3">
                    @csrf
                    <input type="hidden" name="user_id" value="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number :</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="">Select Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="Select Gender">
                                Select Gender
                            </option>
                            <option value="Male">
                                Male
                            </option>
                            <option value="Female">
                                Female
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Select Blood Group</label>
                        <select name="blood_id" id="blood_group" class="form-control">
                            <option selected disabled>Select Your Blood Group</option>
                            @foreach ($bloods as $blood)
                                <option value="{{ $blood->id }}">
                                    {{ $blood->blood_name ?: '' }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Select Blood Group</label>
                        <input type="text" class="form-control" id="dateInput" placeholder="Previous Donation Date"
                            onfocus="(this.type='date')" onblur="(this.type='text')" name="previous_donation_date"
                            value="">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

    @push('footer_scripts')
        <script src="{{ asset('assets/frontend/js/dropify.min.js') }}"></script>
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
    @endpush
@endsection
