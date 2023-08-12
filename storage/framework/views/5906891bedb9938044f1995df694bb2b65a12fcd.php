<?php $__env->startSection('title'); ?>
     <?php echo e($module); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>  <?php echo e($module); ?></h2>
                </div>
            </div>
        </div>
        <div class="row clearfix">

            <!-- search -->
            


            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link <?php if(!session()->get('errors')): ?> active show <?php endif; ?>"
                                data-toggle="tab" href="#Users"><?php echo e($module); ?> list
                            </a></li>
                        <li class="nav-item"><a class="nav-link <?php if(session()->get('errors')): ?> active show <?php endif; ?>"
                                data-toggle="tab" href="#addUser">Add <?php echo e($module); ?>

                            </a></li>
                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane  <?php if(!session()->get('errors')): ?> active show <?php endif; ?>" id="Users">
                            <div class="table-responsive">
                                <form method="post">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn btn-danger" onclick="return confirm('Are You Sure?')"
                                        formaction="<?php echo e(route('category.delete')); ?>" type="submit">
                                        <i class="fa fa-trash"></i>
                                    </button>

                                    <table class="table table-hover table-custom spacing8" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick" type="checkbox" id="check_all">
                                                        <span>#</span>
                                                    </label>
                                                </th>
                                                <th>Title</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                                <td>

                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick checkitem" type="checkbox"
                                                            name="id[]" value="<?php echo e($value->id); ?>">
                                                        <span></span>
                                                    </label>
                                                </td>

                                                <td><?php echo e($value->title); ?></td>

                                                <td><?php echo e(date('d M, Y',strtotime($value->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('category.edit',$value->id)); ?>"> <i
                                                            class="icon-pencil"></i> </a>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </tbody>
                                    </table>
                                </form>

                                <?php echo $informations->render(); ?>

                            </div>
                        </div>

                        

                        <div class="tab-pane <?php if(session()->get('errors')): ?>  active show  <?php endif; ?>" id="addUser">
                            <div class="body mt-2">

                                <?php echo Form::open(['route' => 'category.store', 'method' => 'post','files'=>true]); ?>


                                    <?php echo csrf_field(); ?>
                                    <?php echo $__env->make('admin.category.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-secondary" href="<?php echo e(route('category.index')); ?>">
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/category/index.blade.php ENDPATH**/ ?>