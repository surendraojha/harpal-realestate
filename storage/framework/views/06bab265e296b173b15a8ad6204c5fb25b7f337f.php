<?php $__env->startSection('content'); ?>
    <div class="single-property">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-3 property-left">
                    <h4>Location</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.647538353206!2d85.3274571645381!3d27.69728653254205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19a364bb5935%3A0xf40b4cf2c78cf48a!2sAnamnagar%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1574237715794!5m2!1sen!2snp"
                        width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    <hr>
                    <h4>Contact Agent</h4>
                    <form>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Your Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="email" name="email" class="form-control"
                                        placeholder="Email Address">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="number" id="number" class="form-control" placeholder="Mobile Number">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"
                                        placeholder="Description"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-send" href="#">Send</a>
                            </div>
                        </div>
                    </form>
                    <h3>Financial Support</h3>
                    <div class="finance-box">
                        <h4><img src="./images/bank4.webp" alt=""> Global IME Bank</h4>
                        <h5>Total Pric: 1,000,000.00</h5>
                        <p>Down payment: <span>40%</span></p>
                        <p>Interest rate: <span>12%</span></p>
                        <p>Loan year : <span>15 yrs</span></p>
                        <a href="#" class="btn btn-bank">Contact Now</a>
                    </div>
                    <div class="finance-box">
                        <h4><img src="./images/bank4.webp" alt=""> Global IME Bank</h4>
                        <h5>Total Pric: 1,000,000.00</h5>
                        <p>Down payment: <span>40%</span></p>
                        <p>Interest rate: <span>12%</span></p>
                        <p>Loan year : <span>15 yrs</span></p>
                        <a href="#" class="btn btn-bank">Contact Now</a>
                    </div>
                    <div class="finance-box">
                        <h4><img src="./images/bank4.webp" alt=""> Global IME Bank</h4>
                        <h5>Total Pric: 1,000,000.00</h5>
                        <p>Down payment: <span>40%</span></p>
                        <p>Interest rate: <span>12%</span></p>
                        <p>Loan year : <span>15 yrs</span></p>
                        <a href="#" class="btn btn-bank">Contact Now</a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-8 col-lg-9">
                    <div class="property-gallery">
                        <h3><?php echo e($information->title); ?> <span>ID: <?php echo e($information->ad_id); ?></span></h3>
                        <h4>Price: <?php echo e($information->price); ?></h4>
                        <h6><i class="fa fa-map-marker-alt"></i> 103/21 Miles Street Clayfield, QLD 4011 </h6>
                        <a href="#" class="btn btn-share"><i class="fa-sharp fa-solid fa-share-from-square"></i>
                            Share</a>
                        <a href="#" class="btn btn-share"><i class="fa fa-heart"></i> Add Favorite</a>
                        <ul class="room-detail">
                            <li><i class="fa fa-home"></i> 2 bathrooms</li>
                            <li><i class="fa fa-bed"></i> 2 bedrooms</li>
                            <li><i class="fas fa-parking"></i> 1 parking</li>
                        </ul>
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                            </ol>
                            <div class="carousel-inner">

                                <?php
                                    $count = 0;
                                ?>
                                <?php $__currentLoopData = $information->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-item <?php if($count++ == 0): ?> active <?php endif; ?>">
                                        <img src="./images/property1.jpg" class="d-block w-100" alt="...">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <h5>Property Description</h5>
                        <p><?php echo $information->overview; ?></p>
                        <hr>
                        <h5>Propert Information</h5>
                        <ul class="list-info">
                            <li><span>Type:</span><a
                                    href="#"><?php echo e(@$information->subcategory->category->category->title); ?></a></li>
                            <li><span>Parking :</span> 2</li>
                            <li><span>Bedrooms :</span> 4</li>
                            <li><span>Bathrooms :</span> 4</li>
                            <li><span>Plot Size :</span> 20x30x40x50</li>
                            <li><span>Area Size :</span> 200 <span>sq m</span></li>
                            <li><span>Orientation :</span> South</li>
                            <li><span>Living Rooms :</span> 1</li>
                            <li><span>Kitchens :</span> 1</li>
                        </ul>
                        <hr>
                        <h5>Amenities</h5>
                        <ul class="list-detail">
                            <?php $__currentLoopData = $additional_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><i class="fa fa-check"></i> <?php echo e($value->feature->title); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </ul>
                    </div>
                    <!-- <hr>
              <div class="col-12 col-sm-12 bank-listing">
                <h4>Financial Support</h4>
                <div class="bank-item owl-carousel">
                  <div class="bank-box">
                    <a href="#"><img src="./images/bank1.webp" alt=""></a>
                  </div>
                  <div class="bank-box">
                    <a href="#"><img src="./images/bank2.webp" alt=""></a>
                  </div>
                  <div class="bank-box">
                    <a href="#"><img src="./images/bank3.webp" alt=""></a>
                  </div>
                  <div class="bank-box">
                    <a href="#"><img src="./images/bank4.webp" alt=""></a>
                  </div>
                  <div class="bank-box">
                    <a href="#"><img src="./images/bank5.webp" alt=""></a>
                  </div>
                  <div class="bank-box">
                    <a href="#"><img src="./images/bank6.webp" alt=""></a>
                  </div>
                  <div class="bank-box">
                    <a href="#"><img src="./images/bank7.webp" alt=""></a>
                  </div>
                </div>
              </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="propertylist-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12">
                    <h4>Related Property</h4>
                </div>

                <?php $__currentLoopData = $recommended_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-4 col-sm-12">

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

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/property/show.blade.php ENDPATH**/ ?>