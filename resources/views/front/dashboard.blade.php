@extends('front.layouts.profile')
@section('title','Dashboard')

@section('content')

    <div class="listingBoxes mt-md-5 mt-2">
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    <h4 class="dashInfoTitle">
                        Hello ,{{$user->name}}
                    </h4>
                    <div class="dashInfoText">
                        {!! $setting->vendor_dashboard_content !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="singleStatBox">
                    <h4>
                        Total Listed
                    </h4>
                    <div class="statNum">
                        {{$total_listed}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
