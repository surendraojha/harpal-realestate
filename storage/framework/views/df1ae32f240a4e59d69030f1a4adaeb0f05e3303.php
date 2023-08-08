<div class="row clearfix">


    

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
                    <span class="input-group-text">Module</span>
                </div>

                <?php if(@$information): ?>
                <?php if (isset($component)) { $__componentOriginal40b9c19f303b1cbe71b5541f60f14b20f8982844 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ModuleList::class, ['information' => $information]); ?>
<?php $component->withName('module-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40b9c19f303b1cbe71b5541f60f14b20f8982844)): ?>
<?php $component = $__componentOriginal40b9c19f303b1cbe71b5541f60f14b20f8982844; ?>
<?php unset($__componentOriginal40b9c19f303b1cbe71b5541f60f14b20f8982844); ?>
<?php endif; ?>

                <?php else: ?>
                <?php if (isset($component)) { $__componentOriginal40b9c19f303b1cbe71b5541f60f14b20f8982844 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ModuleList::class, []); ?>
<?php $component->withName('module-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40b9c19f303b1cbe71b5541f60f14b20f8982844)): ?>
<?php $component = $__componentOriginal40b9c19f303b1cbe71b5541f60f14b20f8982844; ?>
<?php unset($__componentOriginal40b9c19f303b1cbe71b5541f60f14b20f8982844); ?>
<?php endif; ?>

                <?php endif; ?>
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


    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                <?php echo Form::file('photo',['class'=>'form-control',"accept"=>"image/*"]); ?>

            </div>
        </div>

        <?php if(@$information): ?>
        <div class="form-group">
            <img height="300px" src="<?php echo e(asset('uploads/'.@$information->photo)); ?>" alt="">
        </div>
        <?php endif; ?>
    </div>

</div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/meta-tag/form.blade.php ENDPATH**/ ?>