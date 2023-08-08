

<?php $__env->startSection('title'); ?>
Edit <?php echo e($module); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit <?php echo e($module); ?>

                    </h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#addUser">Edit
                                <?php echo e($information->title); ?>

                            </a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane active show" id="addUser">
                            <div class="body mt-2">
                                <?php echo Form::model($information,['route' => ['sub-category.update',$information->id],
                                'method' => 'post']); ?>


                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <?php echo $__env->make('admin.sub-category.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-secondary" href="<?php echo e(route('sub-category.index')); ?>">
                                        Close
                                    </a>
                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/sub-category/edit.blade.php ENDPATH**/ ?>