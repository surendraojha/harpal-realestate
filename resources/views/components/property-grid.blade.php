<div class="property-grid">
    <a href="{{ route('property.detail',$information->slug) }}">

        @if (isset($information->photo) && file_exists(public_path('uploads/' . $information->photo)))
            <img src="{{ asset('uploads/' . $information->photo) }}" alt="{{ $information->title }}">
        @else
            <img src="{{ asset('no-photo.jpg') }}" alt="Default Photo">
        @endif

    </a>
    <div class="pro-box">
        <p class="for-sale">{{ $information->purpose->title }}</p>
        <h5><a href="{{ route('property.detail',$information->slug) }}">{{Str::substr($information->title, 0, 20) }}</a></h5>
        <p><i class="fa fa-map-marker-alt"></i> {{ $information->location->location }}</p>
        <ul class="listing">
            <li>Listing Id: {{ $information->ad_id }}</li>
            <li>Area: {{ $information->area }}</li>
        </ul>
        <h6>{{ $information->price }}
            {{-- <span> (Five Lakh)</span> --}}

        </h6>
        <ul class="comments">
            <li><a href="#">{{ $information->wishlist->count() }} <i class="fa-solid fa-thumbs-up"></i></a></li>
            <li><a href="#">11 <i class="fa fa-comments"></i></a></li>
            <li><a href="#">{{ $information->view }} <i class="fa fa-eye"></i></a></li>
            <li><a href="#">11 <i class="fa-sharp fa-solid fa-share-nodes"></i></a></li>
        </ul>
    </div>
</div>
