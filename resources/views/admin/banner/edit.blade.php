@extends('admin.layouts.main')
@section('title')
Banner
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Banner </h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <!-- search form -->
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">


                        <li class="nav-item"><a class="nav-link  active show "
                                data-toggle="tab" href="#addUser">Banner</a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane  active show " id="addUser">
                            <div class="body mt-2">
                                <form action="{{route('banner.update',$information->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="row clearfix">


                                        {{-- display banner --}}


                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                               <img height="250px" src="{{ asset('public/uploads/'.$information->photo) }}" alt="">
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
                                                         name="title"
                                                        placeholder="Title *" value="{{ old('title',@$information->title) }}">

                                                    @error('title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Sub Title </span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('sub_title') is-invalid @enderror"
                                                         name="sub_title"
                                                        placeholder="Sub Title *" value="{{ old('sub_title',@$information->sub_title) }}">

                                                    @error('sub_title')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Photo --}}


                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Photo</span>
                                                    </div>

                                                    <input type="file"
                                                        class="form-control"
                                                         name="photo">

                                                    @error('photo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                          {{-- Link --}}


                                          <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Link </span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control"
                                                         name="link" placeholder="Link " value="{{ old('link',$information->link) }}">

                                                    @error('link')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        {{-- Display Order --}}
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Display Order</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('order') is-invalid @enderror"
                                                        name="order"
                                                        placeholder="Order *"
                                                        value="{{ old('order',$information->order) }}">

                                                    @error('order')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a class="btn btn-secondary" href="#">
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
