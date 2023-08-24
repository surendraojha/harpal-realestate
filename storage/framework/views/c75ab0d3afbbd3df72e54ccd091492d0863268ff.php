<?php $__env->startSection('title', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
    <div class="ContactForm moreDetailSignup">
        <form class="row" action="<?php echo e(route('user-upgrade.post')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>



            <div class="col-12">
                <h6 class="text-center mb-3">
                    Request Upgrade
                </h6>

            </div>





            <?php
                $roles = [
                    'user' => 'User',
                    'agent' => 'Agent',
                    'agency' => 'Agency',
                ];
            ?>

            <div class="col-md-3">
                <div class="form-floating customForm">
                    <select name="role" class="form-select form-control <?php echo e($errors->has('role') ? ' is-invalid' : ''); ?>"
                        required>


                        <option value="" disabled selected>Select role</option>

                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(auth()->user()->role != $key): ?>
                                <option value="<?php echo e($key); ?>"
                                    <?php echo e(old('role', strtolower(auth()->user()->role)) == $key ? 'selected' : ''); ?>>
                                    <?php echo e($value); ?>

                                </option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                    </select>
                    <label for="pNumber">
                        Request Upgrade
                    </label>
                    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>



            <div class="customForm">
                <button type="submit" class="colorBtn ms-0">
                    Update <i class="fas fa-arrow-right ps-2"></i>
                </button>
            </div>
        </form>

        <?php if($data->isNotEmpty()): ?>
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                        Request History
                    </h6>


                    <table class="table table-striped">
                        <thead>
                            <th>Previous Role</th>
                            <th>Requested Role</th>
                            <th>Status</th>
                            <th>Requested At</th>

                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(ucwords($value->previous_role)); ?></td>
                                    <td><?php echo e(ucwords($value->role)); ?></td>
                                    <td><?php echo e($value->status ? 'Approved' : 'Pending'); ?></td>
                                    <td><?php echo e(date('Y-m-d', strtotime($value->created_at))); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/request-upgrade.blade.php ENDPATH**/ ?>