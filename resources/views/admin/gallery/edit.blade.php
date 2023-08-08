@extends('admin.layouts.main')

@section('title')
Edit Gallery

@endsection

@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit Gallery
                    </h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#addUser">Edit
                                Gallery
                            </a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane active show" id="addUser">
                            <div class="body mt-2">
                                {!! Form::model($information,['route' => ['gallery.update',$information->id], 'method' => 'post','files'=>true]) !!}

                                @csrf
                                @method('put')
                                @include('admin.gallery.form')
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-secondary" href="{{route('gallery.show',$id)}}">
                                        Close
                                    </a>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
