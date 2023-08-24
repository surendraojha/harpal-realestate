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


    <p><strong>Name:</strong> <?php echo e($information->name); ?></p>

    <p><strong>Subject:</strong> <?php echo e($information->subject); ?></p>

    <p><strong>Phone:</strong> <?php echo e($information->phone); ?></p>
    <p><strong>Email:</strong> <?php echo e($information->email); ?></p>





    


    <p><strong>Message:</strong> <?php echo e($information->message); ?></p>

</body>
</html>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/mails/find-me-room.blade.php ENDPATH**/ ?>