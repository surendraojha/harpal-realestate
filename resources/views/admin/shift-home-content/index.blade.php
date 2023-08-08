@extends('admin.layouts.main')
@section('title')
Shift Home Content
@endsection
@section('content')
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Shift Home Content</h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <!-- search form -->
            <div class="col-lg-12">
                <div class="card">

                    <div class="tab-content mt-0">

                        <div class="tab-pane  active show " id="addUser">
                            <div class="body mt-2">
                                <form action="{{route('shift-home-content.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <div class="row clearfix">





                                        {{-- content --}}
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Content</span>
                                                </div>
                                                    <textarea name="shift_home_content"
                                                        class="ckeditor @error('shift_home_content') is-invalid @enderror"
                                                        id="" cols="30"
                                                        rows="10">{{ old('shift_home_content',@$setting->shift_home_content) }}</textarea>

                                                    @error('shift_home_content')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                            </div>
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
