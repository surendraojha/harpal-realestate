<div class="col-md-8">
    <div class="siteTitle mb-4">
        <h5 class="mb-2">
            Our Video Reviews
        </h5>
        {!!$setting->video_text!!}
    </div>
    <div class="formBox">
        <div class="row">

            @foreach ($videos as $value)
                @php
                    $youtube_link = \App\Helpers\VideoHelper::youtubelink($value->link);
                @endphp

                <div class="col-md-6">
                    <iframe width="100%" height="250" src="{{ $youtube_link }}" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            @endforeach


        </div>
    </div>
</div>
