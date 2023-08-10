


<?php $__env->startSection('title','Profile'); ?>

<?php $__env->startSection('content'); ?>
    <div class="ContactForm moreDetailSignup">
        <form action="<?php echo e(route('profile.update')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                        Personal Details
                    </h6>
                    <div class="customForm">
                        <div class="d-flex profileImageBox">
                            <label for="inputProfile" class="inputBox position-relative">

                                <?php if(@$profile->photo): ?>
                                    <?php
                                        $path = asset('uploads/' . @$profile->photo);
                                    ?>
                                <?php else: ?>
                                    <?php
                                        $path = asset('front/assets/imgs/user.webp');
                                    ?>
                                <?php endif; ?>

                                <img id="profileImage" src="<?php echo e($path); ?>" alt="photo">
                                <i class="fas fa-camera"></i>
                            </label>
                            <input type="file" name="photo" onchange="readURL(this);" id="inputProfile" class="d-none">
                            <label for="inputProfile" class="editText">
                                <i class="fa-solid fa-user-pen"></i>Add Image
                            </label>
                        </div>
                    </div>
                </div>
                




                
                <div class="col-md-4">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" id="fName"
                            placeholder="eg.John" name="name" value="<?php echo e(old('name', $user->name)); ?>">
                        <label for="fName">
                            Full Name
                        </label>

                        <?php $__errorArgs = ['name'];
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



                

                <div class="col-md-4">
                    <div class="form-floating customForm">
                        <input type="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                            id="fName" placeholder="eg.John" name="email" value="<?php echo e(old('email', $user->email)); ?>">
                        <label for="fName">
                            Email
                        </label>

                        <?php $__errorArgs = ['email'];
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
                
                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="tel" class="form-control <?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>"
                            id="pNumber" placeholder="eg.Nepal" name="phone" value="<?php echo e(old('phone', $user->phone)); ?>">
                        <label for="pNumber">
                            Phone Number
                        </label>

                        <?php $__errorArgs = ['phone'];
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

                
                


                


                <div class="col-12">
                    <h6 class="mt-3 mb-4 text-center">
                        Basic Property Query
                    </h6>
                </div>
                <div class="col-md-4">
                    <div class="customForm">
                        <span class="radioTitle">
                            Who are You ?
                        </span>
                        <div class="d-flex">
                            

                            <div class="form-check">
                                <input class="form-check-input <?php echo e($errors->has('user_type') ? ' is-invalid' : ''); ?>"
                                    name="user_type" type="radio" value="user" id="user"
                                    <?php echo e(old('user_type', strtolower(@$profile->user_type)) == 'user' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="user">
                                    General User
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input <?php echo e($errors->has('user_type') ? ' is-invalid' : ''); ?>"
                                    name="user_type" type="radio" value="agent" id="agent"
                                    <?php echo e(old('user_type', strtolower(@$profile->user_type)) == 'agent' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="agent">
                                    Agent
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input <?php echo e($errors->has('user_type') ? ' is-invalid' : ''); ?>"
                                    name="user_type" type="radio" value="owner" id="Owner"
                                    <?php echo e(old('user_type', strtolower(@$profile->user_type)) == 'owner' ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="Owner">
                                    Owner
                                </label>

                                <?php $__errorArgs = ['user_type'];
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
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="customForm">
                        <span class="radioTitle">
                            You Own
                        </span>
                        <div class="d-flex">
                            <div class="form-check">
                                <input class="form-check-input <?php echo e($errors->has('you_own') ? ' is-invalid' : ''); ?>"
                                    name="you_own[]" type="checkbox" value="House" id="House"

                                    <?php if(in_array('House',$you_own)): ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                <label class="form-check-label" for="House">
                                    House
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="you_own[]" type="checkbox" value="Apartment"
                                    id="Apartment"

                                    <?php if(in_array('Apartment',$you_own)): ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                <label class="form-check-label" for="Apartment">
                                    Apartments
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="you_own[]" type="checkbox" value="Commertial Building"
                                    id="Commertial Building"

                                    <?php if(in_array('Commertial Building',$you_own)): ?>
                                        checked
                                    <?php endif; ?>
                                    >
                                <label class="form-check-label" for="Commertial Building">
                                    Commercial Building
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="customForm">
                    <button type="submit" class="colorBtn ms-0">
                        Update <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
     //scripts only for rental home page
     new SlimSelect({
  select: '.multiple-category'
});
new SlimSelect({
  select: '.multiple-location'
});
new SlimSelect({
  select: '.customLocation'
});
new SlimSelect({
  select: '.customCategory'
});
new SlimSelect({
  select: '.locationGlobe'
});
$(document).on('select2:open', (e) => {
    const selectId = e.target.id

    $(".select2-search__field[aria-controls='select2-" + selectId + "-results']").each(function (
        key,
        value,
    ){
        value.focus();
    })
})

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/profile.blade.php ENDPATH**/ ?>