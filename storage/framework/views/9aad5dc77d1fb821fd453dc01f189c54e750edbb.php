<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Find Me Room Information</title>
</head>
<body>

    <p>Hi Admin , You Get Find Room Request</p>

    <p>Here Are The Details</p>


    <p><strong>Name:</strong> <?php echo e($information->name); ?></p>

    <p><strong>Tole/Area:</strong> <?php echo e($information->total_area); ?></p>

    <p><strong>Phone:</strong> <?php echo e($information->phone); ?></p>


    <?php if($information->location): ?>
        <?php
            $location = json_decode($information->location);
        ?>
    <h4><strong>Location: </strong></h4>
        <?php $__currentLoopData = $location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($value); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>



    <?php if($information->rental_type): ?>
        <?php
            $rental_type = json_decode($information->rental_type);
        ?>
    <h4><strong>Room Type: </strong></h4>
        <?php $__currentLoopData = $rental_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($value); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php endif; ?>


    <p><strong>Message:</strong> <?php echo e($information->message); ?></p>

    <?php if(@$information->deposit_slip): ?>
    <a target="_blank" href="<?php echo e(asset('uploads/'.@$information->deposit_slip)); ?>" target="_blank">Click Here For Deposit Slip</a>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/mails/find-me-room.blade.php ENDPATH**/ ?>