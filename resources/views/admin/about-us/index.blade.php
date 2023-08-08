@extends('admin.layouts.main')
@section('title')
About Us
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>About Us</h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <!-- search form -->
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">


                        <li class="nav-item"><a class="nav-link  active show " data-toggle="tab" href="#addUser">About
                                Us</a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane  active show " id="addUser">
                            <div class="body mt-2">
                                <form action="{{route('about-us.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <div class="row clearfix">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                               <img height="250px" src="{{ asset('public/uploads/'.@$information->photo) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Title</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        name="title" placeholder="Title *"
                                                        value="{{ old('title',@$information->title) }}">

                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        {{-- subtitle --}}
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Sub Title</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('subtitle') is-invalid @enderror"
                                                        name="subtitle" placeholder="Title *"
                                                        value="{{ old('subtitle',@$information->subtitle) }}">

                                                    @error('subtitle')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- short description  --}}

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Short Description</span>
                                                </div>
                                                <div class="input-group">
                                                    <textarea name="short_description"
                                                        class="ckeditor @error('short_description') is-invalid @enderror"
                                                        id="" >{{ old('short_description',@$information->short_description) }}</textarea>

                                                    @error('short_description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- content --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Content</span>
                                                </div>
                                                <div class="input-group">
                                                    <textarea name="description"
                                                        class="ckeditor @error('description') is-invalid @enderror"
                                                        id="" cols="30"
                                                        rows="10">{{ old('description',@$information->description) }}</textarea>

                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                         {{-- Featured Photo --}}
                                         <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Featured Photo</span>
                                                </div>
                                                <div class="input-group">

                                                    <input type="file" name="featured_photo">
                                                </div>
                                            </div>


                                            @if(@$information->featured_photo)
                                                <img height="300px" src="{{asset('uploads/'.@$information->featured_photo)}}" alt="">
                                            @endif
                                        </div>

                                        {{-- Photo --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Photo</span>
                                                </div>
                                                <div class="input-group">

                                                    <input type="file" name="photo">
                                                </div>
                                            </div>


                                            @if(@$information->photo)
                                                <img height="300px" src="{{asset('uploads/'.@$information->photo)}}" alt="">
                                            @endif
                                        </div>



                                        {{-- term and value for counter --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <table class="table">
                                                <tr>
                                                    <th>
                                                        <input type="text" name="title_1" placeholder="Counter 1 Title"
                                                        value="{{old('title_1',@$information->title_1)}}" class="form-control">
                                                    </th>
                                                    <th>
                                                        <input type="text" name="value_1"
                                                        placeholder="Counter 1 Value"
                                                        value="{{old('value_1',@$information->value_1)}}" class="form-control">
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <input type="text" name="title_2" placeholder="Counter 2 Title"
                                                        value="{{old('title_2',@$information->title_2)}}" class="form-control">
                                                    </th>
                                                    <th>
                                                        <input type="text" name="value_2"
                                                        placeholder="Counter 2 Value"
                                                        value="{{old('value_2',@$information->value_2)}}" class="form-control">
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <input type="text" name="title_3" placeholder="Counter 3 Title"
                                                        value="{{old('title_3',@$information->title_3)}}" class="form-control">
                                                    </th>
                                                    <th>
                                                        <input type="text" name="value_3"
                                                        placeholder="Counter 3 Value"
                                                        value="{{old('value_3',@$information->value_3)}}" class="form-control">
                                                    </th>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <input type="text" name="title_4" placeholder="Counter 4 Title"
                                                        value="{{old('title_4',@$information->title_4)}}" class="form-control">
                                                    </th>
                                                    <th>
                                                        <input type="text" name="value_4"
                                                        placeholder="Counter 4 Value"
                                                        value="{{old('value_4',@$information->value_4)}}" class="form-control">
                                                    </th>
                                                </tr>
                                            </table>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a class="btn btn-secondary" href="{{ url('admin') }}">
                                                CLOSE
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
