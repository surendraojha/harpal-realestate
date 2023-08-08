@extends('front.layouts.main')

@section('title', $information->name . '-.Profile')

@section('content')
    <section class="siteSec bg-light py-3 mt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4 col-6 mb-1">
                    <div class="agentForm position-relative mt-4">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('uploads/' . @$information->profile->photo) }}"
                                    alt="{{ $information->name }}">
                            </div>
                            <div class="col-8">
                                <h6 class="listerName">
                                 {{-- @if($information->role!='admin')   {{ @$information->profile->name_append }} @endif --}}
                                  {{ @$information->name }}
                                    <svg viewBox="0 0 24 24" fill="#f65104" aria-label="Verified account" height="20"
                                        width="20"
                                        class="r-1cvl2hr r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-f9ja8p r-og9te1 r-bnwqim r-1plcrui r-lrvibr">
                                        <g>
                                            <path
                                                d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                            </path>
                                        </g>
                                    </svg>
                                </h6>
                                @if($information->role!='admin')
                                <p>
                                    <Strong>Phone:</Strong>
                                    <a href="tel:{{ $information->phone }}">{{ $information->phone }}</a>
                                </p>
                                <p>
                                <strong>Email: </strong>
                                    <a href="mailto:{{ $information->phone }}">{{ $information->email }}</a>
                                </p>


                                {{-- <p>

                                    <strong>DOB</strong> : {{ date('Y/m/d', strtotime($information->dob)) }}

                                </p> --}}

                                <p>

                                    <strong>User Type</strong> : {{ $information->profile->user_type }}

                                </p>

                                @if (@$information->profile->you_own)
                                    <p>
                                        @php
                                           $owns= json_decode(@$information->profile->you_own);
                                        @endphp
                                        <strong>User Owns</strong> :
                                        @foreach (@$owns as $value)
                                            {{ @$value }} @if($loop->last==false), @endif

                                        @endforeach

                                    </p>
                                @endif

                            @endif




                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="infoUser">
                        <b>
                            Joined On: {{ date('Y/m/d', strtotime($information->created_at)) }}
                        </b>
                        <div>
                            <h6>
                                Total {{ $properties_count }} Listing
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newest resendential FDeals -->

    @if ($properties->isEmpty() == false)
        <section class="siteSec">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="siteTitle">
                            <h3>
                                Kotha Bhada.com Listing
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row-cols-5 row">
                    @foreach ($properties as $value)
                        @php
                            $className = 'col-md-25';
                        @endphp
                        <x-featured-recommended :value="$value" :className="$className" />
                    @endforeach

                    <x-pagination :informations="$properties" />
                </div>
            </div>
        </section>

    @endif
@endsection
