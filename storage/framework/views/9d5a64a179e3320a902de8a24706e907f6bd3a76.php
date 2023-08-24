<?php $__env->startSection('title'); ?>
    <?php echo e($module); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2> <?php echo e($module); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">

                <!-- search -->
                <div class="col-12">
                    <div class="card">
                        <form action="<?php echo e(route('user.index')); ?>" method="get">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="input-group">
                                            <?php echo $__env->make('admin.common.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">

                                        <button type="submit" class="btn btn-sm btn-primary btn-block">Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


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
                                    
                                    <table class="table table-hover table-custom spacing8" id="myTable">
                                        <thead>
                                            <tr>
                                                
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Requested Role</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                $status = [
                                                    '0' => 'Pending',
                                                    '1' => 'Approved',
                                                ];
                                            ?>

                                            <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>


                                                    <form action="<?php echo e(route('user-upgrade.update', $value->id)); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        

                                                        <td><?php echo e($value->user->name); ?></td>
                                                        <td><?php echo e($value->user->email); ?></td>

                                                        <td><?php echo e($value->previous_role); ?></td>
                                                        <td><?php echo e($value->role); ?></td>
                                                        <td>


                                                            <select name="status" class="form-control">
                                                                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($key); ?>"
                                                                        <?php if($value->status == $key): ?> selected <?php endif; ?>>
                                                                        <?php echo e($v); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                           
                                                        </td>
                                                        <td><?php echo e(date('d M, Y', strtotime($value->created_at))); ?></td>

                                                        <td>
                                                            <button type="submit">Change</button>
                                                        </td>
                                                    </form>

                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </tbody>
                                    </table>

                                    <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $informations]); ?>
<?php $component->withName('pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966)): ?>
<?php $component = $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966; ?>
<?php unset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966); ?>
<?php endif; ?>
                                </div>
                            </div>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/user-upgrade/index.blade.php ENDPATH**/ ?>