
                            <div class="body mt-2">
                                <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf


                                    <div class="row clearfix">


                                        {{-- display banner --}}

                                        <div class="col-lg-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">Title</span>
                                                    </div>

                                                    <input type="text"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                         name="title"
                                                        placeholder="Title *" value="{{ old('title') }}">

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
                                                        placeholder="Sub Title *" value="{{ old('sub_title') }}">

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
                                                         name="link" placeholder="Link " value="{{ old('link') }}">

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
                                                        placeholder="Order *" value="{{ old('order') }}">

                                                    @error('order')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                            <a class="btn btn-secondary" href="{{ route('banner.index') }}">
                                                CLOSE
                                            </a>
                                        </div>
                                    </div>
                                </form>
