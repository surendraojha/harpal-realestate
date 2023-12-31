<section class="siteSec aboutUsSec">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="siteTitle">
                    <h1>
                        {{@$about_us->title}}
                    </h1>
                </div>
                {!!@$about_us->short_description!!}
                <a href="{{route('front.about-us')}}" class="siteBtn d-inline-block mt-3 text-end">
                    View More <i class="flaticon-right-arrow ps-2"></i>
                </a>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/'.@$about_us->photo)}}" alt="{{$about_us->title}}">
            </div>
        </div>
    </div>
</section>
