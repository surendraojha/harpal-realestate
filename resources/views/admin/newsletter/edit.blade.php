@extends('admin.layouts.main')

@section('title')
    Edit Category
@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit Category</h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#addUser">Edit Category </a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane active show" id="addUser">
                            <div class="body mt-2">
                                <form action="{{route('category.update',$information->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="row clearfix">

                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Title</span>
                                                    </div>

                                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                        value="{{old('title',$information->title)}}" name="title" placeholder="Enter Category *">

                                                    @error('title')
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
                                            <a class="btn btn-secondary" href="#">CLOSE</a>
                                        </div>

                                </form>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
