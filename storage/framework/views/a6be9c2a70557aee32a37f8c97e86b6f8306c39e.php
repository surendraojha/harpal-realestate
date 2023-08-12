<?php $__env->startSection('content'); ?>
    <div class="blog-body">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 page-title">
                    <h1>Blog Listing</h1>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-8">
                    <div class="row blog-left">

                        <?php $__currentLoopData = $informations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($value->photo) && file_exists(public_path('blogs/' . $value->photo))): ?>
                                <?php
                                    $path = asset('blogs/' . $value->photo);
                                ?>
                            <?php else: ?>
                                <?php
                                    $path = asset('no-photo.jpg');
                                ?>
                            <?php endif; ?>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                                <a href="<?php echo e(route('front.blog-detail', $value->slug)); ?>">
                                    <img src="<?php echo e($path); ?>" alt="<?php echo e($value->title); ?>"></a>
                                <div class="blog-box">
                                    <h4><a href="<?php echo e(route('front.blog-detail', $value->slug)); ?>"><?php echo e($value->title); ?></a></h4>
                                    <ul>
                                        <li>By: <a href="#"><?php echo e($value->writer_name); ?></a></li>
                                        <li>Comments: 2</li>
                                    </ul>
                                    <p><?php echo e(Str::substr(strip_tags($value->description), 0, 50)); ?></p>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $informations]); ?>
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
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 category-column">
                    <div class="row">
                        <div class="col-12 catogory">
                            <h4>Categories</h4>
                            <ul>

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('front.blog', ['slug' => $value->slug])); ?>"><?php echo e($value->title); ?>

                                            <span><i class="fa fa-angle-right"></i></span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </ul>
                        </div>
                        <div class="posts">
                            <div class="col-12">
                                <h4>Recent Posts</h4>
                            </div>
                            <?php $__currentLoopData = $recent_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-12 col-sm-12">
                                    <div class="recent-post">

                                        <?php if(isset($value->photo) && file_exists(public_path('blogs/' . $value->photo))): ?>
                                            <?php
                                                $path = asset('blogs/' . $value->photo);
                                            ?>
                                        <?php else: ?>
                                            <?php
                                                $path = asset('no-photo.jpg');
                                            ?>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('front.blog-detail', $value->slug)); ?>">
                                            <img src="<?php echo e($path); ?>" alt="">

                                            <h6><?php echo e($value->title); ?></h6>
                                        </a>
                                        <ul>
                                            <li><i class="fa fa-user"></i> By: <a
                                                    href="#"><?php echo e($value->writer_name); ?></a></li>
                                            <li><i class="fa fa-calendar"></i>
                                                <?php echo e(date('Y-m-d', strtotime($value->created_at))); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/blog/blog-listing.blade.php ENDPATH**/ ?>