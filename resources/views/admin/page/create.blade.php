
    <div class="row clearfix">
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Title</span>
                    </div>

                    <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}"
                        name="title" placeholder="Title *" autocomplete=off>

                    @error('title')
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

        {{-- Content --}}

        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Content
                    </span>
                </div>
                <div class="input-group">


                    <textarea name="content"  class='tinymce'
                        rows="10">{{ old('content') }}</textarea>


                    @error('content')
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

                    <input type="number" class="form-control @error('order') is-invalid @enderror"
                        value="{{old('order')}}" name="order" placeholder="Display Order *">

                    @error('order')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Add in menu? --}}
        {{-- <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Display In Menu  ?</span>
                    </div>

                    <select name="in_menu" id="" class="form-control @error('in_menu') is-invalid @enderror">
                        <option value="" disabled selected>Select Option
                        </option>
                        <option value="1" {{ old('in_menu') == '1' ? 'selected' : '' }}>Yes </option>
                        <option value="0" {{ old('in_menu') == '0' ? 'selected' : '' }}>No </option>
                    </select>


                    @error('in_menu')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div> --}}

       {{-- Status --}}

       <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status
                    </span>
                </div>

                <select name="status" id="" class="form-control @error('status') is-invalid @enderror">
                    <option value="" disabled selected>Select Option</option>
                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>InActive</option>
                </select>


                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>


    <div class="col-12">
        <button type="submit" class="btn btn-primary">Add</button>
        <a class="btn btn-secondary" href="{{ route('page.index') }}">
            Close
        </a>
    </div>
    </div>
</form>
