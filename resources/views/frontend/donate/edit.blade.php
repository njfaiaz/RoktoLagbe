@extends('app')

@section('title', 'Profile Edit')


@section('frontend_content')



    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
            <div class="container">
                <div class="card bg-white">
                    <div class="card-body">

                        <form action="{{ route('donate-history.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input type="text" class="form-control" name="blood_receiver_name"
                                    value="{{ old('blood_receiver_name') }}"
                                    placeholder="Who received the blood transfusion">
                                @error('blood_receiver_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label></label>
                                <input type="text" name="blood_receiver_number" class="form-control"
                                    value="{{ old('blood_receiver_number') }}" placeholder="Blood Receiver Number">
                                @error('blood_receiver_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label></label>
                                <select name="blood_id" id="blood_group" class="form-control">
                                    <option value="" disabled
                                        {{ old('blood_id', isset($profile) ? $profile->blood_id : null) ? '' : 'selected' }}>
                                        Select Your Blood Group
                                    </option>
                                    @foreach ($bloods as $blood)
                                        <option value="{{ $blood->id }}"
                                            {{ old('blood_id', isset($profile) ? $profile->blood_id : null) == $blood->id ? 'selected' : '' }}>
                                            {{ $blood->blood_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('blood_group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label></label>
                                @php
                                    $today = date('Y-m-d');
                                @endphp

                                <input type="date"
                                    class="form-control @error('donation_date') border border-danger @enderror"
                                    name="donation_date" value="{{ old('donation_date', $profile->donation_date ?? '') }}"
                                    max="{{ $today }}" type="date">
                                @error('donation_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gender"></label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select
                                        Gender</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>




                            <div class="form-group">
                                <label></label>
                                <textarea name="patient_details" class="form-control" placeholder="Patient Details">{{ old('patient_details') }}</textarea>
                                @error('patient_details')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div>
                                <label></label>
                                <input type="text" class="form-control" id="district" autocomplete="off"
                                    value="{{ old('district', auth()->user()->district->name ?? '') }}"
                                    placeholder="District Name">
                                <input type="hidden" id="district_id" name="district_id"
                                    value="{{ auth()->user()->id ?? '' }}" class="form-control">
                                <ul id="district-list-donate"></ul>
                            </div>

                            <div>
                                <label></label>
                                <input type="text" id="upazila" autocomplete="off"
                                    value="{{ old('upazila', auth()->user()->upazila->name ?? '') }}" class="form-control"
                                    placeholder="Upazila Name">
                                <input type="hidden" id="upazila_id" name="upazila_id"
                                    value="{{ auth()->user()->id ?? '' }}" class="form-control">
                                <ul id="upazila-list-donate"></ul>
                            </div>

                            <div>
                                <label></label>
                                <input type="text" id="union" autocomplete="off"
                                    value="{{ old('union', auth()->user()->union->name ?? '') }}" class="form-control"
                                    placeholder="Union Name">
                                <input type="hidden" id="union_id" name="union_id" value="{{ auth()->user()->id ?? '' }}"
                                    class="form-control">
                                <ul id="union-list-donate"></ul>
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
