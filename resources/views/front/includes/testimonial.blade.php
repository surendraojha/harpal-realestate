
<section class="siteSec">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="siteTitle">
                    <h3>
                       What our happy customer saying about our services.
                    </h3>
                </div>
            </div>

                <!-- Slider main container -->
                <div class="swiper" id="testSlider">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($testimonials as $index=>$value)
                        <div class="swiper-slide">
                            <div class="singleTest">
                                <div class="testiIntro">
                                    <img src="{{asset('uploads/'.$value->photo)}}" alt="{{$value->name}}">
                                    <div class="testiBox">
                                        <h6>
                                            {{$value->name}}
                                        </h6>
                                        <p>
                                            {{$value->activity}}
                                        </p>
                                    </div>
                                </div>
                                <div class="testContent">
                                    <p>
                                        {{$value->message}}
                                    </p>
                                    <div class="reviewBox">
                                        @for($i=1;$i<=5;$i++)
                                            @if($i<=$value->rating)
                                                <i class="fas fa-star filled"></i>
                                            @else
                                            <i class="fas fa-star"></i>

                                            @endif
                                        @endfor

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="testimonailnavPrev swiper-button-prev"></div>
                    <div class="testimonailnavNext swiper-button-next"></div>

                </div>


        </div>
    </div>
</section>

