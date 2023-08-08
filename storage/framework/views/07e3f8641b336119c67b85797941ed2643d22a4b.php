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
<?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/components/unselect-video-script.blade.php ENDPATH**/ ?>