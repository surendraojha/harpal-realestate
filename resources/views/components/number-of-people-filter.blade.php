<select name="capacity" id="" class="formCustom">
    <option value="" disabled >No Of People</option>
    <option value="1"
    {{old('capacity',@$capacity)==1?'selected':''}}
    >1</option>
    <option value="2"
    {{old('capacity',@$capacity)==2?'selected':''}}
    >2</option>
    <option value="3"
    {{old('capacity',@$capacity)==3?'selected':''}}
    >3</option>
    <option value="4"
    {{old('capacity',@$capacity)==4?'selected':''}}

    >4</option>
    <option value="more"
    {{old('capacity',@$capacity)=='more'?'selected':''}}

    >5+</option>
</select>
