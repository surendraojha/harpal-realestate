<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boosting Information</title>
</head>
<body>

    <p>Hi Admin , You Get BOost Request</p>

    <p>Here Are The Details</p>

    <h3>Property Details</h3>
    <p><strong>Package :</strong> <?php echo e($information->subscription->title); ?></p>

    <p><strong>Property Detail:</strong> <?php echo e($information->property->title); ?></p>


    <p><strong>Ad Id:</strong> <?php echo e($information->property->ad_id); ?>

         <a target="_blank" href="<?php echo e(route('property.detail',$information->property->slug)); ?>">View More</a></p>

    <h3>Personal Details</h3>

    <p><strong>Name:</strong> <?php echo e($information->name); ?></p>
    <p><strong>Email:</strong> <?php echo e($information->email); ?></p>

    <p><strong>Phone:</strong> <?php echo e($information->phone); ?></p>

    <?php if(@$information->deposit_slip): ?>
    <a target="_blank" href="<?php echo e(asset('uploads/'.@$information->deposit_slip)); ?>" target="_blank">Click Here For Deposit Slip</a>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/mails/boost-admin.blade.php ENDPATH**/ ?>