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


                <div class="col-md-4">
                    <div class="form-floating customForm">

                        <textarea name="about_me" class="form-control <?php echo e($errors->has('about_me') ? ' is-invalid' : ''); ?>" cols="30" rows="10"><?php echo e(old('about_me',@$user->profile->about_me)); ?></textarea>

                        <label for="fName">
                            About Me
                        </label>

                        <?php $__errorArgs = ['about_me'];
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
                        <input type="text" class="form-control <?php echo e($errors->has('country') ? ' is-invalid' : ''); ?>"

                             placeholder="eg.Nepal" name="country"
                             value="<?php echo e(old('country', @$user->profile->country)); ?>">
                        <label for="pNumber">
                             country
                        </label>

                        <?php $__errorArgs = ['country'];
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


                <?php if(in_array($user->role,['agent','agency'])): ?>
                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="number" class="form-control <?php echo e($errors->has('experience') ? ' is-invalid' : ''); ?>"

                            id="pNumber" min="0" placeholder="eg.Nepal" name="experience"
                             value="<?php echo e(old('experience', @$user->profile->experience)); ?>">
                        <label for="pNumber">
                            Years of Experience
                        </label>

                        <?php $__errorArgs = ['experience'];
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
                <?php endif; ?>


                <div class="col-md-3">
                    <div class="form-floating customForm">
                        <input type="text" class="form-control <?php echo e($errors->has('facebook') ? ' is-invalid' : ''); ?>"

                             placeholder="https://facebook.com/id" name="facebook"
                             value="<?php echo e(old('facebook', @$user->profile->facebook)); ?>">
                        <label for="pNumber">
                             facebook
                        </label>

                        <?php $__errorArgs = ['facebook'];
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
                        <input type="text" class="form-control <?php echo e($errors->has('twitter') ? ' is-invalid' : ''); ?>"

                             placeholder="https://twitter.com/id" name="twitter"
                             value="<?php echo e(old('twitter', @$user->profile->twitter)); ?>">
                        <label for="pNumber">
                             twitter
                        </label>

                        <?php $__errorArgs = ['twitter'];
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
                        <input type="text" class="form-control <?php echo e($errors->has('linkedin') ? ' is-invalid' : ''); ?>"

                             placeholder="https://linkedin.com/id" name="linkedin"
                             value="<?php echo e(old('linkedin', @$user->profile->linkedin)); ?>">
                        <label for="pNumber">
                             linkedin
                        </label>

                        <?php $__errorArgs = ['linkedin'];
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
                        <input type="text" class="form-control <?php echo e($errors->has('instagram') ? ' is-invalid' : ''); ?>"

                             placeholder="https://instagram.com/id" name="instagram"
                             value="<?php echo e(old('instagram', @$user->profile->instagram)); ?>">
                        <label for="pNumber">
                             instagram
                        </label>

                        <?php $__errorArgs = ['instagram'];
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
                        <input type="text" class="form-control <?php echo e($errors->has('website') ? ' is-invalid' : ''); ?>"

                             placeholder="https://website.com/id" name="website"
                             value="<?php echo e(old('website', @$user->profile->website)); ?>">
                        <label for="pNumber">
                             website
                        </label>

                        <?php $__errorArgs = ['website'];
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
                            <?php


                            ?>

                            
                            <div class="form-check">

                                <label class="form-check-label" for="user">
                                    <?php echo e(ucwords(auth()->user()->role)); ?>

                                </label>

                                <a href="<?php echo e(route('user-upgrade')); ?>">Want to change your role?</a>
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