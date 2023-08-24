@extends('front.layouts.profile')


@section('title','Profile')

@section('content')
    <div class="ContactForm moreDetailSignup">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                        Personal Details
                    </h6>
                    <div class="customForm">
                        <div class="d-flex profileImageBox">
                            <label for="inputProfile" class="inputBox position-relative">

                                @if (@$profile->photo)
                                    @php
                                        $path = asset('uploads/' . @$profile->photo);
                                    @endphp
                                @else
                                    @php
                                        $path = asset('front/assets/imgs/user.webp');
                                    @endphp
                                @endif

                                <img id="profileImage" src="{{ $path }}" alt="photo">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" name="photo" onchange="readURL(this);" id="inputProfile" class="d-none">
                            <label for="inputProfile" class="editText">
                                <i class="fa-solid fa-user-pen"></i>Add Image
                            </label>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-1">
                    <div class="form-floating customForm">
                        <select class="form-select form-control {{ $errors->has('name_append') ? ' is-invalid' : '' }}" id="title"
                        name="name_append"
                        aria-label="Floating label select example">

                        <option value="" disabled selected>Choose Option</option>
                            <option value="Mr."
                            {{old('name_append',@$profile->name_append)=='Mr.'?'selected':''}}
                            >Mr.</option>
                            <option value="Mrs."
                            {{old('name_append',@$profile->name_append)=='Mrs.'?'selected':''}}
                            >Mrs.</option>
                            <option value="Miss"
                            {{old('name_append',@$profile->name_append)=='Miss'?'selected':''}}

                            > Miss.</option>
                            <option value="Dr."
                            {{old('name_append',@$profile->name_append)=='Dr.'?'selected':''}}

                            >Dr.</option>
                        </select>
                        <label for="title">Title</label>


                        @error('name_append')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div> --}}




                {{-- name --}}
                <div class="col-md-4">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="fName"
                            placeholder="eg.John" name="name" value="{{ old('name', $user->name) }}">
                        <label for="fName">
                            Full Name
                        </label>

                        @error('name')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                </div>



                {{-- email --}}

                <div class="col-md-4">
                    <div class="form-floating customForm">
                        <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            id="fName" placeholder="eg.John" name="email" value="{{ old('email', $user->email) }}">
                        <label for="fName">
                            Email
                        </label>

                        @error('email')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                </div>
                {{-- phone --}}
                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="tel" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                            id="pNumber" placeholder="eg.Nepal" name="phone" value="{{ old('phone', $user->phone) }}">
                        <label for="pNumber">
                            Phone Number
                        </label>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-floating customForm">

                        <textarea name="about_me" class="form-control {{ $errors->has('about_me') ? ' is-invalid' : '' }}" cols="30" rows="10">{{ old('about_me',@$user->profile->about_me) }}</textarea>

                        <label for="fName">
                            About Me
                        </label>

                        @error('about_me')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                </div>


                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}"

                             placeholder="eg.Nepal" name="country"
                             value="{{ old('country', @$user->profile->country) }}">
                        <label for="pNumber">
                             country
                        </label>

                        @error('country')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>


                @if(in_array($user->role,['agent','agency']))
                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="number" class="form-control {{ $errors->has('experience') ? ' is-invalid' : '' }}"

                            id="pNumber" min="0" placeholder="eg.Nepal" name="experience"
                             value="{{ old('experience', @$user->profile->experience) }}">
                        <label for="pNumber">
                            Years of Experience
                        </label>

                        @error('experience')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>
                @endif


                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control {{ $errors->has('facebook') ? ' is-invalid' : '' }}"

                             placeholder="https://facebook.com/id" name="facebook"
                             value="{{ old('facebook', @$user->profile->facebook) }}">
                        <label for="pNumber">
                             facebook
                        </label>

                        @error('facebook')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control {{ $errors->has('twitter') ? ' is-invalid' : '' }}"

                             placeholder="https://twitter.com/id" name="twitter"
                             value="{{ old('twitter', @$user->profile->twitter) }}">
                        <label for="pNumber">
                             twitter
                        </label>

                        @error('twitter')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control {{ $errors->has('linkedin') ? ' is-invalid' : '' }}"

                             placeholder="https://linkedin.com/id" name="linkedin"
                             value="{{ old('linkedin', @$user->profile->linkedin) }}">
                        <label for="pNumber">
                             linkedin
                        </label>

                        @error('linkedin')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control {{ $errors->has('instagram') ? ' is-invalid' : '' }}"

                             placeholder="https://instagram.com/id" name="instagram"
                             value="{{ old('instagram', @$user->profile->instagram) }}">
                        <label for="pNumber">
                             instagram
                        </label>

                        @error('instagram')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control {{ $errors->has('website') ? ' is-invalid' : '' }}"

                             placeholder="https://website.com/id" name="website"
                             value="{{ old('website', @$user->profile->website) }}">
                        <label for="pNumber">
                             website
                        </label>

                        @error('website')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>


                {{-- gender --}}
                {{-- <div class="col-md-3">
                    <div class="form-floating customForm">
                        <select name="gender" id=""
                            class="form-select form-control {{ $errors->has('gender') ? ' is-invalid' : '' }}">
                            <option value="" disabled selected>Select Gender</option>
                            <option value="male" {{ old('gender', strtolower($user->gender)) == 'male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="female" {{ old('gender', strtolower($user->gender)) == 'female' ? 'selected' : '' }}>
                                Female</option>
                            <option value="others" {{ old('gender', strtolower($user->gender)) == 'others' ? 'selected' : '' }}>
                                Others</option>
                        </select>
                        <label for="pNumber">
                            Gender
                        </label>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">

                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div> --}}


                {{-- @php
                    $current_date = date('Y-m-d', strtotime('-15 years'));

                @endphp

                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="date" class="form-control {{ $errors->has('dob') ? ' is-invalid' : '' }}" id="dob" name="dob" placeholder="eg.John"
                            max="{{$current_date}}"  value="{{old('dob',@$profile->dob)}}">
                        <label for="dob">
                            Date Of Birth
                        </label>

                        @error('dob')
                        <span class="invalid-feedback" role="alert">

                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                </div> --}}


                <div class="col-12">
                    <h6 class="mt-3 mb-4 text-center">
                        Basic Property Query
                    </h6>
                </div>
                <div class="col-md-4">
                    <div class="customForm">
                        <span class="radioTitle">
                            Who are You ?
                        </span>
                        <div class="d-flex">
                            @php


                            @endphp

                            {{-- general user --}}
                            <div class="form-check">

                                <label class="form-check-label" for="user">
                                    {{ ucwords(auth()->user()->role) }}
                                </label>

                                <a href="{{ route('user-upgrade') }}">Want to change your role?</a>
                            </div>




                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="customForm">
                        <span class="radioTitle">
                            You Own
                        </span>
                        <div class="d-flex">
                            <div class="form-check">
                                <input class="form-check-input {{ $errors->has('you_own') ? ' is-invalid' : '' }}"
                                    name="you_own[]" type="checkbox" value="House" id="House"

                                    @if(in_array('House',$you_own))
                                        checked
                                    @endif
                                    >
                                <label class="form-check-label" for="House">
                                    House
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="you_own[]" type="checkbox" value="Apartment"
                                    id="Apartment"

                                    @if(in_array('Apartment',$you_own))
                                        checked
                                    @endif
                                    >
                                <label class="form-check-label" for="Apartment">
                                    Apartments
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="you_own[]" type="checkbox" value="Commertial Building"
                                    id="Commertial Building"

                                    @if(in_array('Commertial Building',$you_own))
                                        checked
                                    @endif
                                    >
                                <label class="form-check-label" for="Commertial Building">
                                    Commercial Building
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="customForm">
                    <button type="submit" class="colorBtn ms-0">
                        Update <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('script')
<script>
     //scripts only for rental home page
     new SlimSelect({
  select: '.multiple-category'
});
new SlimSelect({
  select: '.multiple-location'
});
new SlimSelect({
  select: '.customLocation'
});
new SlimSelect({
  select: '.customCategory'
});
new SlimSelect({
  select: '.locationGlobe'
});
$(document).on('select2:open', (e) => {
    const selectId = e.target.id

    $(".select2-search__field[aria-controls='select2-" + selectId + "-results']").each(function (
        key,
        value,
    ){
        value.focus();
    })
})

</script>

@endsection
