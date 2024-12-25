@extends('app')
@section('title', 'Search')



@section('frontend_content')

    <div class="container ">
        <main class="main">
            <div class="">
                <!-- Filter Section -->
                <div class="filter-section">
                    <select>
                        <option>AB+</option>
                        <option>A+</option>
                        <option>B+</option>
                    </select>

                    <input type="text" class="form-control" id="district" autocomplete="off" placeholder="District Name">
                    <input type="hidden" id="district_id" name="district_id" value="" class="form-control">

                    <div id="district-list-container">
                        <ul id="district-list" class="list-group phone_version mt-4"></ul>
                    </div>

                    <input type="text" id="upazila" autocomplete="off"
                        value="{{ old('upazila', auth()->user()->upazila->name ?? '') }}" class="form-control"
                        placeholder="Upazila Name">
                    <input type="hidden" id="upazila_id" name="upazila_id" value="{{ auth()->user()->id ?? '' }}"
                        class="form-control">
                    <div id="upazila-list-container">
                        <ul id="upazila-list" class="list-group phone_version mt-4"></ul>
                    </div>


                    <input type="text" id="union" autocomplete="off"
                        value="{{ old('union', auth()->user()->union->name ?? '') }}" class="form-control"
                        placeholder="Union Name">
                    <input type="hidden" id="union_id" name="union_id" value="{{ auth()->user()->id ?? '' }}"
                        class="form-control">
                    <div id="union-list-container">
                        <ul id="union-list" class="list-group phone_version mt-4"></ul>
                    </div>


                    <input type="text" id="dateInput" placeholder="Last Donation Date" onfocus="(this.type='date')"
                        onblur="(this.type='text')">
                    <a class="btn filter_search" href="">

                        <i class="fa fa-search icon"></i>

                    </a>
                </div>

                <!-- Cards Section -->
                <div class="card-container">
                    <div class="card bg-white">
                        <div class="body">

                            <div class="cover_bg_image">
                                <h3>Junayed Rahman Faiaz</h3>
                                <h4>AB+ Blood Doner</h4>
                            </div>
                            <img src="{{ asset('assets/frontend/img/profile.png') }}" alt="Profile Image">
                            <p>Mymensingh, Haluaghat, Dhara</p>
                            <div class="cardbtn">
                                <button class="btn view">View Profile</button>
                                <button class="btn message">Message</button>
                            </div>
                            <div class="timer">

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Pagination -->
            <div class="bottomsec py-2">
                <select name="page" id="bottom">
                    <option value="">Show 12</option>
                    <option value="">Show 24</option>
                    <option value="">Show 36</option>
                </select>
                <div class="pagination">
                    <a href="#" class="arrow">&laquo;</a>
                    <a href="#" class="active">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#">...</a>
                    <a href="#">6</a>
                    <a href="#" class="arrow">&raquo;</a>
                </div>
            </div>

        </main>
    </div>

    @push('footer_scripts')
        <script>
            document.getElementById('district').addEventListener('input', function() {
                // Fetch and display suggestions in #district-list
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
