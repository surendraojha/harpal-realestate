<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shift Home Information</title>
</head>
<body>
    <p>Hi Admin , You Get Shift Home Request</p>

    <p>Here Are The Details</p>


    <p><strong>Type:</strong> {{$information->type}}</p>
    <p><strong>Pickup Location:</strong> {{$information->pick_up_location}}</p>
    <p><strong>Dropoff Location:</strong> {{$information->drop_off_location}}</p>

    @if($information->schedule_time && $information->schedule_date)
    <p><strong>Schedule date:</strong> {{$information->schedule_date}}</p>
    <p><strong>Schedule time:</strong> {{$information->schedule_time}}</p>

    @else
    <p><strong>Schedule date:</strong> Instant</p>
    <p><strong>Schedule time:</strong> Instant</p>
    @endif
    <p><strong>Phone:</strong> {{$information->phone}}</p>


    <p>Check Dashboard For More Details</p>


    @if(@$information->deposit_slip)
    <a target="_blank" href="{{asset('uploads/'.@$information->deposit_slip)}}" target="_blank">Click Here For Deposit Slip</a>
    @endif
</body>
</html>
