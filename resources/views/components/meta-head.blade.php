        <meta name="description" content="{{$meta->meta_description}}">
        <meta name="keywords" content="{{$meta->meta_keyword}}">

        @if(!$meta->photo)
            <meta property="og:image" content="{{asset('uploads/'.$setting->banner)}}" />
        @else
            <meta property="og:image" content="{{asset('uploads/'.$meta->photo)}}" />
        @endif
