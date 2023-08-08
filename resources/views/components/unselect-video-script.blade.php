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
