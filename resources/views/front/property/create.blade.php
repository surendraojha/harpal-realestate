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
        <form action="{{ route('my-property.store') }}" id="property-form" method="post"
        enctype="multipart/form-data" >
            @csrf
            <div class="row multiSelect">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                       Choose Your Property
                    </h6>
                </div>

                <div class="col-12">
                    <div class="d-flex justify-content-center text-center dualOption">
                        <a href="{{route('residental-property.create')}}">


                            <img class="imgBox mx-4" src="{{asset('front/assets/imgs/residential.png')}}" alt="">
                         <br>   Residential Property
                         <div class="overpopover">
                             <div>
                                 <i class="fas fa-plus"></i>
                             </div>
                             <div>
                                 Add New Residential Property
                             </div>
                         </div>
                        </a>
                        <a href="{{route('commercial-property.create')}}">

                            <img class="imgBox mx-4" src="{{asset('front/assets/imgs/office-building.png')}}" alt="">
                       <br> Commercial Property
                       <div class="overpopover">
                        <div>
                            <i class="fas fa-plus"></i>
                        </div>
                        <div>
                            Add New Commercial Property
                        </div>
                    </div></a>
                    </div>
                </div>


                {{-- property features --}}

                {{-- <div class="customForm">
                    <button class="colorBtn ms-0" type="submit" onclick="event.preventDefault();validateForm();">
                        SUBMIT FOR APPROVAL <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div> --}}
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

<x-property-loader />
    <script>
        getSubcategory();
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
