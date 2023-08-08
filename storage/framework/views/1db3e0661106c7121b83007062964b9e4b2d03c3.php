<script>
    // delete
    function unselectVideo() {
        $("#video").val("");
        $('#unselect-video').hide();


    }


    $('#video').on('change',function(){
        var video =   $("#video").val();

        if(video){
            $('#unselect-video').show();
        }
    });
</script>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/unselect-video-script.blade.php ENDPATH**/ ?>