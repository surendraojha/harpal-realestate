<?php $__env->startSection('content'); ?>
    <div class="banner-section">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 dream-box">
                        <h1>Find it. Tour it. Own it.</h1>
                        <form>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Property Type">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Listing Type">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="District">
                                    </div>
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Gau/Nagarpalika">
                                    </div>
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Ward No.">
                                    </div>
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Tole">
                                    </div>
                                    <div class="md-form">
                                        <input type="text" class="form-control" placeholder="Street">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="number" class="form-control" placeholder="Min Price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <input type="number" class="form-control" placeholder="Max Price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="md-form">
                                        <a class="btn btn-sends">Send</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flat-link-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <ul>
                        <li><a href="#">Find Rooms and Flats</a></li>
                        <li><a href="#">Auctioned Properties</a></li>
                        <li><a href="#">List Properties</a></li>
                        <li><a href="#">Find Home Loans</a></li>
                        <li><a href="#">Unit Converter</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="key-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2  col-lg-2 megamenus">
                    <ul class="menu">
                        <h5><i class="fas fa-list"></i> Categories</h5>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="#"><img src="./images/offer.png" alt=""> <?php echo e($main->title); ?> <i
                                        class="fa fa-angle-right"></i></a>

                                <div class="row megadrop">

                                    <div class="col-md-3 mega-links">
                                        <?php $__currentLoopData = $main->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <h6><?php echo e($sub->title); ?></h6>
                                            <ul>
                                                <?php $__currentLoopData = $sub->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li><a href="#"><i class="fa fa-angle-right"></i>
                                                            <?php echo e($child->title); ?></a></li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            </ul>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>

                                </div>

                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <li> <a href="#">See All Categories <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-10 col-lg-10 effect-lily-right">
                    <div class="row">
                        <div class="col-12 col-sm-12 category-item owl-carousel">
                            <div class="category-box">
                                <div class="row">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3">


                                            <a href="#">
                                                <div class="grid">
                                                    <figure class="effect-lily">
                                                        <img src="./images/key1.jpg" alt="">
                                                        <figcaption>
                                                            <div>
                                                                <h3><?php echo e($value->title); ?></h3>
                                                            </div>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </div>
                            </div>
                            <div class="category-box">
                                <a href="#">
                                    <img class="cato-image" src="./images/house3.jpg" alt="">
                                </a>
                            </div>
                            <div class="category-box">
                                <a href="#">
                                    <img class="cato-image" src="./images/house1.jpg" alt="">
                                </a>
                            </div>
                            <div class="category-box">
                                <a href="#">
                                    <img class="cato-image" src="./images/house2.jpg" alt="">
                                </a>
                            </div>
                            <div class="category-box">
                                <a href="#">
                                    <img class="cato-image" src="./images/house4.jpg" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="property-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Announcement <a href="<?php echo e(route('front.featured')); ?>">View All</a></h4>
                </div>
                <div class="col-12 col-sm-12 property-item owl-carousel">

                    <?php $__currentLoopData = $featured_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PropertyGrid::class, ['information' => $value->property]); ?>
<?php $component->withName('property-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12)): ?>
<?php $component = $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12; ?>
<?php unset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
                <!-- <div class="col-12 col-sm-12 product-item owl-carousel">
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house1.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house2.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house3.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house4.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house5.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house6.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house7.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
              <div class="prod-box">
                <a href="#">
                  <img src="./images/house8.jpg" alt="">
                </a>
                <h5><a href="#">Product Title</a></h5>
              </div>
            </div> -->
            </div>
        </div>
    </div>

    <div class="sell-rent">
        <div class="container">
            <div class="row">

                <div class="col-12 col-sm-12">
                    <ul class="tabs">
                        <?php
                            $count = 0;
                        ?>
                        <?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li <?php if($count == 0): ?> class="active" <?php endif; ?> rel="tab<?php echo e($count++); ?>">
                                <?php echo e($value->title); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                    <div class="tab_container">
                        <?php
                            $count = 0;
                        ?>
                        <?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h3 class="d_active tab_drawer_heading" rel="tab<?php echo e($count); ?>"><?php echo e($value->title); ?></h3>
                            <div id="tab<?php echo e($count); ?>" class="tab_content">
                                <div class="col-12 col-sm-12 property-item owl-carousel">

                                    <?php $__currentLoopData = $value->property; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if (isset($component)) { $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PropertyGrid::class, ['information' => $item]); ?>
<?php $component->withName('property-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12)): ?>
<?php $component = $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12; ?>
<?php unset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12); ?>
<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="property-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>New Property <a href="<?php echo e(route('front.newdeals')); ?>">View All</a></h4>
                </div>
                <div class="col-12 col-sm-12 property-item owl-carousel">

                    <?php $__currentLoopData = $recent_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PropertyGrid::class, ['information' => $value]); ?>
<?php $component->withName('property-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12)): ?>
<?php $component = $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12; ?>
<?php unset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>

    <div class="property-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Top Property Listing<a href="<?php echo e(route('front.recommended')); ?>">View All</a></h4>
                </div>


                <div class="col-12 col-sm-12 property-item owl-carousel">

                    <?php $__currentLoopData = $recommended_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PropertyGrid::class, ['information' => $value->property]); ?>
<?php $component->withName('property-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12)): ?>
<?php $component = $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12; ?>
<?php unset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </div>
            </div>
        </div>
    </div>

    <?php $__currentLoopData = $main_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="property-section">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <h4><?php echo e($value->title); ?><a href="#">View All</a></h4>
                    </div>
                    <div class="col-12 col-sm-12 property-item owl-carousel">

                        <?php
                            $properties = propertyByMainCategory($value->id, 8, 'limit');
                        ?>

                        <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if (isset($component)) { $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PropertyGrid::class, ['information' => $value]); ?>
<?php $component->withName('property-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12)): ?>
<?php $component = $__componentOriginal777af6d456f322a9595731773b967cc9217a2c12; ?>
<?php unset($__componentOriginal777af6d456f322a9595731773b967cc9217a2c12); ?>
<?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/index.blade.php ENDPATH**/ ?>