<div class="col-md-8">
    <div class="forumBoxWrapper">
        @auth

        <div class="forumBox">
            <a href="#"
            type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"

            >
                Post a Question
            </a>
        </div>
        @else

        <div class="forumBox">
            <a href="{{route('front.login')}}" class="btn btn-primary" >
                Login To Post a Question
            </a>
        </div>
    @endauth
        <div class="siteTitle  mb-4">
            <h5>
                Post a question or comment to see, read and reply to
            </h5>
        </div>


        @foreach ($forums as $value)
            <form action="{{route('submit.forum')}}" method="post">

                @csrf
        <ol class="timeline">
            <li class="timeline-item | extra-space">
                <span class="timeline-item-icon | filled-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path fill="currentColor" d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM7 10v2h2v-2H7zm4 0v2h2v-2h-2zm4 0v2h2v-2h-2z" />
                    </svg>
                </span>
                <div class="timeline-item-wrapper">
                    <div class="timeline-item-description">
                        <i class="avatar | small">
                            <img src="{{asset('uploads/'.@$value->user->profile->photo)}}" alt="{{$value->user->name}}" />
                        </i>
                        <span><a href="#">{{$value->user->name}}</a> Posted on <time datetime="20-01-2021"> {{date('M d, Y',strtotime($value->created_at))}}</time></span>
                    </div>


                    <div class="comment">
                        <h5>{{$value->comment}}</h5>
                        @auth

                            @php
                                $like_count = \App\Models\LikeForum::where('support_forum_id',$value->id)->count();
                            @endphp

                            <button onclick="event.preventDefault();like('{{$value->id}}')"  class="button">👏  <span id="like-{{$value->id}}">{{$like_count}}</span></button>
                        @endauth

                    </div>

                    @php
                        $replies = \App\Models\SupportForum::where('parent',$value->id)->get();
                    @endphp

                    <a href="{{route('support.forum')}}" class="show-replies">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-forward" width="44" height="44" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M15 11l4 4l-4 4m4 -4h-11a4 4 0 0 1 0 -8h1" />
                        </svg>
                        Show {{$replies->count()}} replies

                        <span class="avatar-list">

                            @foreach ($replies as $v)
                                <i class="avatar | small">
                                    <img src="{{asset('uploads/'.@$v->user->profile->photo)}}" alt="{{$v->user->name}}"/>
                                </i>
                            @endforeach

                        </span>
                    </a>
            </li>

            @auth

            <li class="timeline-item">
                <span class="timeline-item-icon | avatar-icon">
                    <i class="avatar">
                        <img src="{{ asset('uploads/' . @$value->user->profile->photo) }}" alt="{{$value->user->name}}">
                    </i>
                </span>
                <div class="new-comment">
                    <textarea name="comment" type="text" placeholder="Reply"></textarea>
                    <button class="siteBtn" type="submit">
                        <i class="flaticon-right-arrow"></i>
                    </button>
                </div>
            </li>

            @endauth
        </ol>
        <div class="text-end">
            <a href="#" class="siteBtn d-inline-block mt-3 text-end py-2">
                Show All <i class="flaticon-right-arrow ps-2"></i>
            </a>
            </div>
        <input type="hidden" name="property_id" value="{{@$value->property_id}}" id="">

        <input type="hidden" name="parent" value="{{$value->id}}" id="">

    </form>
        @endforeach

    </div>
</div>
