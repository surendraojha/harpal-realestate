<script>
    function validateCommercialForm() {
        // $('#videoProgress').show();
        // alert('hi');

        var validate = false;

        var current_route = "<?php echo e(\Request::route()->getName()); ?>";


        if (current_route != 'commercial-property.edit') {
            var featured_photo = $('#featured_photo').get(0).files.length

            if (featured_photo == 0) {
                validate = false;

                $('#featured-photo-error').html('featured photo is required');
            } else {
                $('#featured-photo-error').html('');

            }

        }


        var title = $('#title').val();

        // alert(title);

        if (!title) {
            validate = false;
            $('#title').focus();

            $('#title-error').html('Title is required');
        } else {
            $('#title-error').html('');

        }


        var price = $('#price').val();


        if (!price) {
            validate = false;
            $('#price').focus();

            $('#price-error').html('Price is required');
        } else {
            $('#price-error').html('');

        }

        var price_negotiable = $('#price_negotiable option:selected').val();

        if (!price_negotiable) {
            validate = false;
            $('#price_negotiable').focus();

            $('#price-negotiable-error').html('Price Negotiable is required');
        } else {
            $('#price-negotiable-error').html('');

        }


        var sub_category_id = $('#sub_category_id option:selected').val();

        if (!sub_category_id) {
            validate = false;


            $('#sub_category_id').focus();
            $('#sub-category-id-error').html('Category is required');
        } else {
            $('#sub-category-id-error').html('');

        }


        // var date_of_build = $('#date_of_build option:selected').val();

        // if (!date_of_build) {
        //     validate = false;
        //     // alert('hi');
        //     $('#date_of_build').focus();

        //     $('#date-of-build-error').html('Date Of Build is required');
        // } else {
        //     $('#date-of-build-error').html('');

        // }

        // alert(date_of_build);

        // var parking = $('#parking option:selected').val();

        // if (!parking) {
        //     validate = false;
        //     $('#parking').focus();

        //     $('#parking-error').html('Parking is required');
        // } else {
        //     $('#parking-error').html('');

        // }

        // var floor_id = $('#floor_id option:selected').val();

        // if (!floor_id) {
        //     validate = false;
        //     $('#floor_id').focus();

        //     $('#floor-id-error').html('Floor is required');
        // } else {
        //     $('#floor-id-error').html('');

        // }
        // var road_size_id = $('#road_size_id option:selected').val();

        // if (!road_size_id) {
        //     validate = false;
        //     $('#road_size_id').focus();

        //     $('#road-size-id-error').html('Road Type is required');
        // } else {
        //     $('#road-size-id-error').html('');

        // }

        // var pantry = $('#pantry option:selected').val();

        // if (!pantry) {
        //     validate = false;
        //     $('#pantry').focus();

        //     $('#pantry-error').html('Pantry is required');
        // } else {
        //     $('#pantry-error').html('');

        // }

        // var bathroom = $('#bathroom').val();

        // if (!bathroom) {
        //     validate = false;
        //     $('#bathroom').focus();

        //     $('#bathroom-error').html('Bathroom is required');
        // } else {
        //     $('#bathroom-error').html('');

        // }

        // var faced = $('#faced').val();
        // if (!faced) {
        //     validate = false;
        //     $('#faced').focus();

        //     $('#faced-error').html('Faced is required');
        // } else {
        //     $('#faced-error').html('');

        // }

        // var lift = $('#lift option:selected').val();
        // if (!lift) {
        //     validate = false;
        //     $('#lift').focus();

        //     $('#lift-error').html('Lift is required');
        // } else {
        //     $('#lift-error').html('');

        // }
        var contact_number = $('#contact_number').val();

        if (!contact_number) {
            validate = false;
            $('#contact_number').focus();

            $('#contact-number-error').html('Contact Number is required');
        } else {
            $('#contact-number-error').html('');

        }
        var location_id = $('#location_id').val();


        if (!location_id) {
            validate = false;
            $('#location_id').focus();

            $('#location-id-error').html('Location is required');
        } else {
            $('#location-id-error').html('');

        }












        // var water = $('#water option:selected').val();

        // if (!water) {
        //     validate = false;
        //     $('#water').focus();

        //     $('#water-error').html('Water is required');
        // } else {
        //     $('#water-error').html('');

        // }












        if (contact_number &&
            // road_size_id &&
            // floor_id &&
            location_id &&
            sub_category_id &&

            price_negotiable &&
            price &&
            // bathroom &&
            // water &&
            title 
            // lift &&
            // faced && pantry && parking && date_of_build

        ) {
            // validate = true;
            $('#videoProgress').modal('show');
            $('#property-form').submit();



        }

        return validate;







    }
</script>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/commercial-property-validation.blade.php ENDPATH**/ ?>