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

            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link <?php if(!session()->get('errors')): ?> active show <?php endif; ?>"
                                data-toggle="tab" href="#Users"><?php echo e($module); ?> list
                            </a></li>

                    </ul>
                    <div class="tab-content mt-0">
                        <div class="tab-pane  <?php if(!session()->get('errors')): ?> active show <?php endif; ?>" id="Users">
                            <div class="table-responsive">
                                <form method="post">
                                    <?php echo csrf_field(); ?>


                                     <?php
                                            $route = route('support-forum.delete');
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

                                                <th>Property</th>
                                                <th>Description</th>
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


                                                <td>
                                                    <?php echo e(@$value->property->title); ?>

                                                </td>
                                                <td> <?php echo e($value->comment); ?>




                                                </td>


                                                <td><?php echo e(date('d M, Y',strtotime($value->created_at))); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('support-forum.show',$value->id)); ?>"> <i
                                                            class="fa fa-eye"></i> </a>
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

                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script>
           getSubcategory();
        $('#category_id').on('change', function() {

            getSubcategory();

        });



        function getSubcategory() {
            var category_id = $('#category_id option:selected').val();

            // alert(category_id);
            var url = "<?php echo e(url('get-sub-category')); ?>/" + category_id;
            $.ajax({
                url: url,
                success: function(result) {

                    $('#sub_category_id').empty();
                    var data = result.data;

                    $('#sub_category_id').append(`<option value='' disabled selected>Select Option</option>`)

                    jQuery.each(data, function(index, itemData) {
                        $('#sub_category_id').append(
                            `<option value='${itemData.id}'>${itemData.title}</option>`)
                    });
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/support-forum/index.blade.php ENDPATH**/ ?>