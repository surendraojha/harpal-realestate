<?php $__env->startSection('title'); ?>
Edit blog
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit blog
                    </h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#addUser">Edit blog
                        </a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane active show" id="addUser">
                            <div class="body mt-2">
                                <?php echo Form::model($information,['route' => ['blog.update',$information->id],
                                'method' => 'post','files'=>true]); ?>



                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>

                                        <div class="row clearfix">

                                            <?php echo $__env->make('admin.blog.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>




                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Update
                                            </button>
                                            <a class="btn btn-secondary" href="<?php echo e(route('blog.index')); ?>">
                                                Close
                                            </a>
                                        </div>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/blog/edit.blade.php ENDPATH**/ ?>