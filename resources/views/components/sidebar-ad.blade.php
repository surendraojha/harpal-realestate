     <div class="position-relative mt-4">
         <div class="row">

             @foreach ($advertisement as $value)
                 <div class="col-12">
                     <a style="cursor: pointer" onclick="window.open('{{$value->advertisement->link}}');
">
                         <img src="{{ asset('uploads/' . @$value->advertisement->photo) }}" alt="Advertisement">

                     </a>
                 </div>
             @endforeach

         </div>
     </div>
