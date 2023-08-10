@extends('front-new.layouts.main')

@section('content')
    <div class="propertylist-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 property-box">
                    <form>
                        <h2>Please list your property here.</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Property Type</label>
                                <select name="main_category_id" id="main_category_id" class="form-control">
                                    <option value="">-- Type of Property --</option>
                                    @foreach ($categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Parent Category</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control">
                                    <option value="">-- Type of Property --</option>
                                    {{-- @foreach ($categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach --}}

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Parent Category</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control">
                                    <option value="">-- Select Option --</option>
                                    {{-- @foreach ($categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach --}}

                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label>Category</label>
                                <select name="child_category_id" id="child_category_id" class="form-control">
                                    <option value="">-- Select Option --</option>
                                    {{-- @foreach ($categories as $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach --}}

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Purpose</label>
                                <select name="purpose_id" id="purpose_id" class="form-control">
                                    <option value="">-- Select Option --</option>
                                    @foreach ($purposes as $value)
                                        <option value="{{ $value->id }}">{{ $value->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="message">Address</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="name" class="form-control" placeholder="street Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="name" class="form-control" placeholder="Post Code">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="name" class="form-control" placeholder="Provience">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="name" class="form-control" placeholder="Country">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="message">Price Range</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="name" class="form-control" placeholder="Rs 123456.00">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="name" class="form-control" placeholder="Rs 123456.00">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="name" class="">Property Measurement</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="number" class="form-control" placeholder="200 sq">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" name="number" class="form-control" placeholder="200 sq">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="subject" class="">Mobile</label>
                                    <input type="number" name="number" class="form-control" placeholder="1234567890">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="subject" class="">Email Id</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email ID">
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="md-form">
                                    <label for="message">Your message</label>
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"
                                        placeholder="Property related your message"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 center-on-small-only">
                                <a class="btn btn-primary"
                                    onclick="document.getElementById('contact-form').submit();">Send</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
