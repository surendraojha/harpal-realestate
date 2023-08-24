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
            <div class="col-12">
                <div class="card">
                    <form action="<?php echo e(route('sub-category.index')); ?>" method="get">
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
                                <form method="post">
                                    <?php echo csrf_field(); ?>


                                       <?php
                                            $route = route('sub-category.delete');
                                        ?>

                                        <?php if (isset($component)) { $__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DeleteButton::class, ['user' => $user,'route' => $route]); ?>
<?php $component->withName('delete-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0)): ?>
<?php $component = $__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0; ?>
<?php unset($__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0); ?>
<?php endif; ?>

                                    <table class="table table-hover table-custom spacing8" id="myTable">
                                        <thead>
                                            <tr>
                                    <?php if (isset($component)) { $__componentOriginald8a51c162588ea709c68e4c359f2789b4c9c6ad6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CheckBoxTh::class, ['user' => $user]); ?>
<?php $component->withName('check-box-th'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald8a51c162588ea709c68e4c359f2789b4c9c6ad6)): ?>
<?php $component = $__componentOriginald8a51c162588ea709c68e4c359f2789b4c9c6ad6; ?>
<?php unset($__componentOriginald8a51c162588ea709c68e4c359f2789b4c9c6ad6); ?>
<?php endif; ?>

                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Order</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <tr>
                                <?php if (isset($component)) { $__componentOriginalad1ca2411112f604fd12c5844d6dc66a28a4bdc9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CheckBoxTd::class, ['value' => $value,'user' => $user]); ?>
<?php $component->withName('check-box-td'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalad1ca2411112f604fd12c5844d6dc66a28a4bdc9)): ?>
<?php $component = $__componentOriginalad1ca2411112f604fd12c5844d6dc66a28a4bdc9; ?>
<?php unset($__componentOriginalad1ca2411112f604fd12c5844d6dc66a28a4bdc9); ?>
<?php endif; ?>


                                                <td><?php echo e($value->title); ?></td>
                                                <td><?php echo e($value->category->title); ?></td>
                                                <td>
                                                    <?php if($value->status==1): ?>
                                                        Active
                                                    <?php else: ?>
                                                        InActive
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($value->order); ?></td>
                                                <td><?php echo e(date('d M, Y',strtotime($value->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('sub-category.edit',$value->id)); ?>"> <i
                                                            class="icon-pencil"></i> </a>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                        </tbody>
                                    </table>
                                </form>

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

                        

                        <div class="tab-pane <?php if(session()->get('errors')): ?>  active show  <?php endif; ?>" id="addUser">
                            <div class="body mt-2">

                                <?php echo Form::open(['route' => 'sub-category.store', 'method' => 'post']); ?>


                                    <?php echo csrf_field(); ?>
                                    <?php echo $__env->make('admin.sub-category.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
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

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/sub-category/index.blade.php ENDPATH**/ ?>