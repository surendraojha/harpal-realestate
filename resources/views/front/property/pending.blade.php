    <div class="row">

        @if($pending_properties->isEmpty() == false)
            @foreach ($pending_properties as $value)
            <div class="col-md-6 mb-4">
                <div class="singleenterBox">
                        <div class="row mb-2">
                            <div class="col-3">
                                <a href="{{route('property.detail',$value->slug)}}" title="{{$value->title}}">
                                    <img src="{{asset('uploads/'.$value->featured_photo)}}" alt="{{$value->title}}">
                                </a>
                            </div>
                            <div class="col-8">
                                <a href="{{route('property.detail',$value->slug)}}">
                                    <div class="singleenterContent">
                                        <div class="singleTitleBox">
                                            <h4>
                                                {{$value->title}}
                                            </h4>
                                            <span>
                                                #{{$value->ad_id}}
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-1">
                                <form action="{{route('my-property.destroy',$value->id)}}" method="post">

                                    @csrf
                                    @method('DELETE')
                                    <button class="trashBtn" type="submit"
                                    onclick="return confirm('Are You Sure You Want To Delete This Property?')"
                                    >
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <a class="trashBtn mt-3" href="{{route('my-property.edit',$value->slug)}}"
                                >
                                        <i class="fas fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    <div class="location">
                        <i class="fas fa-location-alt"></i>
                        {{@$value->location->location}}
                    </div>
                    <div class="pricong">

                        @php
                        $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price)
                    @endphp
                    Rs. {{$formatted_price}}
                    </div>
                    <div class="removeBox mt-2">
                        <div class="row">
                            <div class="col-8">
                                Waiting approval from admin. It will be listed on the website after admin approves
                                you ad.
                            </div>
                            <div class="col-3 text-end">


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach
            <x-pagination :informations="$pending_properties" />

        @else
            <x-no-listed-property />
        @endif
    </div>
