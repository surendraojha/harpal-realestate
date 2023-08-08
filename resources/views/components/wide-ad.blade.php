@foreach ($ads as $value)
    <div class="container text-center py-3">
        <div class="row">
            <div class="col-12">
                <div class="kotha-ad">
                    <a style="cursor: pointer" onclick="window.open('{{$value->advertisement->link}}');" >
                        <img src="{{ asset('uploads/' . $value->advertisement->photo) }}" alt="Advertisement">

                    </a>
                </div>
            </div>
        </div>

    </div>
@endforeach
