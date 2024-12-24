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

        .m-b-30,
        .card {
            margin-bottom: 30px;
        }
    </style>
@endpush
@section('title', 'Profile Edit')



@section('frontend_content')
    <div class="row my-3">
        <div class="col-lg-4 col-md-4 col-sm-12 ">
            <div class="card bg-white">
                <div class="body">
                    <form class="py-3">
                        <div class="form-group">
                            <input type="file" id="imageUpload" class="dropify" data-max-file-size="10M"
                                data-msg-placeholder="Upload your Profile" />
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" class="form-control" placeholder="Enter Your Full Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <input type="email" class="form-control" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12 ">
            <div class="card bg-white py-3">
                <div class="body">
                    <form action="">
                        <div class="form-group ">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" class="form-control" placeholder="Phone Number">
                        </div>


                        <div class="form-group ">
                            <label for="exampleInputEmail1"></label>
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
                        <div class="form-group ">
                            <label for="exampleInputEmail1"></label>
                            <select name="blood_id" id="blood_group" class="form-control">
                                <option selected disabled>Select Your Blood Group</option>

                            </select>
                        </div>
                        <div class="form-group ">
                            <label for="exampleInputEmail1"></label>
                            <input type="text" class="form-control" id="dateInput" placeholder="Previous Donation Date"
                                onfocus="(this.type='date')" onblur="(this.type='text')" name="previous_donation_date"
                                value="">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>

                </div>
            </div>
            <div class="card bg-white pt-3">
                <div class="body">
                    <form method="POST" action="">
                        <div>
                            <label></label>
                            <input type="text" class="form-control" id="district" autocomplete="off"
                                value="{{ old('district', auth()->user()->district->name ?? '') }}"
                                placeholder="District Name">
                            <input type="hidden" id="district_id" name="district_id" value="{{ auth()->user()->id ?? '' }}"
                                class="form-control">
                            <ul id="district-list"></ul>
                        </div>

                        <div>
                            <label></label>
                            <input type="text" id="upazila" autocomplete="off"
                                value="{{ old('upazila', auth()->user()->upazila->name ?? '') }}" class="form-control"
                                placeholder="Upazila Name">
                            <input type="hidden" id="upazila_id" name="upazila_id" value="{{ auth()->user()->id ?? '' }}"
                                class="form-control">
                            <ul id="upazila-list"></ul>
                        </div>

                        <div>
                            <label></label>
                            <input type="text" id="union" autocomplete="off"
                                value="{{ old('union', auth()->user()->union->name ?? '') }}" class="form-control"
                                placeholder="Union Name">
                            <input type="hidden" id="union_id" name="union_id" value="{{ auth()->user()->id ?? '' }}"
                                class="form-control">
                            <ul id="union-list"></ul>
                        </div>

                        <button type="submit" class="btn btn-info">Update Address</button>
                    </form>

                </div>
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
                            url: '/search-upazilas',
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
                            url: '/search-unions',
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
            });
        </script>
    @endpush
@endsection
