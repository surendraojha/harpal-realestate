@extends('front-new.layouts.main')

@section('content')
    <div class="blog-body">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 page-title">
                    <h1>Blog Listing</h1>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-8">
                    <div class="row blog-left">

                        @foreach ($informations as $value)
                            @if (isset($value->photo) && file_exists(public_path('blogs/' . $value->photo)))
                                @php
                                    $path = asset('blogs/' . $value->photo);
                                @endphp
                            @else
                                @php
                                    $path = asset('no-photo.jpg');
                                @endphp
                            @endif

                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="{{ route('front.blog-detail', $value->slug) }}">
                                    <img src="{{ $path }}" alt="{{ $value->title }}"></a>
                                <div class="blog-box">
                                    <h4><a href="{{ route('front.blog-detail', $value->slug) }}">{{ $value->title }}</a></h4>
                                    <ul>
                                        <li>By: <a href="#">{{ $value->writer_name }}</a></li>
                                        <li>Comments: 2</li>
                                    </ul>
                                    <p>{{ Str::substr(strip_tags($value->description), 0, 50) }}</p>
                                </div>
                            </div>
                        @endforeach

                        <x-pagination :informations="$informations" />

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 category-column">
                    <div class="row">
                        <div class="col-12 catogory">
                            <h4>Categories</h4>
                            <ul>

                                @foreach ($categories as $value)
                                    <li><a href="{{ route('front.blog', ['slug' => $value->slug]) }}">{{ $value->title }}
                                            <span><i class="fa fa-angle-right"></i></span></a></li>
                                @endforeach


                            </ul>
                        </div>
                        <div class="posts">
                            <div class="col-12">
                                <h4>Recent Posts</h4>
                            </div>
                            @foreach ($recent_blogs as $value)
                                <div class="col-12 col-sm-12">
                                    <div class="recent-post">

                                        @if (isset($value->photo) && file_exists(public_path('blogs/' . $value->photo)))
                                            @php
                                                $path = asset('blogs/' . $value->photo);
                                            @endphp
                                        @else
                                            @php
                                                $path = asset('no-photo.jpg');
                                            @endphp
                                        @endif
                                        <a href="{{ route('front.blog-detail', $value->slug) }}">
                                            <img src="{{ $path }}" alt="">

                                            <h6>{{ $value->title }}</h6>
                                        </a>
                                        <ul>
                                            <li><i class="fa fa-user"></i> By: <a
                                                    href="#">{{ $value->writer_name }}</a></li>
                                            <li><i class="fa fa-calendar"></i>
                                                {{ date('Y-m-d', strtotime($value->created_at)) }}</li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
