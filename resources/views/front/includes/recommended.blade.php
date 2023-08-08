<section class="siteSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="siteTitle">
                    <h3>
                       {{-- Recommended Products --}}
                        {{$setting->recommended_term}}

                    </h3>
                </div>
            </div>
        </div>
        <div class="row-cols-5 row">

            @foreach ($recommended_properties as $value)
            @php
            $className = 'col-md-25';
        @endphp
                <x-featured-recommended :value="$value->property"  :className="$className" />

            @endforeach
            <div class="col-12 text-end">
                <a href="{{route('front.recommended')}}" class="siteBtn d-inline-block mt-3 text-end py-2">
                    Show All <i class="flaticon-right-arrow ps-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
