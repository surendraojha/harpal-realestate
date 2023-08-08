<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h1>Dashboard</h1>
                    
                </div>
                
            </div>
        </div>

        <div class="row clearfix">


             
             <div class="col-lg-3 col-md-6">
                <a href="#">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Properties</span>
                                    <h4 class="mb-0 font-weight-medium"> <?php echo e(@$rental_properties); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>



            
            <div class="col-lg-3 col-md-6">
                <a href="<?php echo e(route('boost-request.index')); ?>">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                    <i class="fa fa-rocket" aria-hidden="true"></i>



                                        </div>

                                <div class="ml-4">
                                    <span>Boost Request</span>
                                    <h4 class="mb-0 font-weight-bold"> <?php echo e(@$boost_request); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>


            <div class="col-lg-3 col-md-6">
                <a href="<?php echo e(route('contact-us.index')); ?>">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Find Me Room</span>
                                    <h4 class="mb-0 font-weight-medium"> <?php echo e(@$find_me_room); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>

            </div>



            <div class="col-lg-3 col-md-6">
                <a href="<?php echo e(route('faq.index')); ?>">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>FAQs</span>
                                    <h4 class="mb-0 font-weight-medium"> <?php echo e(@$faqs); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6">
                <a href="<?php echo e(route('shift-home.index')); ?>">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Shift Homes</span>
                                    <h4 class="mb-0 font-weight-medium"> <?php echo e(@$shift_homes); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6">
                <a href="<?php echo e(route('user.index')); ?>">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Users</span>
                                    <h4 class="mb-0 font-weight-medium"> <?php echo e(@$users); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6">
                <a href="<?php echo e(route('advertisement.index')); ?>">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Advertisements</span>
                                    <h4 class="mb-0 font-weight-medium"> <?php echo e(@$advertisement); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-lg-3 col-md-6">
                <a href="<?php echo e(route('support-forum.index')); ?>">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle">
                                <i class="fa fa-comment" aria-hidden="true"></i>

                                </div>

                                <div class="ml-4">
                                    <span>Forum</span>
                                    <h4 class="mb-0 font-weight-medium"> <?php echo e(@$forum); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-lg-3 col-md-6">
                <a href="#">

                    <div class="card">
                        <div class="body">
                            <div class="d-flex align-items-center">
                                <div class="icon-in-bg bg-indigo text-white rounded-circle"><i
                                        class="fa fa-list-alt"></i></div>

                                <div class="ml-4">
                                    <span>Newsletter Subscribers</span>
                                    <h4 class="mb-0 font-weight-medium"> <?php echo e(@$news_letter_subscribers); ?></h4>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover table-custom spacing5">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                                <th>Created At</th>
                                

                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $latest_users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($value->name); ?></td>
                                <td><?php echo e($value->email); ?></td>
                                <td><?php echo e($value->role); ?></td>
                                <td><?php echo e(date('d M, Y',strtotime($value->created_at))); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </tbody>
                    </table>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/dashboard.blade.php ENDPATH**/ ?>