<script>
    $('#province_id').on('change', function() {

        $('#district_id').empty();
        $('#municipality_id').empty();
        $('#woda_id').empty();


        var province_id = $('#province_id option:selected').val();

        var url = "<?php echo e(route('get.district')); ?>?id=" + province_id;

        $.ajax({
            url: url, // Replace with your Laravel route
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#district_id').append('<option value="">-- Select Option --</option>');
                $.each(data, function(key, value) {
                    $('#district_id').append('<option value="' + value.id + '">' + value
                        .title +
                        '</option>');
                });
            }
        });
    });

    // district

    $('#district_id').on('change', function() {

        $('#municipality_id').empty();
        $('#woda_id').empty();

        var district_id = $('#district_id option:selected').val();

        var url = "<?php echo e(route('get.municipality')); ?>?id=" + district_id;

        $.ajax({
            url: url, // Replace with your Laravel route
            type: 'GET',
            dataType: 'json',
            success: function(data) {


                $('#municipality_id').append('<option value="">-- Select Option --</option>');
                $.each(data, function(key, value) {
                    $('#municipality_id').append('<option value="' + value.id + '">' + value
                        .title +
                        '</option>');
                });
            }
        });
    });

    // municipality


    $('#municipality_id').on('change', function() {

        $('#woda_id').empty();
        var district_id = $('#municipality_id option:selected').val();
        var url = "<?php echo e(route('get.woda')); ?>?id=" + district_id;
        $.ajax({
            url: url, // Replace with your Laravel route
            type: 'GET',
            dataType: 'json',
            success: function(data) {


                $('#woda_id').append('<option value="">-- Select Option --</option>');
                $.each(data, function(key, value) {
                    $('#woda_id').append('<option value="' + value.id + '">' + value
                        .number +
                        '</option>');
                });
            }
        });
    });
</script>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/includes/location.blade.php ENDPATH**/ ?>