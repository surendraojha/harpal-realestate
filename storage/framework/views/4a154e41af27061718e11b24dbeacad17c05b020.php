<?php $__env->startSection('content'); ?>
    <div class="search-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 search-left">
                    <ul class="bradcrumb-lists">
                        <li><a href="#">Property</a></li>
                        <li><a href="#">Housing for sale</a></li>
                    </ul>
                    <form class="search-box" action="<?php echo e(url()->current()); ?>" style="max-width:300px">
                        <label>Search In Property</label>
                        <div class="form-group has-search">
                            <span class="fa fa-search form-control-feedback"></span>
                            <input type="text" name="title" value="<?php echo e(request()->title); ?>" class="form-control"
                                placeholder="Search">
                        </div>
                        <div class="publish">
                            <p>
                                <span>Published</span>
                                <label><input type="radio" name="currentemployment" value="yes"> New today ( 120
                                    )</label><br>
                            </p>
                        </div>
                        <div class="search-box" style="max-width:300px">
                            <label>Area of Map</label>
                            <div class="form-group has-search">
                                <span class="fa fa-map-marker-alt form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search by place or address">
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d56516.31625949266!2d85.29111338625525!3d27.70895594444538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb198a307baabf%3A0xb5137c1bf18db1ea!2sKathmandu%2044600!5e0!3m2!1sen!2snp!4v1672895284882!5m2!1sen!2snp"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>

                        <h4>Area</h4>
                        <p>
                            <label><input type="radio" name="currentemployment" value="yes"> Agder ( 121 )</label><br>
                            <label><input type="radio" name="currentemployment" value="no"> Inland ( 120 )</label><br>
                            <label><input type="radio" name="currentemployment" value="no"> Norland ( 122
                                )</label><br>
                            <label><input type="radio" name="currentemployment" value="yes"> Agder ( 121 )</label><br>
                            <label><input type="radio" name="currentemployment" value="no"> Inland ( 120 )</label><br>
                            <label><input type="radio" name="currentemployment" value="no"> Norland ( 122
                                )</label><br>
                            <label><input type="radio" name="currentemployment" value="yes"> Agder ( 121 )</label><br>
                            <label><input type="radio" name="currentemployment" value="no"> Inland ( 120 )</label><br>
                            <label><input type="radio" name="currentemployment" value="no"> Norland ( 122
                                )</label><br>
                        </p>
                        <h4>Purpose</h4>

                        <p>
                            <?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input type="radio" name="purpose_id" value="<?php echo e($value->id); ?>"> For sale ( 2,255
                                    )</label><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </p>

                        <h4>Price quote</h4>
                        <div class="quote-form">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="number" name="min" value="<?php echo e(request()->min); ?>"
                                            class="form-control" placeholder="$00.00">
                                        <label>From</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="md-form">
                                        <input type="number" name="max" value="<?php echo e(request()->max); ?>"
                                            class="form-control" placeholder="$00.00">
                                        <label>To</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h4>Housing types</h4>
                            <p>
                                <?php $__currentLoopData = $value->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label><input type="radio" name="category_id" value="<?php echo e($item->id); ?>">
                                        <?php echo e($item->title); ?> ( 121 )</label><br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <h4>Faiclites</h4>
                        <p>

                            <?php $__currentLoopData = $additional_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label><input type="radio" name="feature" value="<?php echo e($value->id); ?>"> <?php echo e($value->title); ?>

                                    (
                                    121
                                    )</label><br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </p>

                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-9 search-right">
                    <div class="row">

                        <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-sm-12">
                                <div class="room-detail-box">
                                    <?php if(isset($value->featured_photo) && file_exists(public_path('uploads/' . $value->featured_photo))): ?>
                                        <?php
                                            $path = asset('uploads/' . $value->featured_photo);
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $path = asset('no-photo.jpg');
                                        ?>
                                    <?php endif; ?>

                                    <a href="#" class="pro-imgage"><img src="<?php echo e($path); ?>" alt=""></a>



                                    <?php if(isset($value->user->photo) && file_exists(public_path('uploads/' . $value->user->photo))): ?>
                                        <?php
                                            $path = asset('uploads/' . $value->user->photo);
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            $path = asset('front/assets/imgs/user.webp');
                                        ?>
                                    <?php endif; ?>

                                    <a href="#" class="company-logo"><img src="<?php echo e($path); ?>" alt="">


                                        <h5><?php echo e($value->user->name); ?></h5>
                                    </a>
                                    <h2><a href="#"><?php echo e($value->title); ?></a></h2>
                                    <p><?php echo e($value->address); ?></p>
                                    <h6><span><?php echo e($value->roadSize->title); ?></span></h6>
                                    <ul>
                                        <li>Total price: <?php echo e($value->price); ?></li>
                                        <li>Purpose: <?php echo e($value->purpose->title); ?></li>
                                        <li><?php echo e($value->subcategory->title); ?></li>
                                    </ul>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/search.blade.php ENDPATH**/ ?>