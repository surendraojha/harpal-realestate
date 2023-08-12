<div class="row clearfix">




    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Title</span>
                </div>
                <?php echo Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Category</span>
                </div>

                <select name="category_id" class="form-control">
                    <option value="" selected>Select Option</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>"
                        <?php echo e(old('category_id',@$information->category_id)==$value->id?'selected':""); ?>

                        ><?php echo e($value->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>


            </div>
        </div>
    </div>

    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Content</span>
                </div>
                <?php echo Form::textarea('description', null, ['placeholder' => 'Details', 'class' => 'form-control ckeditor']); ?>

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
            <img height="300px" src="<?php echo e(asset('blogs/' . @$information->photo)); ?>" alt="">
        <?php endif; ?>

    </div>











    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Writer Name</span>
                </div>

                <input type="text" name="writer_name"
                    value="<?php echo e(old('writer_name', @$information->writer_name) ?? auth()->user()->name); ?>" required>

            </div>
        </div>
    </div>












</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/blog/form.blade.php ENDPATH**/ ?>