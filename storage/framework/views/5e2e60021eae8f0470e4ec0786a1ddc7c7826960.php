


<?php $__env->startSection('title', 'Search Results ..'); ?>

<?php $__env->startSection('content'); ?>
    <section class="bannerSec">

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bannerImg">
                        <img src="<?php echo e(asset('front/assets/imgs/aboutus.webp')); ?>" alt="">
                        <div class="bannerCaption">
                            <div class="siteTitle mt-4">
                                <h5 class="bannerTitle">
                                    <?php echo e($count_property); ?> Rooms on found
                                </h5>
                                <i class="bannersubTitle">
                                    <?php if($count_property<$per_page): ?>
                                        <b><?php echo e($count_property); ?> </b> Per page
                                    <?php else: ?>
                                        <b><?php echo e($per_page); ?> </b> Per page
                                    <?php endif; ?>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single page banner ends -->
    <!-- Category page start -->
    <!-- Category page ends -->
    <!-- List Of Boxes -->
    <!-- Newest resendential FDeals -->
    <section class="siteSec pt-2 mt-4">
        <form action="<?php echo e(route('filter.property')); ?>">

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="categorySidebar">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <h4>
                                    Properties Filter
                                </h4>
                            </div>
                        </div>
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="location-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#location-collapseTwo" aria-expanded="false"
                                        aria-controls="location-collapseTwo">
                                        Choose Locations
                                    </button>
                                </h2>
                                <div id="location-collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="location-headingTwo">
                                    <div class="accordion-body">
                                        <div class="fieldBox">
                                            <select name="location[]" class="formCustom select2" multiple>

                                                <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($value->id); ?>"
                                                        <?php if(in_array($value->id,$location_id)): ?>
                                                            selected
                                                        <?php endif; ?>
                                                        ><?php echo e($value->location); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="price-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#price-collapseTwo" aria-expanded="false"
                                        aria-controls="price-collapseTwo">
                                        Price Range ( Rs. )
                                    </button>
                                </h2>
                                <div id="price-collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="price-headingTwo">
                                    <div class="accordion-body">
                                        <div class="price-input">
                                            <div class="field">
                                                <span>Min</span>
                                                <input type="number" name="min" class="input-min" value="<?php echo e($price_min); ?>">
                                            </div>
                                            <div class="separator">-</div>
                                            <div class="field">
                                                <span>Max</span>
                                                <input type="number" name="max" class="input-max" value="<?php echo e($price_max); ?>">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="propertyType-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#propertyType-collapseOne" aria-expanded="true"
                                        aria-controls="propertyType-collapseOne">
                                        Property Type
                                    </button>
                                </h2>
                                <div id="propertyType-collapseOne" class="accordion-collapse show"
                                    aria-labelledby="propertyType-headingOne">
                                    <div class="accordion-body">

                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div>
                                                <b><?php echo e($value->title); ?></b>
                                            </div>
                                            <?php $__currentLoopData = $value->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php if($v->status==1): ?>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic checkbox toggle button group">

                                                        <input type="checkbox" name="category_id[]" value="<?php echo e($v->id); ?>" class="btn-check" id="<?php echo e($v->id); ?>"
                                                            autocomplete="off"   <?php if(in_array($v->id,$category_id)): ?>
                                                            checked
                                                        <?php endif; ?>>
                                                        <label class="btn btn-outline-primary"
                                                            for="<?php echo e($v->id); ?>"><?php echo e($v->title); ?></label>


                                                </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="rodeType-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#rodeType-collapseOne" aria-expanded="true"
                                        aria-controls="rodeType-collapseOne">
                                        Road size
                                    </button>
                                </h2>
                                <div id="rodeType-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="rodeType-headingOne">
                                    <div class="accordion-body">

                                        <?php $__currentLoopData = $roadSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                            <input class="form-check-input" name="road_size[]" type="checkbox" value="<?php echo e($value->id); ?>"
                                            id="roadSize<?php echo e($value->id); ?>"  <?php if(in_array($value->id,$road_size)): ?>
                                            checked
                                        <?php endif; ?>>
                                            <label class="form-check-label" for="roadSize<?php echo e($value->id); ?>">
                                                <?php echo e($value->title); ?>

                                            </label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseTwo">
                                        Floor
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body">

                                        <?php $__currentLoopData = $floors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="form-check">
                                            <input class="form-check-input" name="floor[]" type="checkbox"
                                            <?php if(in_array($value->id,$floor)): ?>
                                            checked
                                        <?php endif; ?>

                                            value="<?php echo e($value->id); ?>" id="floor<?php echo e($value->id); ?>">
                                            <label class="form-check-label" for="floor<?php echo e($value->id); ?>">
                                                <?php echo e($value->title); ?>

                                            </label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapseThree">
                                        More Filters
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body">

                                        <?php $__currentLoopData = $additional_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <div class="form-check">
                                            <input class="form-check-input" name="feature[]" type="checkbox"
                                            <?php if(in_array($value->id,$featured_id)): ?>
                                            checked
                                        <?php endif; ?>

                                            value="<?php echo e($value->id); ?>" id="additional-feature<?php echo e($value->id); ?>">
                                            <label class="form-check-label" for="additional-feature<?php echo e($value->id); ?>">
                                               <?php echo e($value->title); ?>

                                            </label>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="colorBtn px-3 py-2 d-block w-100 border-radius mt-3">
                            Apply Filter
                        </button>
                    </div>

                    </form>
                </div>
                <?php echo $__env->make('front.filter-result', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
<script>
    $('#per_page').on('change',function(){

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/filteration.blade.php ENDPATH**/ ?>