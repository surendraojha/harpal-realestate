@extends('front-new.layouts.main')

@section('title','Gallery Page')

@section('content')


<div class="gallery-section">
    <div class="container">
     <div class="row">
       <div class="col-12 col-sm-12 page-title">
         <h1>Gallery Page</h1>
       </div>
     </div>
     <div class="portfolio-item row">

        @foreach ($informations as $value)

       <div class="item selfie col-12 col-sm-12 col-md-4 col-lg-3">
          <a href="{{ asset('uploads/'.$value->photo) }}" class="fancylight popup-btn"
            data-fancybox-group="light">
           <figure>
             <img class="img-fluid" src="{{ asset('uploads/'.$value->photo) }}" alt="">
           </figure>
          </a>
       </div>

       @endforeach




     </div>

     <div class="row">
        <div class="col-12 text-center">
            <x-pagination :informations="$informations"/>

        </div>
     </div>
   </div>
 </div>



@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>

<script>
    new WOW().init();
  </script>
  <script>
    $('.portfolio-item').isotope({
      itemSelector: '.item',
      layoutMode: 'fitRows'
     });
     $('.portfolio-menu ul li').click(function(){
      $('.portfolio-menu ul li').removeClass('active');
      $(this).addClass('active');

      var selector = $(this).attr('data-filter');
      $('.portfolio-item').isotope({
        filter:selector
      });
      return  false;
     });
     $(document).ready(function() {
     var popup_btn = $('.popup-btn');
     popup_btn.magnificPopup({
     type : 'image',
     gallery : {
      enabled : true
     }
   });
  });
  </script>
@endpush

@push('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
@endpush
