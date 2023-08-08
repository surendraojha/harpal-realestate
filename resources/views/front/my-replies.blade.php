@extends('front.layouts.profile')


@section('title','My Replies')


@section('content')


<div class="commentsListing">

    @foreach ($replies as $value)

    <div class="commentNoti">
        <div class="d-flex align-items-center">
             <h6>
                <a href="{{route('single.forum',$value->parent)}}">
                     Reply From  <strong> {{$value->user->name}}</strong> in <b>
                        {{$value->comment}}
                    </b>
                </a>
            </h6>
            <span>

                {{$value->created_at->diffForHumans()}}
            </span>
        </div>
        <div>
            {{-- <button class="">
                Edit
            </button> --}}
            <a class="" href="{{route('single.forum',$value->parent)}}">
                Reply
            </a>

        </div>
    </div>

    @endforeach


</div>
@endsection
