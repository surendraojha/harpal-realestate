<div class="col-md-4">
    <div class="contactFrom">
        <h5 class="mb-4">
            Didn't Find What You are looking for?
            <br> <span class="text-danger">Let us know</span>
        </h5>
        <form action="{{ route('front.contact-us.post') }}" method="post">

            @csrf
            <div class="ContactForm">
                <div class="customForm">
                    <label for="">
                        Your Full Name <span class="text-danger">
                            *
                        </span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Type your name...">
                </div>
                <div class="customForm">
                    <label for="phone">
                        Your Phone Number
                        <span class="text-danger">
                            *
                        </span>
                    </label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                        placeholder="Type your phone number...">
                </div>


                {{-- email --}}
                    <div class="customForm">
                        <label for="email">
                            Email
                        </label>
                        <input type="email" id="email" required name="email" value="{{ old('email') }}"
                            placeholder="Enter Your Email">
                    </div>


                <div class="customForm">
                    <label for="keyword">Location
                        <span class="text-danger">
                            *
                        </span>
                    </label>

                    <select name="location[]" id="location_id" multiple>

                        @foreach ($locations as $value)
                            <option value="{{ $value->location }}">{{ $value->location }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="customForm">
                    <div class="fieldBox">
                        <label for="destination">Rental type
                            <span class="text-danger">
                                *
                            </span>
                        </label>
                        <!-- Optgroups -->
                        <select name="rental_type[]" class="select2" multiple>

                            @foreach ($categories as $value)
                                <optgroup label="{{ $value->title }}">
                                    @foreach ($value->subcategory->sortBy('order') as $v)
                                        <option value="{{ $v->title }}">{{ $v->title }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach


                        </select>
                    </div>
                </div>
                <div class="customForm">
                    <label for="">Tole/Area
                        <span class="text-danger">
                            *
                        </span>
                    </label>
                    <input type="text" name="total_area" value="{{ old('total_area') }}"
                        placeholder="eg. Samakhushi">
                </div>
                <div class="customForm">
                    <label for="">
                        If any
                    </label>
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Write a Message">{{ old('message') }}</textarea>
                </div>
                <div class="customForm text-end">
                    <button class="colorBtn" type="submit">
                        Send <i class="flaticon-right-arrow ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
