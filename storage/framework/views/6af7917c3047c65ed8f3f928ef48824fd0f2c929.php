<section class="siteSec aboutUsSec">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="siteTitle">
                    <h1>
                        <?php echo e(@$about_us->title); ?>

                    </h1>
                </div>
                <?php echo @$about_us->short_description; ?>

                <a href="<?php echo e(route('front.about-us')); ?>" class="siteBtn d-inline-block mt-3 text-end">
                    View More <i class="flaticon-right-arrow ps-2"></i>
                </a>
            </div>
            <div class="col-md-4">
                <img src="<?php echo e(asset('uploads/'.@$about_us->photo)); ?>" alt="<?php echo e($about_us->title); ?>">
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/includes/about-us.blade.php ENDPATH**/ ?>