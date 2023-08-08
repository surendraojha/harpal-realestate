@if(@$photos->isEmpty()==false)
@foreach ($photos as $value)
    @php
        $div_id = 'photo-'.rand().'-'.$value->id;
    @endphp
    <div class='mb-3' id="{{$div_id}}">
            <img height="100px" src="{{asset('uploads/'.$value->photo)}}" alt="Photo">
            <button type="button" class="btn btn-danger" onclick="deletePhotoServer('{{$value->id}}','{{$div_id}}')"><i class='fa fa-trash'></i></button>
    </div>

@endforeach


@endif
