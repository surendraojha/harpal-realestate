<script>
    //price add comma on middle

    var price = "<?php echo e($price); ?>";

    if (parseInt(price)) {
        $('#price').val(price);

    } else {
        $('#price').val('');

    }

    $('#price').bind('keyup click', function(e) {
        var val = $(this).val();

        if (val == '.00' || !val || parseInt(val)==0 || val =='.') {
            $(this).val('');
        } else {
            val = val.replace('.00', '').toString().replace(/\D/g, '').replace(/,/g, "").replace(
                /\B(?=(\d{3})+(?!\d))/g, ",") + '.00';

            $(this).val(val);

            var strLength = val.length - 3;


            $(this).focus();
            $(this)[0].setSelectionRange(strLength, strLength);
        }




    });
</script>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/price-auto-comma.blade.php ENDPATH**/ ?>