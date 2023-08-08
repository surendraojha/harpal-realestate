<?php
    $options = [
        'Home Page'=>'Home Page',
        'Featured Page'=>'Featured Page',
        'Recommended Page'=>'Recommended Page',
        'New Deals Page'=> 'New Deals Page',
        'Top Rated Page'=> 'Top Rated Page',
        // 'Location Page'=>'Location Page',
        // 'Search Page'=>'Search Page',
        'Partner Page'=>'Partner Page',
        'Contact Us Page'=>'Contact Us Page',
        'Shift Home Page'=>'Shift Home Page',
        'Boost Detail Page'=>'Boost Detail Page',
        'Find Me Room Page'=>'Find Me Room Page',
        'Support Forum Page'=>'Support Forum Page',
        'Login Page'=>  'Login Page',
        'Register Page'=>'Register Page',
        'Forget Password Page'=>'Forget Password Page',
        'Aboutus Page'=>'Aboutus Page',


    ]
?>

<select name="module" id="" class="form-control">
    <option value="" disabled selected>Select Option</option>

    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value="<?php echo e($key); ?>"
        <?php echo e(old('module',@$information->module)==$key?'selected':''); ?>

        ><?php echo e($value); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/module-list.blade.php ENDPATH**/ ?>