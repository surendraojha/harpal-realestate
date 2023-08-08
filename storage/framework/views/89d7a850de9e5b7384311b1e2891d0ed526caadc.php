<div class="col-md-4 mb-3">
    <div class="form-floating customForm">

        <?php
            $current_year = date('Y');

            for ($i = $current_year; $i >= 1970; $i--) {
                $date = $i . '-' . date('m-d');
                $nepali_year = \App\Helpers\DateHelper::englishToNepaliYear($date);
                $years[] = $nepali_year;
            }

        ?>

        <select name="date_of_build" id="date_of_build"
            class="form-select form-control  <?php echo e($errors->has('date_of_build') ? ' is-invalid' : ''); ?>">

            <option value="" disabled selected>Select Option</option>
                <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value); ?>"
                        <?php echo e(old('date_of_build', @$information->date_of_build) == $value ? 'selected' : ''); ?>>
                        <?php echo e($value); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        <label for="date_of_build">
            Date Of Build
            
        </label>


        <?php $__errorArgs = ['date_of_build'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-custom" role="alert">

                <?php echo e($message); ?>

            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>



        <span id="date-of-build-error" class="invalid-custom" role="alert">
        </span>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/date-of-build.blade.php ENDPATH**/ ?>