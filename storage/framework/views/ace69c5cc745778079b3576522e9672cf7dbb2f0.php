<div class="col-12 mb-3">
    <div class="d-inline-flex mb-4 border-bottom ">
        <span class="form-nuumber">1.</span>
        <div>
            <h6 class="mb-0 formsmall-title">
                Basic Details
            </h6>
            <span class="d-block mt-2">
                All the fileds with <span class="text-danger"> * </span>are mandotary
            </span>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="singleformbox">
        <div class="row">

            

            <div class="col-md-2 mb-3">
                <div class="form-floating customForm">
                    <select class="form-select form-control <?php echo e($errors->has('purpose_id') ? ' is-invalid' : ''); ?>"
                        id="purpose_id" name="purpose_id" aria-label="Floating label select example">
                        <?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e(old('purpose_id', @$information->purpose_id) == $value->id ? 'selected' : ''); ?>>
                                <?php echo e($value->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                    <label for="purpose">Purpose <span class="text-danger">*</span></label>


                    <?php $__errorArgs = ['purpose_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="purpose-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            
            <div class="col-md-10 mb-3">
                <div class="form-floating customForm">
                    <input type="text" name="title"
                        class="form-control <?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                        value="<?php echo e(old('title', @$information->title)); ?>" id="title" placeholder="Propety Title">
                    <label for="fName">
                        Your Title <span class="text-danger">*</span>
                    </label>



                </div>

                <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-custom" role="alert">

                        <?php echo e($message); ?>

                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <span id="title-error" class="invalid-custom" role="alert">
                </span>
            </div>

            

            <div class="col-md-5">
                <div class="form-floating customForm">
                    <input type="file" name="featured_photo" accept="image/*"
                        class="form-control <?php echo e($errors->has('featured_photo') ? ' is-invalid' : ''); ?>"
                        id="featured_photo">
                    <label for="price">
                        Main Photo
                        
                    </label>
                </div>


                <?php $__errorArgs = ['featured_photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-custom" role="alert">

                        <?php echo e($message); ?>

                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <span id="featured-photo-error" class="invalid-custom" role="alert"></span>

                <a href="#" class="d-block mb-4" onclick="event.preventDefault();addPhotos()" class="a">Add
                    More Photos <i class="fas fa-plus"></i></a>

                <?php if(@$information->featured_photo): ?>
                    <img src="<?php echo e(asset('uploads/' . @$information->featured_photo)); ?>" alt="">
                <?php endif; ?>


                <div id="add-more-photos">

                    <?php
                        $current_route = \Request::route()->getName();
                    ?>


                    <?php if($current_route == 'admin-residental-property.edit'): ?>
                        <?php echo $__env->make('admin.property.edit-photos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>


            
            <div class="col-md-4">
                <div class="form-floating customForm">
                    <input type="text" name="price"
                        class="form-control <?php echo e($errors->has('price') ? ' is-invalid' : ''); ?>" id="price"
                        placeholder="" value="<?php echo e(old('price', @$information->price)); ?>">
                    <label for="price">
                        Price *<span>eg. Rs 5000 per month</span>
                    </label>
                    <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">
                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="price-error" class="invalid-custom" role="alert"></span>
                </div>
            </div>


            
            <div class="col-md-3">
                <div class="form-floating customForm">
                    <?php
                        $negotiation = [
                            '' => 'Select Option',
                            '0' => 'No',
                            '1' => 'Yes',
                        ];
                    ?>
                    <?php echo Form::select('price_negotiable', $negotiation, @$information->price_negotiable, ['class' => 'form-select form-control ' . ($errors->has('price_negotiable') ? ' is-invalid' : ''), '', 'id' => 'price_negotiable']); ?>

                    <label for="">Price Negotiable <span class="text-danger">*</span></label>
                    <?php $__errorArgs = ['price_negotiable'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">
                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="price-negotiable-error" class="invalid-custom" role="alert"></span>

                </div>
            </div>

            
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <input type="hidden" name="category_id" value="1">
                </div>
            </div>


            <?php
                $subcategories = \App\Models\Category::where('parent', 1)
                    ->orderBy('order')
                    ->where('status', 1)
                    ->get();

            ?>

            
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <select
                        class="form-select form-control <?php echo e($errors->has('sub_category_id') ? ' is-invalid' : ''); ?>"
                        id="sub_category_id" aria-label="Floating label select example" name="sub_category_id">
                        <option value="" disabled selected>Select Option</option>
                        <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e(old('sub_category_id', @$information->sub_category_id) == $value->id ? 'selected' : ''); ?>>
                                <?php echo e($value->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                    <label for="sub_category_id">Category<span class="text-danger">*</span></label>


                    <?php $__errorArgs = ['sub_category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="sub-category-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>




        </div>
    </div>
</div>




<div class="col-12">
    <div class="d-inline-flex mb-4 border-bottom ">
        <span class="form-nuumber">2.</span>
        <div>
            <h6 class="mb-0 formsmall-title">
                Amenities
            </h6>
            <span class="d-block mt-2">
                All the fileds with <span class="text-danger"> * </span>are mandotary
            </span>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="singleformbox">





        <div class="row">
            

            <?php if(@$information): ?>
                <?php if (isset($component)) { $__componentOriginal944b6dcd60a38d58bbf249c2e0c65e0d0cf6d547 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DateOfBuild::class, ['information' => $information]); ?>
<?php $component->withName('date-of-build'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal944b6dcd60a38d58bbf249c2e0c65e0d0cf6d547)): ?>
<?php $component = $__componentOriginal944b6dcd60a38d58bbf249c2e0c65e0d0cf6d547; ?>
<?php unset($__componentOriginal944b6dcd60a38d58bbf249c2e0c65e0d0cf6d547); ?>
<?php endif; ?>
            <?php else: ?>
                <?php if (isset($component)) { $__componentOriginal944b6dcd60a38d58bbf249c2e0c65e0d0cf6d547 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DateOfBuild::class, []); ?>
<?php $component->withName('date-of-build'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal944b6dcd60a38d58bbf249c2e0c65e0d0cf6d547)): ?>
<?php $component = $__componentOriginal944b6dcd60a38d58bbf249c2e0c65e0d0cf6d547; ?>
<?php unset($__componentOriginal944b6dcd60a38d58bbf249c2e0c65e0d0cf6d547); ?>
<?php endif; ?>

            <?php endif; ?>
            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <input type="text" name="bedroom"
                        class="form-control <?php echo e($errors->has('bedroom') ? ' is-invalid' : ''); ?>" id="bedroom"
                        placeholder="eg. 1,2,3 .." value="<?php echo e(old('bedroom', @$information->bedroom)); ?>">
                    <label for="bedroom">
                        Bed Room <span>eg. 1,2,3</span>
                    </label>


                    <?php $__errorArgs = ['bedroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="bedroom-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>





            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">



                    <?php
                        $kitchen = [
                            '' => 'Select Kitchen',
                            '1' => 'Yes',
                            '0' => 'No',
                        ];
                    ?>
                    <?php echo Form::select('kitchen', $kitchen, @$information->kitchen, ['class' => 'form-select form-control', 'id' => 'kitchen']); ?>


                    <label for="kitchen">Kitchen</label>

                    <?php $__errorArgs = ['kitchen'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="kitchen-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <input type="text" name="bathroom"
                        class="form-control <?php echo e($errors->has('bathroom') ? ' is-invalid' : ''); ?>" id="bathroom"
                        placeholder="eg. 1,2,3 .." value="<?php echo e(old('bathroom', @$information->bathroom)); ?>">
                    <label for="bathroom">
                        Bath Room <span>eg. 1,2,3 ..</span>
                    </label>


                    <?php $__errorArgs = ['bathroom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="bathroom-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">


                    <?php
                        $furnishing = [
                            '' => 'Select Option',
                            'Yes' => 'Yes',
                            'No' => 'No',
                            'Semi Furnished' => 'Semi Furnished',
                        ];
                    ?>
                    <?php echo Form::select('furnishing', $furnishing, @$information->furnishing, ['class' => 'form-select form-control', 'id' => 'furnishing']); ?>


                    <label for="">Furnishing</label>

                    <?php $__errorArgs = ['furnishing'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>


                    <span id="furnishing-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>


            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">


                    <?php
                        $faced = [
                            '' => 'Select Option',
                            'East' => 'East',
                            'West' => 'West',
                            'North' => 'North',
                            'South' => 'South',
                        ];
                    ?>
                    <?php echo Form::select('faced', $faced, @$information->faced, ['class' => 'form-select form-control ', 'id' => 'faced']); ?>


                    <label for="">Faced</label>

                    <?php $__errorArgs = ['faced'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="faced-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">



                    <select name="parking" id="parking"
                        class="form-control <?php echo e($errors->has('parking') ? ' is-invalid' : ''); ?>">
                        <option value="" disabled selected>--Select Option--</option>
                        <option value="Yes"
                            <?php echo e(old('parking', @$information->parking == 'Yes' ? 'selected' : '')); ?>>
                            Yes
                        </option>
                        <option value="No"
                            <?php echo e(old('parking', @$information->parking == 'No' ? 'selected' : '')); ?>>No
                        </option>
                    </select>

                    <label for="parking">
                        Parking
                    </label>


                    <?php $__errorArgs = ['parking'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="parking-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>
            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <select name="balcony" id="balcony"
                        class="form-select form-control <?php echo e($errors->has('balcony') ? ' is-invalid' : ''); ?>">
                        <option value="" disabled selected>Select Option</option>
                        <option value="1"
                            <?php echo e(old('balcony', @$information->balcony) == '1' ? 'selected' : ''); ?>>Yes
                        </option>
                        <option value="0"
                            <?php echo e(old('balcony', @$information->balcony) == '0' ? 'selected' : ''); ?>>No
                        </option>
                    </select>
                    <label for="balcony">
                        Balcony
                    </label>


                    <?php $__errorArgs = ['balcony'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="balcony-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>


            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <select name="floor_id" id="floor_id"
                        class="form-select form-control <?php echo e($errors->has('floor_id') ? ' is-invalid' : ''); ?>">
                        <option value="" disabled selected>Select Option</option>
                        <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e(old('floor_id', @$information->floor_id) == $value->id ? 'selected' : ''); ?>>
                                <?php echo e($value->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label for="floor_id">
                        Floor
                    </label>


                    <?php $__errorArgs = ['floor_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="floor-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">
                    <select name="road_size_id" id="road_size_id"
                        class="form-select form-control <?php echo e($errors->has('road_size_id') ? ' is-invalid' : ''); ?>">
                        <option value="" selected disabled>Select Option</option>
                        <?php $__currentLoopData = $road_sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($value->id); ?>"
                                <?php echo e(old('road_size_id', @$information->road_size_id) == $value->id ? 'selected' : ''); ?>>
                                <?php echo e($value->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <label for="road_size_id">
                        Road Type
                    </label>


                    <?php $__errorArgs = ['road_size_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="road-size-id-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

            
            <div class="col-md-4 mb-3">
                <div class="form-floating customForm">

                    <?php
                        $water = [
                            '' => 'Select Option',
                            '1' => 'Yes',
                            '0' => 'No',
                        ];
                    ?>
                    <?php echo Form::select('water', $water, @$information->water, ['class' => 'form-select form-control ', 'id' => 'water']); ?>


                    <label for="water">Water</label>

                    <?php $__errorArgs = ['water'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="water-error" class="invalid-custom" role="alert">
                    </span>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="col-12">
    <div class="d-inline-flex mb-4 border-bottom ">
        <span class="form-nuumber">2.</span>
        <div>
            <h6 class="mb-0 formsmall-title">
                More Details
            </h6>
            <span class="d-block mt-2">
                All the fileds with <span class="text-danger"> * </span>are mandotary
            </span>
        </div>
    </div>
</div>
<div class="col-12">
    <div class="singleformbox">
        <div class="row">

            
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">

                    <?php
                        if (old('contact_number', @$information->contact_number)) {
                            $number = old('contact_number', @$information->contact_number);
                        } else {
                            $number = auth()->user()->phone;
                        }
                    ?>

                    <input type="text" name="contact_number"
                        class="form-control <?php echo e($errors->has('contact_number') ? ' is-invalid' : ''); ?>"
                        id="contact_number" placeholder="eg. 1,2,3 .." value="<?php echo e($number); ?>">

                    <label for="bathroom">
                        Contact Number
                    </label>

                    <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <span id="contact-number-error" class="invalid-custom" role="alert">
                    </span>
                </div>


            </div>



            
            <div class="col-md-12 mb-3">


                <div class="append-locations mt-4 mb-4">
                    <div class="form-floating customForm">

                        <select name="location_id" id="location_id"
                            class="select2 <?php echo e($errors->has('location_id') ? ' is-invalid' : ''); ?>">
                            <option value="" disabled selected>Select or Type Location <span
                                    class="text-danger">*</span></option>
                            <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($value->id); ?>"
                                    <?php echo e(old('location_id', @$information->location_id) == $value->id ? 'selected' : ''); ?>>
                                    <?php echo e($value->location); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>


                        

                        <?php $__errorArgs = ['location_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-custom" role="alert">

                                <?php echo e($message); ?>

                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <span id="location-id-error" class="invalid-custom" role="alert">
                        </span>
                    </div>
                </div>

                <div class="form-floating customForm">
                    <input type="text" name="location_for_map"
                        class="form-control <?php echo e($errors->has('location_for_map') ? ' is-invalid' : ''); ?>"
                        id="geo-code" placeholder="eg. latitude and longitude"
                        value="<?php echo e(old('location_for_map', @$information->location_for_map)); ?>">
                    <label for="geo-code">
                        Location if have latitude and longitude (optional)
                    </label>


                    <?php $__errorArgs = ['location_for_map'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <hr />
            </div>



            
            <div class="col-md-12 mb-3">
                <label for="overview">
                    Description
                </label>
                <div class="form-floating customForm">


                    <textarea name="overview" id=""
                        class="form-control ckeditor <?php echo e($errors->has('overview') ? ' is-invalid' : ''); ?>"
                        placeholder="eg. Describe About Your Property"><?php echo e(old('overview', @$information->overview)); ?></textarea>


                    <?php $__errorArgs = ['overview'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="col-md-12 mb-3">

                <div class="customForm">
                    <span class="radioTitle">
                        Local Area Facilities
                    </span>


                    <div class="d-flex " style="flex-wrap: wrap">
                        <?php $__currentLoopData = $additional_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-check mb-2" style="white-space: nowrap">
                                <input class="form-check-input" name="feature_id[]"
                                    <?php if(@$checked_features): ?> <?php if(in_array($value->id, $checked_features)): ?>
                                        checked <?php endif; ?>
                                    <?php endif; ?>

                                type="checkbox"
                                value="<?php echo e($value->id); ?>" id="feature<?php echo e($value->id); ?>">
                                <label class="form-check-label" for="feature<?php echo e($value->id); ?>">
                                    <?php echo e($value->title); ?>

                                </label>
                            </div>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>

            

            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <input type="file" accept="video/*" name="video" id="video"
                        class="form-control <?php echo e($errors->has('video') ? ' is-invalid' : ''); ?>" id="featured_video">
                    <label for="video">
                        Featured Video
                    </label>


                    <?php if (isset($component)) { $__componentOriginal5704b47f8c982bb421f01920c29a4c7f5940cd23 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UnselectVideo::class, []); ?>
<?php $component->withName('unselect-video'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5704b47f8c982bb421f01920c29a4c7f5940cd23)): ?>
<?php $component = $__componentOriginal5704b47f8c982bb421f01920c29a4c7f5940cd23; ?>
<?php unset($__componentOriginal5704b47f8c982bb421f01920c29a4c7f5940cd23); ?>
<?php endif; ?>

                    <?php $__errorArgs = ['video'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-custom" role="alert">

                            <?php echo e($message); ?>

                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <?php if(@$information->video): ?>
                    <video width="320" height="240" controls>
                        <source src="<?php echo e(asset('uploads/' . @$information->video)); ?>" type="video/mp4">
                        <source src="<?php echo e(asset('uploads/' . @$information->video)); ?>" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>

                <?php endif; ?>

            </div>


            
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <select name="status" id="status" class="form-control">
                                            <option value="" selected disabled>Select Option</option>

                        <option value="1" <?php echo e(old('status', @$information->status) == "1" ? 'selected' : ''); ?>>
                            Active
                        </option>
                        <option value="0" <?php echo e(old('status', @$information->status) == "0" ? 'selected' : ''); ?>>
                            InActive
                        </option>
                    </select>


                    <label for="status">
                        Status
                    </label>



                </div>


            </div>


            
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <input type="number" class="form-control" name="view" id="view"
                        value="<?php echo e(old('view', @$information->view)); ?>">


                    <label for="view">
                        Views
                    </label>



                </div>


            </div>

            
            <div class="col-md-6 mb-3">
                <div class="form-floating customForm">
                    <input type="text" class="form-control" name="video_code" id="video_code"
                        value="<?php echo e(old('video_code', @$information->video_code)); ?>">


                    <label for="view">
                        Video Code
                    </label>



                </div>


            </div>


            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Meta Title</span>
                        </div>
                        <?php echo Form::text('meta_title', null, ['placeholder' => 'Meta Title', 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>

            

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> Meta Keyword</span>
                        </div>
                        <?php echo Form::text('meta_keyword', null, ['placeholder' => 'Meta Keyword', 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>



            

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Meta Description</span>
                        </div>
                        <?php echo Form::textarea('meta_description', null, ['placeholder' => 'Meta Description', 'class' => 'form-control']); ?>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/residental-property/form.blade.php ENDPATH**/ ?>