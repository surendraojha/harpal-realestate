@extends('admin.layouts.main')

@section('title')
Edit Team
@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit Team</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#addUser">Edit
                                Team </a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane active show" id="addUser">
                            <div class="body mt-2">
                                <form action="{{route('team.update',$information->id)}}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">


                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Name</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        value="{{old('name',$information->name)}}" name="name"
                                                        placeholder="Enter Name *">

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- designation --}}

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Designation</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        value="{{old('designation',$information->designation)}}"
                                                        name="designation" placeholder="Enter Designation">

                                                    @error('designation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        {{-- photo --}}

                                        <div class="col-lg-6 col-md-6 col-sm-12">

                                            <img height="35px" width="35px"
                                                src="{{ asset('public/uploads/'.$information->photo) }}" alt="no photo">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Photo</span>
                                                    </div>

                                                    <input type="file" name="photo">

                                                    @error('photo')
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
                                                        <span class="input-group-text">Team Category</span>
                                                    </div>

                                                    {!! Form::select('team_category_id', $categories, $information->team_category_id, ['placeholder' => 'Select
                                                    Team Category',
                                                    'class'=>'form-control']) !!}
                                                </div>
                                            </div>
                                        </div>

                                        {{-- message --}}

                                        {{-- <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Message</span>
                                                </div>
                                                <div class="input-group">


                                                    <textarea name="message"
                                                    class='tinymce'>{{ old('message',$information->message) }}</textarea>


                                                    @error('message')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div> --}}

                                        {{-- display order --}}
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Display Order</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('order') is-invalid @enderror"
                                                        value="{{old('order',$information->order)}}" name="order"
                                                        placeholder="Enter Display Order">

                                                    @error('order')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        </div>

                                        {{-- facebook --}}
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">facebook</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('facebook') is-invalid @enderror"
                                                        value="{{old('facebook',$information->facebook)}}" name="facebook"
                                                        placeholder="Enter facebook link">

                                                    @error('facebook')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        {{-- twitter --}}
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">twitter</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('twitter') is-invalid @enderror"
                                                        value="{{old('twitter',$information->twitter)}}" name="twitter"
                                                        placeholder="Enter twitter link">

                                                    @error('twitter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        {{-- instagram --}}
                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">instagram</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('instagram') is-invalid @enderror"
                                                        value="{{old('instagram',$information->instagram)}}" name="instagram"
                                                        placeholder="Enter instagram link">

                                                    @error('instagram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- linkedin --}}

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">linkedin</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('linkedin') is-invalid @enderror"
                                                        value="{{old('linkedin',$information->linkedin)}}" name="linkedin"
                                                        placeholder="Enter linkedin link">

                                                    @error('linkedin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a class="btn btn-secondary" href="{{ route('team.index') }}">CLOSE</a>
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
