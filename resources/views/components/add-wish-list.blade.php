@php
$user = auth()->user();

$wish_list = \App\Models\WishList::where('user_id', $user->id)
    ->where('property_id', $value->id)
    ->first();
@endphp


@if (!$wish_list)
    @php
        $class = 'addTofav';
    @endphp
@else
    @php
        $class = 'addedTofav';
    @endphp
@endif
<a href="{{ route('add-to-wish-list', $value->id) }}" class="{{$class}}" data-bs-toggle="tooltip"
    data-bs-placement="top" title="" data-bs-original-title="Add To Favourites">
    <i class="fas fa-heart"></i>
</a>
