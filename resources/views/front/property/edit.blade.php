@extends('front.layouts.profile')

@section('content')


    {{-- <div class="row py-2 align-items-center">
        <div class="col-md-2 col-4 order-1">
            <a href="#">
                <img src="./assets/imgs/kothabhada-logofinal.png" alt="">
            </a>
        </div>
        <div class="col-md-7 col-12 order-3 order-md-2">
            <form action="">
                <div class="customForm d-flex">
                    <input type="text" class="mb-0" placeholder="Type Here to Search">
                    <button class="px-4 py-3 customBtn" style="padding: unset;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-3 col-6 text-end order-2 order-md-3">
            <a href="#" class="colorBtn py-2 px-4" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="🎈Home Flat Office Shifting Packers and Movers Transport Services in Kathmandu                            ">
               <i class="fas fa-plus"></i> Add Listing
            </a>
        </div>
    </div> --}}
    <div class="ContactForm moreDetailSignup">
        <form action="{{ route('my-property.update',$information->id) }}" method="post"
             enctype="multipart/form-data" id="property-form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                        Edit Property
                    </h6>
                </div>
                @include('front.property.form')

                {{-- property features --}}

                <div class="customForm">
                    <button class="colorBtn ms-0" type="submit"  onclick="event.preventDefault();validateForm();">
                        SUBMIT FOR APPROVAL <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
@endsection


@section('script')
<x-property-loader />


    <script>

var count = 0;

function addPhotos() {
    $('#add-more-photos').append(`
<div class='mb-3' id="photo-${count}">
<input type='file' name="photo[]">

<button class="btn btn-danger" onclick="event.preventDefault();deletePhoto('photo-'+${count})"><i class='fa fa-trash'></i></button>
</div>
`);

    count++;
}
        // getSubcategory();
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


        // $(document).ready(function() {
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

        // });




        function deletePhoto(id) {
            $('#' + id).remove();
        }

        function deletePhotoServer(id,div_id){

            if(confirm('Are you sure you want to delete this photo?')){
            var url = "{{ url('delete-photo') }}/" + id +'/'+div_id;
            $.ajax({
                url: url,
                success: function(result) {

                    // $('#sub-category').empty();
                    var data = result.div_id;



                    // alert(data);

                    if(data){
                        $('#'+data).remove();
                    }
                    // $('#sub-category').append(`<option value='' disabled selected>Select Option</option>`)

                    // jQuery.each(data, function(index, itemData) {
                    //     $('#sub-category').append(
                    //         `<option value='${itemData.id}'>${itemData.title}</option>`)
                    // });
                }
            });
        }
        }

        
    </script>
@endsection
