

<script>
var id = "#{{$id}}";
    var output = "#{{$outputId}}";
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
