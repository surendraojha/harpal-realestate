<?php $__env->startSection('title'); ?>
    <?php echo e($module); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2><?php echo e($module); ?></h2>
                    </div>
                </div>
            </div>
            <div class="row clearfix">




                <div class="col-lg-12">
                    <div class="card">

                        <div class="tab-content mt-0">
                            <div class="tab-pane  <?php if(!session()->get('errors')): ?> active show <?php endif; ?>" id="Users">
                                <div class="table-responsive">
                                    <form method="post">
                                        <?php echo csrf_field(); ?>

                                        <table class="table table-hover table-custom spacing8" id="myTable">

                                            <tbody>




                                            <?php if(@$information->property): ?>
                                                <tr>
                                                    <th>AdID</th>
                                                    <td>

                                                    <a target="_blank" href="<?php echo e(route('property.detail',$information->property->slug)); ?>">
                                                        <?php echo e(@$information->property->ad_id); ?>

                                                    </a>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                                <?php
                                                    $deposit_slip = public_path() . '/uploads/' . $information->deposit_slip;
                                                ?>


                                                <tr>
                                                    <th>Deposit Slip</th>
                                                    <td>
                                                        <?php if(file_exists($deposit_slip) && $information->deposit_slip): ?>
                                                            <a target="_blank" href="<?php echo e(asset('uploads/' . $information->deposit_slip)); ?>">Show
                                                                Slip</a>
                                                        <?php else: ?>
                                                            Not Available
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>





                                                <tr>
                                                    <th>Name</th>

                                                    <td>

                                                        <?php echo e($information->name); ?>

                                                    </td>
                                                </tr>


                                                <tr>
                                                    <th>Email</th>

                                                    <td>

                                                        <?php echo e($information->email); ?>

                                                    </td>
                                                </tr>







                                                <tr>
                                                    <th>Phone</th>
                                                    <td><?php echo e($information->phone); ?></td>

                                                </tr>


                                                <tr>
                                                    <th>Message</th>
                                                    <td>
                                                        <?php echo $information->message; ?>

                                                    </td>
                                                </tr>



                                                <tr>
                                                    <th>Subscription</th>
                                                    <td><?php echo e($information->subscription->title); ?></td>

                                                </tr>


                                                <tr>

                                                    <th>Created At</th>
                                                    <td><?php echo e(date('h:i:s a d M, Y', strtotime($information->created_at))); ?>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Action</th>
                                                    <td>


                                                             <a href="<?php echo e(route('boost-request.show',$information->id)); ?>">


                                                            <?php if($information->status==1): ?>

                                                            <span style="color: green">Approved</span>

                                                            <?php else: ?>
                                                            <span style="color:red;"
                                                            >Pending</span>

                                                            <?php endif; ?>

                                                        </a>


                                                        


                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>


                                </div>
                            </div>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/boost-request/show.blade.php ENDPATH**/ ?>