<?php if(@$meta): ?>
    <?php $__env->startSection('title', $meta->meta_title); ?>

    <?php $__env->startSection('meta'); ?>
        <?php if (isset($component)) { $__componentOriginal9e7e63767b825622d7dc3bf0b4a081e03d0963d6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MetaHead::class, ['meta' => $meta]); ?>
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

<?php $__env->startSection('title', $setting->company_name); ?>

<?php endif; ?>


<?php $__env->startSection('css'); ?>
    <style>
        @media(min-width:767.9px) {
            .mobileNavi {
                display: none;
            }

            .desktop-visible {
                display: block;
            }

            .mobile-visible {
                display: none;
            }
        }

        @media(max-width:991.9px) {

            .desktopNav,
            .bannerImg::after {
                display: none;
            }

            .mobileNavi {
                display: flex;
            }

            .desktop-visible {
                display: none;
            }

            .mobile-visible {
                display: block;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php if (isset($component)) { $__componentOriginal21561dc8f66ede5123d30c72e10db4b487bd59f6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\MainSearch::class, ['locations' => $locations,'categories' => $categories]); ?>
<?php $component->withName('main-search'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21561dc8f66ede5123d30c72e10db4b487bd59f6)): ?>
<?php $component = $__componentOriginal21561dc8f66ede5123d30c72e10db4b487bd59f6; ?>
<?php unset($__componentOriginal21561dc8f66ede5123d30c72e10db4b487bd59f6); ?>
<?php endif; ?>





    <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $above_featured]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>

    <!-- Newest resendential FDeals -->
    <?php echo $__env->make('front.includes.featured', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Newest deals ends -->
    <!-- Newest resendential FDeals -->
    <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $below_featured]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>

    <?php
    $count = 0;
    ?>
    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($value->property->isEmpty() == false): ?>
            <section class="siteSec">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="siteTitle">
                                <h3>
                                    <?php echo e($value->title); ?>

                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="row-cols-5 row">

                        <?php $__currentLoopData = $value->property->sortByDesc('id')->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $className = 'col-md-25';
                            ?>

                            <?php if (isset($component)) { $__componentOriginala3fc0a5786d46ba74473c15b8df3072d5cca4eb8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FeaturedRecommended::class, ['value' => $v,'className' => $className]); ?>
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


                        <div class="col-12 text-end">
                            <a href="<?php echo e(route('front.category', $value->slug)); ?>"
                                class="siteBtn d-inline-block mt-3 text-end py-2">
                                Show All <i class="flaticon-right-arrow ps-2"></i>
                            </a>
                        </div>


                    </div>
                    <?php if($count == 0): ?>
                        <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $between_home_page_product]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>
                    <?php endif; ?>

                    <?php
                        $count++;
                    ?>
                </div>
            </section>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $below_home_page_product]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>
    <!-- Newest deals ends -->
    <!-- Newest commertail  FDeals -->

    <!-- Newest deals ends -->
    <!-- Featured Products start -->
    <?php echo $__env->make('front.includes.new-deals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $below_new_deals]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>
    <!-- Featured products ends -->
    <!-- Section for recommended products ends -->
    <!-- Section post your thoughts section start -->
    <?php echo $__env->make('front.includes.forum-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $below_forum]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>
    <!-- Post your thoughts section ends -->
    <!-- Section for recommended products -->
    <?php echo $__env->make('front.includes.recommended', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $below_recommended]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>
    <!-- Why choose us -->
    <?php echo $__env->make('front.includes.about-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if (isset($component)) { $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\WideAd::class, ['ads' => $below_about_us]); ?>
<?php $component->withName('wide-ad'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3)): ?>
<?php $component = $__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3; ?>
<?php unset($__componentOriginala5e6247deeb0b0024ea46c84a56ac200d493a2b3); ?>
<?php endif; ?>
    <!-- Why choose us ends -->
    <!-- Customer reviews -->

    <?php echo $__env->make('front.includes.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Customer Reviews Ends -->



    <?php if($partners->isEmpty() == false): ?>
        <!-- Blogs section -->
        <section class="siteSec partnerSec">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12">
                        <div class="siteTitle">
                            <h3>
                            <h3>Our Associates</h3>

                            </h3>
                        </div>
                    </div>
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2 col-6">
                            <a href="<?php echo e($value->link); ?>" target="_blank">

                                <img src="<?php echo e(asset('uploads/' . $value->photo)); ?>" alt="partner" title="Our Associates">
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-12 mt-4">
                        <a href="<?php echo e(route('front.partner')); ?>"
                            class="siteBtn d-inline-block ml-auto float-end py-2 ">View All
                            <i class="flaticon-right-arrow ps-2"></i></i></a>
                    </div>
                </div>
            </div>
        </section>

    <?php endif; ?>
    <!-- Blogs Section ends -->
    <!-- Site Footer start -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginal7cc7ecc2ce09344bd7f6142941fa5056f7d54bdf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SearchPrice::class, []); ?>
<?php $component->withName('search-price'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7cc7ecc2ce09344bd7f6142941fa5056f7d54bdf)): ?>
<?php $component = $__componentOriginal7cc7ecc2ce09344bd7f6142941fa5056f7d54bdf; ?>
<?php unset($__componentOriginal7cc7ecc2ce09344bd7f6142941fa5056f7d54bdf); ?>
<?php endif; ?>
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

        // for wishlist
        function addToWishList(id) {
            var url = "<?php echo e(url('add-to-wishlist')); ?>/" + id;

            $.ajax({
                type: 'GET',
                url: url,

                success: function(data) {
                    // console.log(data);
                    // alert(data);
                    $('#wish-list').html(data.wishlist_count);

                    toastr.success("Property Is Added To WishList Successfully!!");

                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/index.blade.php ENDPATH**/ ?>