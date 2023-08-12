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
                    <span class="input-group-text">Sub Title</span>
                </div>
                <?php echo Form::text('subtitle', null, ['placeholder' => 'Sub Title', 'class' => 'form-control']); ?>



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
            <img height="300px" src="<?php echo e(asset('uploads/'.@$information->photo)); ?>" alt="">
        <?php endif; ?>

    </div>











    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Display Order</span>
                </div>
                <?php echo Form::text('order', null, ['placeholder' => 'Display Order', 'class' => 'form-control']); ?>


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
                        '1' => 'Active',
                        '0' => 'InActive',
                    ];
                ?>
                <?php echo Form::select('status', $status, null, ['placeholder' => 'Select option', 'class' => 'form-control']); ?>


            </div>
        </div>
    </div>






</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/page/form.blade.php ENDPATH**/ ?>