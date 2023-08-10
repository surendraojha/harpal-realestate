

<script>
var id = "#<?php echo e($id); ?>";
    var output = "#<?php echo e($outputId); ?>";
    countCharacter(id,output);

$(id).on('keyup',function(){
    countCharacter(id,output);

});

function countCharacter(id,output){
    var text = $(id).val();

    var length = text.length;
        $(output).html(length);

        if(length>160){
            alert('Only 160 Characters Allowed!!We are truncating your text');

             text = text.substring(0, 160);
             length = text.length;
            $(id).val(text);
                    $(output).html(length);


        }

}



</script>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/character-count.blade.php ENDPATH**/ ?>