<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">

            <label for="title">Title</label>

            <?php echo Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']); ?>



        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="subtitle">Sub title</label>

            <?php echo Form::text('subtitle', null, ['placeholder' => 'Subtitle', 'class' => 'form-control']); ?>

        </div>
    </div>



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="photo">Photo</label>

            <?php echo Form::file('photo', [ 'class' => 'form-control']); ?>

        </div>
    </div>



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="insurance">Insurance</label>


            <?php
                $insurances = [
                    '0' => 'No',
                    '1' => 'Yes',
                ];
            ?>

            <select name="insurance" class="form-control">
                <?php $__currentLoopData = $insurances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="loan_year">Loan Year</label>

            <?php echo Form::number('loan_year', null, ['placeholder' => 'Loan Year', 'class' => 'form-control']); ?>



        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">

            <label for="interest_rate">Interest Rate</label>
            <?php echo Form::number('interest_rate', null, ['placeholder' => 'Subtitle', 'min' => '1', 'class' => 'form-control']); ?>

        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="display-order">Display Order</label>

            <?php echo Form::number('order', null, ['placeholder' => 'Display Order', 'class' => 'form-control']); ?>



        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">


            <label for="description">Description</label>

            <textarea class="form-control ckeditor" name="description" cols="30" rows="10"><?php echo e(old('description', @$information->description)); ?></textarea>


        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/financial-support/form.blade.php ENDPATH**/ ?>