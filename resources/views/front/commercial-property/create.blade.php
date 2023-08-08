@extends('front.layouts.profile')



@section('title','Create Commercial Property')


@section('content')
    <div class="ContactForm moreDetailSignup">
        <form action="{{ route('commercial-property.store') }}" id="property-form" method="post"
        enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                       Choose Your Property
                    </h6>
                </div>

                @include('front.commercial-property.form')

                {{-- property features --}}

                <div class="customForm">
                    <button class="colorBtn ms-0" type="submit"
                    onclick="event.preventDefault();validateCommercialForm();"
                    >
                        SUBMIT FOR APPROVAL <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <h3 style="font-weight:400; text-transform:uppercase" class="text-center">
                    Video Is being Uploaded.
                </h3>
              <img src="{{asset('front/assets/imgs/processing.gif')}}" alt="">
              <h4 style="font-weight: 500;" class="text-center">
                Please have a patience It may take 4 to 5 minutes
                <small>
                    Let The page refresh
                </small>
              </h4>
            </div>
          </div>
        </div>
      </div>
@endsection


@section('script')

<x-disable-enter-submit />
@if (@$information)
@php
    $price =  old('price', @$information->price) ;
@endphp
@else
@php
    $price = old('price') ;
@endphp
@endif
<x-commercial-property-validation />

<x-price-auto-comma :price="$price" />
<x-property-loader />
    <script>
        // $('#rentaltype').on('change', function() {

        //     getSubcategory();

        // });



        // function getSubcategory() {
        //     var category_id = $('#rentaltype option:selected').val();

        //     // alert(category_id);
        //     var url = "{{ url('get-sub-category') }}/" + category_id;
        //     $.ajax({
        //         url: url,
        //         success: function(result) {

        //             $('#sub-category').empty();
        //             var data = result.data;

        //             $('#sub-category').append(`<option value='' disabled selected>Select Option</option>`)

        //             jQuery.each(data, function(index, itemData) {
        //                 $('#sub-category').append(
        //                     `<option value='${itemData.id}'>${itemData.title}</option>`)
        //             });
        //         }
        //     });
        // }

        //scripts only for rental home page
        //      new SlimSelect({
        //   select: '.multiple-category'
        // });
        // new SlimSelect({
        //   select: '.locationGlobe'
        // });
        // new SlimSelect({
        //   select: '.customLocation'
        // });
        // new SlimSelect({
        //   select: '.customCategory'
        // });


        $(document).ready(function() {
            // $('.locationGlobe').select2();



            // $('#location_id').select2({

            //     tags: true,
            //     allowClear: true,
            // });






            //     if ($('.locationGlobe').find("option[value='" + data.id + "']").length) {
            //     $('.locationGlobe').val(data.id).trigger('change');
            // } else {
            //     // Create a DOM Option and pre-select by default
            //     var newOption = new Option(data.text, data.id, true, true);
            //     // Append it to the select
            //     $('.locationGlobe').append(newOption).trigger('change');
            // }

            // add photos

        });


        var count = 0;

function addPhotos(){
        $('#add-more-photos').append(`
            <div class='mb-3 d-flex' id="photo-${count}">
            <input type='file' name="photo[]" accept="image/*">

            <button class="btn btn-danger" onclick="event.preventDefault();deletePhoto('photo-'+${count})"><i class='fa fa-trash'></i></button>
            <div>
        `);

            count++;
        }

        function deletePhoto(id) {
            $('#' + id).remove();
        }



    </script>
@endsection
