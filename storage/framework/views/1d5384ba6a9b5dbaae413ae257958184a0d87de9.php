<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Title</span>
                </div>
                <?php echo Form::text('title',null,['placeholder' => 'Title',
                'class'=>'form-control']); ?>

            </div>
        </div>
    </div>


    <?php if(@$information): ?>
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Slug</span>
                </div>
                <?php echo Form::text('slug',null,['placeholder' => 'Slug',
                'class'=>'form-control']); ?>



            </div>
        </div>
    </div>
    <?php endif; ?>

    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Parent Category</span>
                </div>

                <select name="parent" class="form-control select2">
                    <option value="" selected disabled></option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"
                            <?php echo e(old('parent',@$information->parent)==$value->id?'selected':''); ?>

                            ><?php echo e($value->title); ?>(<?php echo e($value->category->title); ?>)</option>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

            </div>
        </div>
    </div>


    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Display Order</span>
                </div>
                <?php echo Form::number('order',null,['placeholder' => 'Display Order',
                'class'=>'form-control']); ?>



            </div>
        </div>
    </div>



    


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status</span>
                </div>
                <?php

                    $status = [
                        '1'=>'Active',
                        '0'=>'InActive'
                    ]
                ?>
                <?php echo Form::select('status',$status,null,['placeholder' => 'Select Status',
                'class'=>'form-control']); ?>



            </div>
        </div>
    </div>



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Meta Title</span>
                </div>
                <?php echo Form::text('meta_title',null,['placeholder' => 'Meta Title',
                'class'=>'form-control']); ?>

            </div>
        </div>
    </div>

    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Meta Keyword</span>
                </div>
                <?php echo Form::text('meta_keyword',null,['placeholder' => 'Meta Keyword',
                'class'=>'form-control']); ?>

            </div>
        </div>
    </div>



    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Meta Description</span>
                </div>
                <?php echo Form::textarea('meta_description',null,['placeholder' => 'Meta Description',
                'class'=>'form-control']); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/child-category/form.blade.php ENDPATH**/ ?>