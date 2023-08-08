@extends('front.layouts.main')

@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title','Discussion Forum')

@endif
@section('content')
    <section class="siteSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-5">
                        Support Archives
                    </h4>
                    @auth

                        <div class="forumBox">
                            <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                               Post Question
                            </a>
                        </div>
                    @else
                        <div class="forumBox">
                            <a href="{{ route('front.login') }}" class="btn btn-primary">
                Login To Post a Question
                            </a>
                        </div>
                    @endauth
                </div>

                <x-wide-ad :ads="$top_wide_advertisements"/>

                <div class="col-12">
                    <div class="productContent">

                        @foreach ($forums as $value)
                            <form action="{{ route('submit.forum') }}" method="post">

                                @csrf
                                <ol class="timeline">
                                    <li class="timeline-item | extra-space">
                                        <span class="timeline-item-icon | filled-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                                height="24">
                                                <path fill="none" d="M0 0h24v24H0z"></path>
                                                <path fill="currentColor"
                                                    d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM7 10v2h2v-2H7zm4 0v2h2v-2h-2zm4 0v2h2v-2h-2z">
                                                </path>
                                            </svg>
                                        </span>
                                        <div class="timeline-item-wrapper">
                                            <div class="timeline-item-description">
                                                <i class="avatar | small">
                                                    <img src="{{ asset('uploads/' . @$value->user->profile->photo) }}" alt="{{$value->user->name}}">
                                                </i>
                                                <span><a href="#">{{ $value->user->name }}</a> Posted on <time
                                                        datetime="20-01-2021">{{ date('M d, Y', strtotime($value->created_at)) }}</time></span>
                                            </div>



                                            @auth

                                                @php
                                                    $like_count = \App\Models\LikeForum::where('support_forum_id', $value->id)->count();
                                                @endphp

                                            @endauth

                                            <div class="comment">
                                                <h5>{{ $value->comment }}</h5>
                                                @auth

                                                    <button onclick="event.preventDefault();like('{{ $value->id }}')"
                                                        class="button">👏 <span
                                                            id="like-{{ $value->id }}">{{ $like_count }}</span></button>
                                                @endauth

                                            </div>


                                            @php
                                                $replies = \App\Models\SupportForum::where('parent', $value->id)->get();
                                            @endphp
                                            @foreach ($replies as $v)
                                                <div class="comment ms-5">
                                                    <div class="timeline-item-description">
                                                        <i class="avatar | small">
                                                            <img src="{{ asset('uploads/' . @$v->user->profile->photo) }}" alt="{{$v->user->name}}">
                                                        </i>
                                                        <span><a href="#">{{ $v->user->name }}</a> Posted on <time
                                                                datetime="20-01-2021">{{ date('M d,Y') }}</time></span>
                                                    </div>
                                                    <h5>{{ $v->comment }}</h5>
                                                </div>
                                            @endforeach
                                        </div>
                                    </li>

                                    @auth

                                        <li class="timeline-item">
                                            <span class="timeline-item-icon | avatar-icon">
                                                <i class="avatar">
                                                    <img src="{{ asset('uploads/' . @$value->user->profile->photo) }}" alt="{{$value->user->name}}">
                                                </i>
                                            </span>
                                            <div class="new-comment">
                                                <textarea type="text" name="comment" placeholder="Reply">{{ old('comment') }}</textarea>
                                                <button class="siteBtn" type="submit">
                                                    <i class="flaticon-right-arrow"></i>
                                                </button>
                                            </div>
                                        </li>

                                    @endauth

                                </ol>
                                <input type="hidden" name="property_id" value="{{ @$value->property_id }}" id="">

                                <input type="hidden" name="parent" value="{{ $value->id }}" id="">
                            </form>
                        @endforeach

                        <x-pagination :informations="$forums" />

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function like(id) {
            // alert(id);

            var url = "{{ url('like-support-forum') }}/" + id;

            $.ajax({
                type: 'GET',
                url: url,

                success: function(data) {
                    // console.log(data);
                    // alert(data);
                    $('#like-' + id).html(data.like);

                }
            });
        }
    </script>
@endsection
