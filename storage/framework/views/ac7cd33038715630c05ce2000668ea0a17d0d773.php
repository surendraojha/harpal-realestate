<div class="col-md-4">
    <div class="contactFrom">
        <h5 class="mb-4">
            Didn't Find What You are looking for?
            <br> <span class="text-danger">Let us know</span>
        </h5>
        <form action="<?php echo e(route('front.contact-us.post')); ?>" method="post">

            <?php echo csrf_field(); ?>
            <div class="ContactForm">
                <div class="customForm">
                    <label for="">
                        Your Full Name <span class="text-danger">
                            *
                        </span>
                    </label>
                    <input type="text" name="name" value="<?php echo e(old('name')); ?>" placeholder="Type your name...">
                </div>
                <div class="customForm">
                    <label for="phone">
                        Your Phone Number
                        <span class="text-danger">
                            *
                        </span>
                    </label>
                    <input type="text" name="phone" id="phone" value="<?php echo e(old('phone')); ?>"
                        placeholder="Type your phone number...">
                </div>


                
                    <div class="customForm">
                        <label for="email">
                            Email
                        </label>
                        <input type="email" id="email" required name="email" value="<?php echo e(old('email')); ?>"
                            placeholder="Enter Your Email">
                    </div>


                <div class="customForm">
                    <label for="keyword">Location
                        <span class="text-danger">
                            *
                        </span>
                    </label>

                    <select name="location[]" id="location_id" multiple>

                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->location); ?>"><?php echo e($value->location); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                <div class="customForm">
                    <div class="fieldBox">
                        <label for="destination">Rental type
                            <span class="text-danger">
                                *
                            </span>
                        </label>
                        <!-- Optgroups -->
                        <select name="rental_type[]" class="select2" multiple>

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <optgroup label="<?php echo e($value->title); ?>">
                                    <?php $__currentLoopData = $value->subcategory->sortBy('order'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($v->title); ?>"><?php echo e($v->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </select>
                    </div>
                </div>
                <div class="customForm">
                    <label for="">Tole/Area
                        <span class="text-danger">
                            *
                        </span>
                    </label>
                    <input type="text" name="total_area" value="<?php echo e(old('total_area')); ?>"
                        placeholder="eg. Samakhushi">
                </div>
                <div class="customForm">
                    <label for="">
                        If any
                    </label>
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Write a Message"><?php echo e(old('message')); ?></textarea>
                </div>
                <div class="customForm text-end">
                    <button class="colorBtn" type="submit">
                        Send <i class="flaticon-right-arrow ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/includes/find-me-room.blade.php ENDPATH**/ ?>