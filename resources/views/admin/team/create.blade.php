<form action="{{route('team.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>

                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}"
                        name="name" placeholder="Enter Name *">

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

                    <input type="text" class="form-control @error('designation') is-invalid @enderror"
                        value="{{old('designation')}}" name="designation" placeholder="Enter Designation">

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

                    {!! Form::select('team_category_id', $categories, null, ['placeholder' => 'Select
                    Team Category',
                    'class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        {{-- message --}}

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Message</span>
                </div>
                <div class="input-group">


                    <textarea name="message" class='tinymce'>{{ old('message') }}</textarea>


                    @error('message')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- display order --}}
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Display Order</span>
                    </div>

                    <input type="text" class="form-control @error('order') is-invalid @enderror"
                        value="{{old('order')}}" name="order" placeholder="Enter Display Order">

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

                    <input type="text" class="form-control @error('facebook') is-invalid @enderror"
                        value="{{old('facebook')}}" name="facebook" placeholder="Enter facebook link">

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

                    <input type="text" class="form-control @error('twitter') is-invalid @enderror"
                        value="{{old('twitter')}}" name="twitter" placeholder="Enter twitter link">

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

                    <input type="text" class="form-control @error('instagram') is-invalid @enderror"
                        value="{{old('instagram')}}" name="instagram" placeholder="Enter instagram link">

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

                    <input type="text" class="form-control @error('linkedin') is-invalid @enderror"
                        value="{{old('linkedin')}}" name="linkedin" placeholder="Enter linkedin link">

                    @error('linkedin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>


        <div class="col-12">
            <button type="submit" class="btn btn-primary">Add</button>
            <a class="btn btn-secondary" href="{{route('team.index')}}">
                CLOSE
            </a>
        </div>
    </div>
</form>
