<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property Information</title>
</head>
<body>

    <p>Hi Admin ,{{$information->user->name}} has just posted a new add </p>

    <h3>Here Are The Details</h3>

    <p><strong>Ad Id:</strong> {{$information->ad_id}}
         <a target="_blank" href="{{route('property.detail',$information->slug)}}">View More</a></p>


         <a target="_blank" href="{{route('property.index')}}">View All Listings</a></p>

    <p><strong>Title:</strong> {{$information->title}}</p>

    <p><strong>Purpose:</strong> {{$information->purpose->title}}</p>
    <p><strong>Price:</strong> {{$information->price}}</p>
    <p><strong>Location:</strong>{{@$information->location->location}}</p>


</body>
</html>
