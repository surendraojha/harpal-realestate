@extends('front.layouts.main')


@if(@$information->meta_title || $information->meta_description || $information->meta_keyword)

    @section('title',$information->meta_title)

    @section('meta')


        <x-meta-head :meta="$information" />
    @endsection

@else

@section('title', $information->location)


@endif

@section('content')


    <x-main-search :locations="$locations" :categories="$categories" />


    <section class="siteSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="siteTitle">
                        <h3>
                            {{ $information->location }}
                        </h3>
                    </div>
                </div>
            </div>

<x-wide-ad :ads="$top_wide_advertisements"/>



                @php
                $route = route('front.location',$information->location);
            @endphp

            <x-whole-sort :route="$route" :order="$order"/>
            <div class="row-cols-5 row">

                @foreach ($informations as $value)
                    @php
                        $className = 'col-md-25';
                    @endphp
                    <x-featured-recommended :value="$value" :className="$className" />
                @endforeach

            <x-pagination :informations="$informations" />
            </div>
        </div>
    </section>

@endsection
