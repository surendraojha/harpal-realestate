<?php if(@$information->meta_title || $information->meta_description || $information->meta_keyword): ?>

    <?php $__env->startSection('title',$information->meta_title); ?>

    <?php $__env->startSection('meta'); ?>


        <?php if (isset($component)) { $__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MetaHead::class, ['meta' => $information]); ?>
<?php $component->withName('meta-head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6)): ?>
<?php $component = $__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6; ?>
<?php unset($__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6); ?>
<?php endif; ?>
    <?php $__env->stopSection(); ?>

<?php else: ?>

    <?php $__env->startSection('title', $information->title); ?>


<?php endif; ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

    <script type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=62551296674385001a2fde47&product=inline-share-buttons"
        async="async"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="singleProduct">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="productGallery">
                                <!-- <a class="productVideo" data-fancybox="photogallery" data-src="https://www.youtube.com/watch?v=05DlTqPxcxI" >
                                            <i class="fas fa-play"></i>
                                        </a> -->
                                <div class="row m-0">

                                    <div class="col-md-6 p-0 col-12">
                                        <div class="largeImg position-relative">


                                            <!--<img src="" /> -->

                                            
                                            <div class="swiper" id="productSlider">
                                                <!-- Additional required wrapper -->
                                                <div class="swiper-wrapper">


                                                    <div class="swiper-slide">
                                                        <a href="" data-src="<?php echo e(asset('uploads/' . $information->featured_photo)); ?>"
                                                            data-fancybox="gallery">
                                                            <img src="<?php echo e(asset('uploads/' . $information->featured_photo)); ?>"
                                                            alt="<?php echo e($information->title); ?>" title="<?php echo e($information->title); ?>">
                                                        </a>
                                                    </div>
                                                    <?php if(@$information->photo): ?>

                                                        <?php
                                                            $count = $information->photo->count();
                                                        ?>
                                                        <?php $__currentLoopData = $information->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <!-- Slides -->
                                                            <div class="swiper-slide">
                                                                <a href="" data-src="<?php echo e(asset('uploads/' . $v->photo)); ?>"
                                                                    data-fancybox="gallery">
                                                                <img src="<?php echo e(asset('uploads/' . $v->photo)); ?>"  alt="<?php echo e($information->title); ?>">
                                                                </a>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <?php
                                                            $count = 1;
                                                        ?>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- If we need pagination -->
                                                <div class="swiper-pagination"></div>

                                                <!-- If we need navigation buttons -->
                                                <div class="swiper-button-prev"></div>
                                                <div class="swiper-button-next"></div>

                                                <!-- If we need scrollbar -->
                                                <div class="swiper-scrollbar"></div>
                                            </div>

                                            <a class="productImageGallery"
                                                data-src="<?php echo e(asset('uploads/' . $information->featured_photo)); ?>"
                                                data-fancybox="gallery">
                                                View Photoes
                                                <i class="fas fa-images"></i>
                                            </a>

                                            <?php if(@$information->photo): ?>

                                                <?php
                                                    $count = $information->photo->count();
                                                ?>
                                                <?php $__currentLoopData = $information->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a data-src="<?php echo e(asset('uploads/' . $v->photo)); ?>"
                                                        data-fancybox="gallery">
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php
                                                    $count = 1;
                                                ?>
                                            <?php endif; ?>

                                        </div>
                                    </div>

                                    <?php if($information->video_code): ?>
                                        <div class="col-md-6 p-0">
                                            <div class="smallPhotoes">
                                                <div class="yt-lazyload" data-id="<?php echo e($information->video_code); ?>"
                                                    data-logo="<?php echo e($count); ?>"></div>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="col-md-6 p-0">
                                            <div class="smallPhotoes">
                                                <div class="yt-lazyload" data-id="<?php echo e($setting->ad_video); ?>"
                                                    data-logo="<?php echo e($count); ?>"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="breadCumb">
                                        <li>
                                            <a href="<?php echo e(route('front.home')); ?>">
                                                Home
                                            </a>
                                        </li>

                                        <li>
                                            <a href="<?php echo e(route('front.location', $information->location->location)); ?>">
                                                <?php echo e($information->location->location); ?>

                                            </a>
                                        </li>

                                        <li>
                                            <?php echo e($information->title); ?> (#<?php echo e($information->ad_id); ?>)
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8">
                                    <div class="singleProperty">
                                        <h1 class="propertyTitle">
                                            <?php echo e($information->title); ?>   <?php if($information->status==2): ?>
                    (Sold Out)

                <?php endif; ?>
                                        </h1>
                                        <div class="priceRange mb-1">
                                            <p class="locationPin" data-bs-toggle="tooltip" data-bs-placement="top"
                                                title=""
                                                data-bs-original-title="Location: <?php echo e($information->location->location); ?>">
                                                <span class="fas fa-map-pin"></span>
                                                <?php echo e($information->location->location); ?>

                                            </p>
                                        </div>
                                        <div class="tagProperty">
                                            <a href="<?php echo e(route('front.category',$information->category->slug)); ?>">
                                                <?php echo e(@$information->category->title); ?>

                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="sharethis-inline-share-buttons"></div>
                                </div>
                                <div class="col-12 mt-3 mb-4">
                                    <div class="row border amenitiesWrapper">


                                        
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                    Purpose
                                                </div>
                                                <div class="amenitiesContent">
                                                    <?php echo e($information->purpose->title); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                    <?php echo e($information->purpose->title); ?> Price
                                                </div>
                                                <div class="amenitiesContent">
                                                    <?php
                                                        $formatted_price = \App\Helpers\NumberHelper::formatnumber($information->price);
                                                    ?>

                                                    Rs. <?php echo e($formatted_price); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <?php if($information->date_of_build): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Build Year
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->date_of_build); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($information->bedroom): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Bedroom
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->bedroom); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>




                                        <?php if($information->bathroom): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Bathroom
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->bathroom); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>


                                        <?php if($information->lift): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Lift
                                                    </div>
                                                    <div class="amenitiesContent">
                                                    <?php if($information->lift): ?>
                                                        Yes

                                                    <?php else: ?>
                                                        No
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($information->pantry): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Pantry
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php if($information->pantry): ?>
                                                        Yes

                                                    <?php else: ?>
                                                        No
                                                    <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>


                                        <?php if($information->floor_id): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Floor
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->floor->title); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($information->parking): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Parking
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->parking); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($information->balcony == 1): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Balcony
                                                    </div>
                                                    <div class="amenitiesContent">

                                                        Yes
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if($information->water): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Running Water
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php if($information->water): ?>
                                                            Yes
                                                        <?php else: ?>
                                                            No
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        
                                        <?php if($information->kitchen): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Kitchen
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->kitchen); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>



                                        


                                       <?php if($information->shitting_room): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Sitting Room
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->shitting_room); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>










                                        <?php if(@$information->subcategory->title): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Category
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e(@$information->subcategory->title); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                    Status
                                                </div>
                                                <div class="amenitiesContent">
                                                    <?php if($information->status == 1): ?>
                                                        Available
                                                    <?php elseif($information->status == 2): ?>
                                                        Sold Out
                                                    <?php else: ?>
                                                        Pending
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>


                                        
                                        
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                   Seller Contact Number
                                                </div>
                                                <div class="amenitiesContent">
                                                    <?php echo e($information->contact_number); ?>

                                                </div>
                                            </div>
                                        </div>

                                        

                                        <?php if($information->faced): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Faced
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->faced); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>


                                        <?php if($information->location_for_map): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Latitude And Longitude
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->location_for_map); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>




                                        

                                        <?php if($information->furnishing): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Furnishing
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->furnishing); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        

                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                    Price Negotiable
                                                </div>
                                                <div class="amenitiesContent">

                                                    <?php if($information->price_negotiable): ?>
                                                        Yes
                                                    <?php else: ?>
                                                        No
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>



                                        <?php if($information->area_covered): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Area Covered
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->area_covered); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>


                                        <?php if($information->buld_up_area): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Build Up Area
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->buld_up_area); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>






                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                    Ad id
                                                </div>
                                                <div class="amenitiesContent">
                                                    #<?php echo e($information->ad_id); ?>

                                                </div>
                                            </div>
                                        </div>




                                        <?php if($information->road_size_id): ?>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="amenities">
                                                    <div class="amenitiesTitle">
                                                        Road Type
                                                    </div>
                                                    <div class="amenitiesContent">
                                                        <?php echo e($information->roadSize->title); ?>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>



                                        


                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                    Ad Views
                                                </div>
                                                <div class="amenitiesContent">
                                                    <?php echo e($information->view); ?>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                    Posted On
                                                </div>
                                                <div class="amenitiesContent">
                                                    <?php echo e(date('Y/m/d', strtotime($information->created_at))); ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-4 col-lg-3">
                                            <div class="amenities">
                                                <div class="amenitiesTitle">
                                                    Expire On
                                                </div>
                                                <div class="amenitiesContent">
                                                    <?php echo e(date('Y/m/d', strtotime($information->expiration_date))); ?>


                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                                <?php if($information->overview): ?>
                                    <div class="col-12">
                                        <div class="productContent overView">
                                            <h5>
                                                Overview
                                            </h5>
                                            <p>
                                                <?php echo $information->overview; ?>

                                            </p>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if($additional_features->isEmpty() == false): ?>
                                    <div class="col-12">
                                        <div class="productContent Info">
                                            <h5>
                                                Local Area Facilities
                                            </h5>
                                            <div class="row">

                                                
                                                <?php $__currentLoopData = $additional_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="col-6 col-md-4 col-lg-3">
                                                        <div class="amenities">
                                                            <div class="amenitiesTitle">
                                                                <?php echo e($value->feature->title); ?>

                                                            </div>

                                                            <?php if($value->feature->value): ?>
                                                                <div class="amenitiesContent">
                                                                    <?php echo e($value->feature->value); ?>

                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>
                                
                                <?php if($faqs->isEmpty() == false): ?>
                                    <div class="col-12">
                                        <div class="productContent">
                                            <h5>
                                                FAQ'S
                                            </h5>
                                            <div class="accordion" id="accordionPanelsStayOpenExample">
                                                <?php
                                                    $count = 0;
                                                ?>
                                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#faq<?php echo e($value->id); ?>"
                                                                aria-expanded="true"
                                                                aria-controls="faq<?php echo e($value->id); ?>">
                                                                <?php echo e($value->question); ?>

                                                            </button>
                                                        </h2>
                                                        <div id="faq<?php echo e($value->id); ?>"
                                                            class="accordion-collapse collapse <?php if($count == 0): ?> show <?php endif; ?>"
                                                            aria-labelledby="panelsStayOpen-headingOne">
                                                            <div class="accordion-body">
                                                                <?php echo e($value->answer); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                        $count++;
                                                    ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>


<div class="agentForm position-relative mt-4 d-block d-md-none">
    <div class="row">
        <div class="col-4">
            <img src="<?php echo e(asset('uploads/' . @$information->user->profile->photo)); ?>"
                alt="<?php echo e(@$information->user->name); ?>">
        </div>
        <div class="col-8" style="overflow: hidden">
            <h6 class="listerName">
                <?php echo e($information->user->name); ?>

                <svg viewBox="0 0 24 24" fill="#f65104" aria-label="Verified account"
                    height="20" width="20"
                    class="r-1cvl2hr r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-f9ja8p r-og9te1 r-bnwqim r-1plcrui r-lrvibr">
                    <g>
                        <path
                            d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                        </path>
                    </g>
                </svg>
            </h6>

            <?php

                $show_number = !($information->user->role  == 'admin' || $information->user->role =='superadmin' || $information->user->role == 'editor');

            ?>

            <?php if($show_number): ?>
                <span>
                    <a href="tel:<?php echo e($information->user->phone); ?>"><?php echo e($information->user->phone); ?></a>
                </span>
                <span>
                    <a
                        href="main-to:<?php echo e($information->user->email); ?>" data-bs-toggle="tooltip"
                         data-bs-placement="left" title="" data-bs-original-title="<?php echo e($information->user->email); ?>"><?php echo e($information->user->email); ?></a>
                </span>
            <?php endif; ?>
            <div class="customForm text-center">
                <a href="<?php echo e(route('view.profile', $information->user->email)); ?>"
                    class="colorBtn d-block px-0 w-100 ms-0 mt-2">
                    View Profile
                </a>
            </div>
        </div>
    </div>
</div>

                                

                                <div class="col-12">
                                    <div class="productContent">
                                        <div class="siteTitle">
                                            <h5>

                                            </h5>
                                        </div>

                                        <div class="forumBox">
                                            <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#property-model">
                                                Buyer's Question Here
                                            </a>
                                        </div>
                                        <?php $__currentLoopData = $forums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <form action="<?php echo e(route('submit.forum')); ?>" method="post">
                                                <input type="hidden" name="parent" value="<?php echo e($value->id); ?>">
                                                <input type="hidden" name="property_id" value="<?php echo e($information->id); ?>">
                                                <?php echo csrf_field(); ?>
                                                <ol class="timeline">
                                                    <li class="timeline-item | extra-space">
                                                        <span class="timeline-item-icon | filled-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                width="24" height="24">
                                                                <path fill="none" d="M0 0h24v24H0z"></path>
                                                                <path fill="currentColor"
                                                                    d="M6.455 19L2 22.5V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H6.455zM7 10v2h2v-2H7zm4 0v2h2v-2h-2zm4 0v2h2v-2h-2z">
                                                                </path>
                                                            </svg>
                                                        </span>

                                                        <div class="timeline-item-wrapper">
                                                            <div class="timeline-item-description">
                                                                <i class="avatar | small">
                                                                    <img
                                                                        src="<?php echo e(asset('uploads/' . @$value->user->profile->photo)); ?>" alt="<?php echo e($value->user->name); ?>">
                                                                </i>
                                                                <span><a href="#"><?php echo e($value->user->name); ?></a> Commented
                                                                    on
                                                                    <time datetime="20-01-2021">
                                                                        <?php echo e(date('M d, Y', strtotime($value->created_at))); ?></time></span>
                                                            </div>

                                                            <div class="comment">
                                                                <h5><?php echo e($value->comment); ?></h5>




                                                                <?php if(auth()->guard()->check()): ?>

                                                                    <?php
                                                                        $like_count = \App\Models\LikeForum::where('support_forum_id', $value->id)->count();
                                                                    ?>
                                                                    <button
                                                                        onclick="event.preventDefault();like('<?php echo e($value->id); ?>')"
                                                                        class="button">👏 <span
                                                                            id="like-<?php echo e($value->id); ?>"><?php echo e($like_count); ?></span></button>


                                                                <?php endif; ?>
                                                                <?php
                                                                    $replies = \App\Models\SupportForum::where('parent', $value->id)->get();
                                                                ?>
                                                                <?php $__currentLoopData = $replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <div class="comment ms-5">
                                                                        <div class="timeline-item-description">
                                                                            <i class="avatar | small">
                                                                                <img
                                                                                    src="<?php echo e(asset('uploads/' . @$v->user->profile->photo)); ?>" alt="<?php echo e($v->user->name); ?>">
                                                                            </i>
                                                                            <span><a href="#"><?php echo e($v->user->name); ?></a>
                                                                                Posted on <time
                                                                                    datetime="<?php echo e(date('M d,Y',strtotime($v->created_at))); ?>"><?php echo e(date('M d,Y',strtotime($v->created_at))); ?></time></span>
                                                                        </div>
                                                                        <h5><?php echo e($v->comment); ?></h5>
                                                                    </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </div>
                                                        </div>
                                                    </li>
                                                    <?php if(auth()->guard()->check()): ?>

                                                        <li class="timeline-item">
                                                            <span class="timeline-item-icon | avatar-icon">
                                                                <i class="avatar">
                                                                    <img
                                                                        src="<?php echo e(asset('uploads/' . @$value->user->profile->photo)); ?>" alt="<?php echo e($value->user->name); ?>">
                                                                </i>
                                                            </span>

                                                            <textarea name="comment" type="text" placeholder="Reply"></textarea>
                                                            <button type="submit" class="siteBtn">
                                                                <i class="flaticon-right-arrow"></i>
                                                            </button>

                                                        </li>

                                                    <?php endif; ?>

                                                </ol>


                                            </form>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                        <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $forums]); ?>
<?php $component->withName('pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966)): ?>
<?php $component = $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966; ?>
<?php unset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966); ?>
<?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="sidebarWidget mt-4">

                                <?php if($information->location_for_map): ?>
                                    <iframe
                                        src="https://maps.google.com/maps?q=<?php echo e($information->location_for_map); ?>&hl=es;z=14&amp;output=embed"></iframe>
                                <?php else: ?>
                                    <iframe width="100%" height="200" style="border:0;" allowfullscreen
                                        src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=
                                               <?php echo e(str_replace(',', '', str_replace(' ', '+', @$information->location->location))); ?>&z=14&output=embed">
                                    </iframe>
                                <?php endif; ?>
                                <!-- <div class="agentForm mt-4">
                                            <h5>
                                                Contact This Property
                                            </h5>
                                            <div class="customForm text-end">
                                                <button class="colorBtn d-block"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Request Tour
                                                </button>
                                                <button class="siteBtn d-block px-4 py-1"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Send Message
                                                </button>
                                            </div>

                                        </div> -->
                                <div class="agentForm position-relative mt-4 d-none d-md-block">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="<?php echo e(asset('uploads/' . @$information->user->profile->photo)); ?>"
                                                alt="<?php echo e(@$information->user->name); ?>">
                                        </div>
                                        <div class="col-8" style="overflow: hidden">
                                            <h6 class="listerName">
                                                <?php echo e($information->user->name); ?>

                                                <svg viewBox="0 0 24 24" fill="#f65104" aria-label="Verified account"
                                                    height="20" width="20"
                                                    class="r-1cvl2hr r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-f9ja8p r-og9te1 r-bnwqim r-1plcrui r-lrvibr">
                                                    <g>
                                                        <path
                                                            d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </h6>
                                                    <?php if($show_number): ?>

                                            <span>
                                                <a href="tel:9860560446"><?php echo e($information->user->phone); ?></a>
                                            </span>
                                            <span>
                                                <a
                                                    href="main-to:<?php echo e($information->user->email); ?>" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="<?php echo e($information->user->email); ?>"><?php echo e($information->user->email); ?></a>
                                            </span>
                                            <?php endif; ?>
                                            <div class="customForm text-center">
                                                <a href="<?php echo e(route('view.profile', $information->user->email)); ?>"
                                                    class="colorBtn d-block px-0 w-100 ms-0 mt-2">
                                                    View Profile
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <?php if (isset($component)) { $__componentOriginalba8595abb3c291c4b1e2318b513ad873d0dfaaea = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarAd::class, ['advertisement' => $advertisement]); ?>
<?php $component->withName('sidebar-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba8595abb3c291c4b1e2318b513ad873d0dfaaea)): ?>
<?php $component = $__componentOriginalba8595abb3c291c4b1e2318b513ad873d0dfaaea; ?>
<?php unset($__componentOriginalba8595abb3c291c4b1e2318b513ad873d0dfaaea); ?>
<?php endif; ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    

    <div class="modal fade" id="property-model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Your Own Forum</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route('submit.forum')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="customForm">
                            <textarea placeholder="Your Message" name="comment" id="" cols="30" rows="10"><?php echo e(old('comment')); ?></textarea>
                        </div>

                        <input type="hidden" name="property_id" value="<?php echo e($information->id); ?>">

                        <div class="customForm text-end">
                            <button class="colorBtn" type="submit">
                                Post Your Question <i class="flaticon-right-arrow ps-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    

    <section class="siteSec">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="siteTitle">
                        <h3>
                            Similar Properties
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row-cols-5 row">

                <?php $__currentLoopData = $recommended_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $className = 'col-md-25';
                    ?>

                    <?php if (isset($component)) { $__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FeaturedRecommended::class, ['value' => $value,'className' => $className]); ?>
<?php $component->withName('featured-recommended'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8)): ?>
<?php $component = $__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8; ?>
<?php unset($__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <script>
        function like(id) {
            // alert(id);

            var url = "<?php echo e(url('like-support-forum')); ?>/" + id;

            $.ajax({
                type: 'GET',
                url: url,

                success: function(data) {
                    // console.log(data);
                    // alert(data);
                    $('#like-' + id).html(data.like);

                }
            });
        }
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            loop: true,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });

        // Customize Fancybox
        // Fancybox.bind('[data-fancybox="gallery"]', {
        //   Carousel: {
        //     on: {
        //       change: (that) => {
        //         mainCarousel.slideTo(mainCarousel.findPageForSlide(that.page), {
        //           friction: 0,
        //           html: "5",
        //         });
        //       },
        //     },
        //   },
        // });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/property/show.blade.php ENDPATH**/ ?>