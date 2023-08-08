<div class="row clearfix">



    <?php if(!@$position): ?>
        <?php
            $position = [];
        ?>
    <?php endif; ?>









    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Link</span>
                </div>
                <?php echo Form::text('link', null, ['placeholder' => 'Link *', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>






    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                <?php echo Form::file('photo', ['class' => 'form-control']); ?>

            </div>
        </div>

        <?php if(@$information->photo): ?>
            <img height="300px" src="<?php echo e(asset('uploads/' . @$information->photo)); ?>" alt="">
        <?php endif; ?>

    </div>



    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <h3>Ad Positioning </h3>

                

            </div>
        </div>
    </div>

    <?php $__currentLoopData = $ad_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php echo e($value); ?></span>
                    </div>

                    <input type="checkbox" class="form-control" name="ad_type[]" value="<?php echo e($key); ?>"
                        <?php if(in_array($key, $position)): ?> checked <?php endif; ?>>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>











    
    
</div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/advertisement/form.blade.php ENDPATH**/ ?>