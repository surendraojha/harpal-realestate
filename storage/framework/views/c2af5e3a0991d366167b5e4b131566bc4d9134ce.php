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
                <?php echo Form::select('parent',$categories,null,['placeholder' => 'Select Parent Category',
                'class'=>'form-control']); ?>



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
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/sub-category/form.blade.php ENDPATH**/ ?>