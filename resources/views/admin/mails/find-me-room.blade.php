<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Information</title>
</head>
<body>

    <p>Hi Admin , You have got new message</p>

    <p>Here Are The Details</p>


    <p><strong>Name:</strong> {{$information->name}}</p>

    <p><strong>Subject:</strong> {{$information->subject}}</p>

    <p><strong>Phone:</strong> {{$information->phone}}</p>
    <p><strong>Email:</strong> {{$information->email}}</p>

{{--
    @if($information->location)
        @php
            $location = json_decode($information->location);
        @endphp
    <h4><strong>Location: </strong></h4>
        @foreach ($location as $value)
            <p>{{$value}}</p>
        @endforeach

    @endif --}}



    {{-- @if($information->rental_type)
        @php
            $rental_type = json_decode($information->rental_type);
        @endphp
    <h4><strong>Room Type: </strong></h4>
        @foreach ($rental_type as $value)
            <p>{{$value}}</p>
        @endforeach

    @endif --}}


    <p><strong>Message:</strong> {{$information->message}}</p>
{{-- 
    @if(@$information->deposit_slip)
    <a target="_blank" href="{{asset('uploads/'.@$information->deposit_slip)}}" target="_blank">Click Here For Deposit Slip</a>
    @endif --}}
</body>
</html>
