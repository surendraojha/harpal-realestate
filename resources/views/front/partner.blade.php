@extends('front.layouts.main')


@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')


        <x-meta-head :meta="$meta" />
    @endsection
@else
    @section('title', ' Our Partners')
@endif



@section('content')
    <section class="siteSec partnerSec">
        <div class="container">
            <div class="row align-items-center">

                <h3>Our Associates</h3>

                <x-wide-ad :ads="$top_wide_advertisements" />

                @foreach ($informations as $value)
                    <div class="col-md-2 col-6">
                        <a href="{{ $value->link }}" target="_blank">
                            <img src="{{ asset('uploads/' . $value->photo) }}" alt="Partner Photo">
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
@endsection
