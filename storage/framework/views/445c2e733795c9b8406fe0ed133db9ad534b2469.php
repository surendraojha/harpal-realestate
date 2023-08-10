<div class="row clearfix">
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Property</span>
                </div>
                <?php echo Form::select('property_id',$properties,null,['placeholder' => 'Select Property',
                'class'=>'form-control select2']); ?>



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


</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/recommended-property/form.blade.php ENDPATH**/ ?>