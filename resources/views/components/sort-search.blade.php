<select name="order" id=""
onchange="this.form.submit()"
class="formCustom">
    <option value=""
    {{old('order',$order)==""?'selected':''}}
    >Most Relevance</option>
    <option value="latest"

    {{old('order',$order)=="latest"?'selected':''}}

    >Latest Property</option>
    <option value="oldest"
    {{old('order',$order)=="oldest"?'selected':''}}

    >Oldest Property</option>
    <option value="lowest-price"
    {{old('order',$order)=="lowest-price"?'selected':''}}

    >Lowest Price First</option>
    <option value="highest-price"
    {{old('order',$order)=="highest-price"?'selected':''}}

    >Hightest Price First</option>
</select>
