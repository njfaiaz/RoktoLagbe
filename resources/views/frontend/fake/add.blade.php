@extends('app')

@section('title', 'Fake User Add')


@section('frontend_content')



    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
            <div class="container">
                <div class="card bg-white">
                    <div class="card-body">

                        <form action="{{ route('user.fake.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input type="text" class="form-control" name="fake_user_name"
                                    value="{{ old('fake_user_name') }}" placeholder="Fake User Full Name">
                                @error('fake_user_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="text" name="fake_user_phone_number" class="form-control"
                                    value="{{ old('fake_user_phone_number') }}" placeholder="Fake User Phone Number">
                                @error('fake_user_phone_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label></label>
                                <textarea name="fake_user_details" class="form-control" placeholder="Please describe how you were deceived.">{{ old('fake_user_details') }}</textarea>
                                @error('fake_user_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="my-2">

                                <button type="submit" class="btn btn-primary">Submit Info</button>
                            </div>


                        </form>


                    </div>
                </div>
            </div>

        </div>
    </div>


    @push('footer_scripts')
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
                            $('#district-list-donate').empty();
                            data.forEach(district => {
                                $('#district-list-donate').append(
                                    `<li class="form-control" data-id="${district.id}">${district.district_name}</li>`
                                );
                            });
                        }
                    });
                });

                // Select District
                $(document).on('click', '#district-list-donate li', function() {
                    let districtId = $(this).data('id');
                    $('#district').val($(this).text());
                    $('#district_id').val(districtId);
                    $('#district-list-donate').empty();
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
                                $('#upazila-list-donate').empty();
                                data.forEach(upazila => {
                                    $('#upazila-list-donate').append(
                                        `<li class="form-control" data-id="${upazila.id}">${upazila.upazila_name}</li>`
                                    );
                                });
                            }
                        });
                    });

                    // Select Upazila
                    $(document).on('click', '#upazila-list-donate li', function() {
                        let upazilaId = $(this).data('id');
                        $('#upazila').val($(this).text());
                        $('#upazila_id').val(upazilaId);
                        $('#upazila-list-donate').empty();
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
                                $('#union-list-donate').empty();
                                data.forEach(union => {
                                    $('#union-list-donate').append(
                                        `<li class="form-control" data-id="${union.id}">${union.union_name}</li>`
                                    );
                                });
                            }
                        });
                    });

                    // Select Union
                    $(document).on('click', '#union-list-donate li', function() {
                        let unionId = $(this).data('id');
                        $('#union').val($(this).text());
                        $('#union_id').val(unionId);
                        $('#union-list-donate').empty();
                    });
                }
            });
        </script>
    @endpush
@endsection
