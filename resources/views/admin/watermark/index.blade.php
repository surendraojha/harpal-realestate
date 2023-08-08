@extends('admin.layouts.main')

@section('title')
{{$module}}
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>{{$module}}</h2>
                    </div>

                </div>
            </div>

            <div class="row clearfix">

                <div class="col-xl-8 col-lg-8 col-md-7">
                    <form action="{{ route('watermark.store') }}" method="post" enctype="multipart/form-data">

                        <div class="card">

                            <div class="body">

                                @csrf
                                <div class="row clearfix">

                                    <div class="col-lg-12 col-md-12">
                                    <div class="form-group">

                                            <label for="watermark">Watermark</label>
                                          <input id="watermark" type="file" name="watermark" accept="image/*">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <img src="{{asset('uploads/'.$setting->watermark)}}" alt="">
                                    </div>
                                </div>



                                </div>
                                <button type="submit" class="btn btn-round btn-primary">Update</button> &nbsp;&nbsp;
                                {{-- <a href="{{ route('settings.index') }}" class="btn btn-round btn-default">Close</a> --}}

                                <!-- session messages -->
                            </div>
                        </div>
                </div>




            </div>

        </div>
    </div>
@endsection
