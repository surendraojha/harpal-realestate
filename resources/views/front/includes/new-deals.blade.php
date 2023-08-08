

<section class="siteSec recommendedSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="siteTitle">
                    <h3>
                        {{-- New Deals --}}
                        {{ $setting->new_deals_term }}

                    </h3>
                </div>
            </div>

            @foreach ($new_deals as $value)
                @php
                    $className = 'col-md-4 col-lg-2 col-6 mb-4 recSin';
                @endphp

                <x-new-deal :value="$value" :className="$className" />

            @endforeach
            <div class="col-12 text-end">
                <a href="{{route('front.newdeals')}}" class="siteBtn d-inline-block mt-3 text-end py-2">
                    Show All <i class="flaticon-right-arrow ps-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>
