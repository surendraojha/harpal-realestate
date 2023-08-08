@extends('front.layouts.profile')



@if (@$meta)
    @section('title', $meta->meta_title)

    @section('meta')
        <x-meta-head :meta="$meta" />
    @endsection

@else

@section('title',$information->comment)

@endif


@section('content')
<div class="col-12">
    <div class="productContent">
        <div class="siteTitle">
            <h5>

            </h5>
        </div>

        {{-- <div class="forumBox">
            <a href="#"
            type="button" class="btn btn-primary"
             data-bs-toggle="modal" data-bs-target="#property-model">
                Guest Review
            </a>
        </div> --}}

        <form action="{{route('submit.forum')}}" method="post">
            <input type="hidden" name="parent" value="{{$information->id}}">

            @if($information->property)
            <input type="hidden" name="property_id" value="{{$information->property->id}}">

            @endif
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
                            <img src="{{asset('uploads/'.@$information->user->profile->photo)}}" alt="{{@$information->user->name}}">
                        </i>
                        <span><a href="#">{{$information->user->name}}</a> Commented on <time
                                datetime="{{date('M d, Y',strtotime($information->created_at))}}">  {{date('M d, Y',strtotime($information->created_at))}}</time></span>
                    </div>

                    <div class="comment">
                        <h5>{{$information->comment}}
                            <button class="" onclick="return confirm('Are You Sure Want To Delete This Comment?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </h5>


                        @php
                        $like_count = \App\Models\LikeForum::where('support_forum_id',$information->id)->count();
                    @endphp
                    <button onclick="event.preventDefault();like('{{$information->id}}')"  class="button">👏  <span id="like-{{$information->id}}">{{$like_count}}</span></button>

                    @php
                    $replies = \App\Models\SupportForum::where('parent', $information->id)->get();
                @endphp

                @foreach ($replies as $v)
                <div class="comment ms-5">
                    <div class="timeline-item-description">
                        <i class="avatar | small">
                            <img src="{{asset('uploads/'.@$v->user->profile->photo)}}" alt="{{$v->user->name}}">
                        </i>
                        <span><a href="#">{{$v->user->name}}</a> Posted on <time datetime="{{date('M d,Y',strtotime($v->created_at))}}">{{date('M d,Y',strtotime($v->created_at))}}</time></span>
                    </div>
                    <h5>{{$v->comment}}
                        <button class="" onclick="return confirm('Are You Sure Want To Delete This Reply?')">
                            <i class="fas fa-trash"></i>
                        </button>
                    </h5>
                </div>
                @endforeach

                    </div>
                </div>
            </li>
            @auth

            <li class="timeline-item">
                <span class="timeline-item-icon | avatar-icon">
                    <i class="avatar">
                        <img src="{{asset('uploads/'.@$information->user->profile->photo)}}" alt="{{$information->user->name}}">
                    </i>
                </span>

                    <textarea name="comment" type="text" placeholder="Reply"></textarea>
                    <button type="submit" class="siteBtn">
                        <i class="flaticon-right-arrow"></i>
                    </button>

                </div>
            </li>

            @endauth

        </ol>


        </form>

    </div>
</div>
@endsection
