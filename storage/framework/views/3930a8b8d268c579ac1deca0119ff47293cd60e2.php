<script>
    function validateResidentalForm() {


        var validate = false;




        var title = $('#title').val();

        var purpose_id = $('#purpose_id option:selected').val();

        if (!purpose_id) {
            validate = false;
            $('#purpose_id').focus();
            // alert('purpose id');

            $('#purpose-error').html('Title is required');
        } else {
            $('#purpose-error').html('');

        }

        if (!title) {
            validate = false;
            $('#title').focus();
            // alert('title');

            $('#title-error').html('Title is required');
        } else {
            $('#title-error').html('');

        }


        var price = $('#price').val();


        if (!price) {
            validate = false;
            $('#price').focus();
            // alert('price');

            $('#price-error').html('Price is required');
        } else {
            $('#price-error').html('');

        }

        var price_negotiable = $('#price_negotiable option:selected').val();

        if (!price_negotiable) {
            validate = false;
            $('#price_negotiable').focus();
            // alert('price negotiable');

            $('#price-negotiable-error').html('Price Negotiable is required');
        } else {
            $('#price-negotiable-error').html('');

        }


        var sub_category_id = $('#sub_category_id option:selected').val();

        if (!sub_category_id) {
            validate = false;

            // alert('sub category id');

            $('#sub_category_id').focus();
            $('#sub-category-id-error').html('Category is required');
        } else {
            $('#sub-category-id-error').html('');

        }


        // var kitchen = $('#kitchen option:selected').val();
        // if (!kitchen) {
        //     validate = false;
        //     // alert('kitchen');


        //     $('#kitchen').focus();

        //     $('#kitchen-error').html('Kitchen is required');
        // } else {
        //     $('#kitchen-error').html('');

        // }

        // var furnishing = $('#furnishing option:selected').val();
        // if (!furnishing) {
        //     validate = false;
        //     // alert('furnishing');

        //     $('#furnishing').focus();

        //     $('#furnishing-error').html('furnishing is required');
        // } else {
        //     $('#furnishing-error').html('');

        // }

        // var date_of_build = $('#date_of_build option:selected').val();

        // if (!date_of_build) {
        //     validate = false;
        //     // alert('date of build');

        //     $('#date_of_build').focus();

        //     $('#date-of-build-error').html('Date Of Build is required');
        // } else {
        //     $('#date-of-build-error').html('');

        // }


        // var parking = $('#parking option:selected').val();

        // if (!parking) {
        //     validate = false;
        //     $('#parking').focus();
        //     // alert('parking');

        //     $('#parking-error').html('Parking is required');
        // } else {
        //     $('#parking-error').html('');

        // }

        // var floor_id = $('#floor_id option:selected').val();

        // if (!floor_id) {
        //     validate = false;
        //     $('#floor_id').focus();
        //     // alert('floor id');

        //     $('#floor-id-error').html('Floor is required');
        // } else {
        //     $('#floor-id-error').html('');

        // }
        // var road_size_id = $('#road_size_id option:selected').val();

        // if (!road_size_id) {
        //     validate = false;
        //     $('#road_size_id').focus();
        //     // alert('road size id');

        //     $('#road-size-id-error').html('Road Type is required');
        // } else {
        //     $('#road-size-id-error').html('');

        // }


        // var balcony = $('#balcony option:selected').val();
        // if (!balcony) {
        //     validate = false;
        //     $('#balcony').focus();
        //     // alert('balcony id');

        //     $('#balcony-error').html('Balcony is required');
        // } else {
        //     $('#balcony-error').html('');

        // }

        // var bathroom = $('#bathroom').val();

        // if (!bathroom) {
        //     validate = false;
        //     $('#bathroom').focus();
        //     // alert('bathroom id');

        //     $('#bathroom-error').html('Bathroom is required');
        // } else {
        //     $('#bathroom-error').html('');

        // }

        // var faced = $('#faced').val();
        // if (!faced) {
        //     validate = false;
        //     $('#faced').focus();
        //     // alert('faced');

        //     $('#faced-error').html('Faced is required');
        // } else {
        //     $('#faced-error').html('');

        // }


        var contact_number = $('#contact_number').val();

        if (!contact_number) {
            validate = false;
            // alert(contact_number);

            $('#contact_number').focus();

            $('#contact-number-error').html('Contact Number is required');
        } else {
            $('#contact-number-error').html('');

        }
        var location_id = $('#location_id option:selected').val();


        if (!location_id) {
            validate = false;
            $('#location_id').focus();
            // alert('location_id');

            $('#location-id-error').html('Location is required');
        } else {
            $('#location-id-error').html('');

        }




        //  var bedroom = $('#bedroom').val();


        //  if (!bedroom) {
        //     validate = false;
        //     $('#bedroom').focus();
        //     // alert('bedroom');

        //     $('#bedroom-error').html('Location is required');
        // } else {
        //     $('#bedroom-error').html('');

        // }




        // var water = $('#water option:selected').val();

        // if (!water) {
        //     validate = false;

        //     // alert('water');
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
            title &&

            // faced &&   parking && date_of_build
            // &&
            purpose_id
            // &&
            // furnishing && balcony  && bedroom

        ) {
             validate = true;
            // $('#videoProgress').modal('show');
            $('#property-form').submit();



        }

        // alert(validate);
        return validate;







    }
</script>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/validate-residental-property.blade.php ENDPATH**/ ?>