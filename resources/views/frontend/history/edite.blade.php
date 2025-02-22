@extends('app')
@section('title', 'Blood Donate Information')



@section('frontend_content')

    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 mt-3">
            <div class="container">
                <div class="card bg-white">
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Who received the blood transfusion">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"></label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>District Name</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"></label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Upazila Name</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"></label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option selected disabled>Union Name</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1"></label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="What was the original problem of the person you donated blood to?"></textarea>
                            </div>

                            <button class="btn btn-light mt-3">Submit Info</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
