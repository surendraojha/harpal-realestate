@extends('front.layouts.profile')



@section('title','Create Residental Property')


@section('content')



    <div class="ContactForm moreDetailSignup">
        <form action="{{ route('residental-property.store') }}" id="property-form" method="post"
        enctype="multipart/form-data" >
            @csrf
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                      Add Residental Property
                    </h6>
                </div>



                @include('front.residental-property.form')


                {{-- property features --}}

                <div class="customForm">
                    <button class="colorBtn ms-0" type="submit" onclick="event.preventDefault();validateResidentalForm();">
                        SUBMIT FOR APPROVAL <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
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

<x-price-auto-comma :price="$price" />
<x-validate-residental-property />

<x-property-loader />

    <script>
        $('#rentaltype').on('change', function() {

            getSubcategory();

        });



        function getSubcategory() {
            var category_id = $('#rentaltype option:selected').val();

            // alert(category_id);
            var url = "{{ url('get-sub-category') }}/" + category_id;
            $.ajax({
                url: url,
                success: function(result) {

                    $('#sub-category').empty();
                    var data = result.data;

                    $('#sub-category').append(`<option value='' disabled selected>Select Option</option>`)

                    jQuery.each(data, function(index, itemData) {
                        $('#sub-category').append(
                            `<option value='${itemData.id}'>${itemData.title}</option>`)
                    });
                }
            });
        }

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
