<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Property Information</title>
</head>
<body>

    <p>Hi Admin ,<?php echo e($information->user->name); ?> has just posted a new add </p>

    <h3>Here Are The Details</h3>

    <p><strong>Ad Id:</strong> <?php echo e($information->ad_id); ?>

         <a target="_blank" href="<?php echo e(route('property.detail',$information->slug)); ?>">View More</a></p>


         <a target="_blank" href="<?php echo e(route('property.index')); ?>">View All Listings</a></p>

    <p><strong>Title:</strong> <?php echo e($information->title); ?></p>

    <p><strong>Purpose:</strong> <?php echo e($information->purpose->title); ?></p>
    <p><strong>Price:</strong> <?php echo e($information->price); ?></p>
    <p><strong>Location:</strong><?php echo e(@$information->location->location); ?></p>


</body>
</html>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/mails/property-create-admin.blade.php ENDPATH**/ ?>