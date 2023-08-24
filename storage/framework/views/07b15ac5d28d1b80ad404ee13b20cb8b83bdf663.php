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
                        <form action="<?php echo e(route('property.index')); ?>" method="get">
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="keyword"
                                                value="<?php echo e(@$keyword); ?>" placeholder="Type here to search  "
                                                autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="input-group">
                                            <select name="ad_status" id="" class="form-control">
                                                <option value="">All</option>
                                                <option value="pending"
                                                    <?php echo e(old('ad_status', @$ad_status) == 'pending' ? 'selected' : ''); ?>>Pending
                                                </option>
                                                <option value="active"
                                                    <?php echo e(old('ad_status', @$ad_status) == 'active' ? 'selected' : ''); ?>>Active
                                                </option>
                                                <option value="expired"
                                                    <?php echo e(old('ad_status', @$ad_status) == 'expired' ? 'selected' : ''); ?>>Expired /
                                                    Fulfilled</option>


                                                <option value="my-properties"
                                                    <?php echo e(old('ad_status', @$ad_status) == 'my-properties' ? 'selected' : ''); ?>>My
                                                    Properties</option>


                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6">

                                        <button type="submit" class="btn btn-sm btn-primary btn-block">Search
                                        </button>
                                    </div>
                                </div>


                                <a class="btn btn-success" href="<?php echo e(route('my-property.create')); ?>">Add New</a>
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
                            
                        </ul>
                        <div class="tab-content mt-0">
                            <div class="tab-pane  <?php if(!session()->get('errors')): ?> active show <?php endif; ?>" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        <?php echo csrf_field(); ?>


                                        <?php
                                            $route = route('property.delete');
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

                                                    <th>S.N.</th>
                                                    <th>Title</th>
                                                    <th>Location</th>
                                                    <th>Price</th>
                                                    <th>Status</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                                            <?php if (isset($component)) { $__componentOriginal2421223eec0c339ee6970e5b24b2bf0b075e6611 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BackendPageNumber::class, ['index' => $index]); ?>
<?php $component->withName('backend-page-number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2421223eec0c339ee6970e5b24b2bf0b075e6611)): ?>
<?php $component = $__componentOriginal2421223eec0c339ee6970e5b24b2bf0b075e6611; ?>
<?php unset($__componentOriginal2421223eec0c339ee6970e5b24b2bf0b075e6611); ?>
<?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <strong>Ad ID :</strong> <?php echo e($value->ad_id); ?> <br>

                                                            <strong>Title:</strong>
                                                            <?php echo e($value->title); ?>


                                                        </td>
                                                        <td>
                                                            <?php echo e(@$value->province->title); ?>,
                                                           <?php echo e(@$value->district->title); ?>



                                                        </td>
                                                        <?php
                                                            $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price);
                                                        ?>
                                                        <td>Rs. <?php echo e($formatted_price); ?>



                                                        </td>
                                                        <td>
                                                            <?php if($value->status == 1): ?>
                                                                Active
                                                            <?php elseif($value->status == 2): ?>
                                                                FulFilled
                                                            <?php else: ?>
                                                                Pending
                                                            <?php endif; ?>
                                                        </td>

                                                        <td><?php echo e(date('d M, Y', strtotime($value->created_at))); ?></td>

                                                        <td>
                                                            <a href="<?php echo e(route('my-property.edit', $value->id)); ?>"> <i
                                                                    class="icon-pencil"></i> </a>
                                                            </a>

                                                            <?php
                                                                $support_forum = \App\Models\SupportForum::where('property_id', $value->id)->count();
                                                            ?>

                                                            <a href="<?php echo e(route('support-forum.index', ['property_id' => $value->id])); ?>"
                                                                title="Show Support Forums">
                                                                <i class="fa fa-eye"></i>
                                                                <span class="danger"><?php echo e($support_forum); ?></span>
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

                            

                            <div class="tab-pane <?php if(session()->get('errors')): ?> active show <?php endif; ?>" id="addUser">
                                <div class="body mt-2">

                                    <?php echo Form::open(['route' => 'property.store', 'method' => 'post', 'files' => true]); ?>


                                    <?php echo csrf_field(); ?>
                                    <?php echo $__env->make('admin.property.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-secondary" href="<?php echo e(route('property.index')); ?>">
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

        // add photos
        var count = 0;

        function addPhotos() {
            $('#add-more-photos').append(`
                <div class='mb-3' id="photo-${count}">
                <input type='file' name="photo[]" accept="image/*">

                <button class="btn btn-danger" onclick="event.preventDefault();deletePhoto('photo-'+${count})"><i class='fa fa-trash'></i></button>
                <div>
            `);

            count++;
        }

        function deletePhoto(id) {
            $('#' + id).remove();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/property/index.blade.php ENDPATH**/ ?>