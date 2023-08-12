<?php $__env->startSection('content'); ?>
<div class="blog-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 page-title">
          <h1>Blog Details</h1>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-8 detail-left">


            <?php if(isset($information->photo) && file_exists(public_path('blogs/' . $information->photo))): ?>


            <img src="<?php echo e(asset('blogs/' . $information->photo)); ?>" alt="">

            <?php endif; ?>

          <h4><?php echo e($information->title); ?></h4>
          <ul>
            <li>By: <a href="#"><?php echo e($information->writer_name); ?></a></li>
            <li>Comments: 2</li>
          </ul>
           <?php echo $information->description; ?>

        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 category-column">
          <div class="row">
            <div class="col-12 catogory">
              <h4>Categories</h4>
              <ul>
                <li><a href="#">Lorem ipsum amet <span><i class="fa fa-angle-right"></i></span></a></li>
                <li><a href="#">Lorem ipsum amet <span><i class="fa fa-angle-right"></i></span></a></li>
                <li><a href="#">Lorem ipsum amet <span><i class="fa fa-angle-right"></i></span></a></li>
                <li><a href="#">Lorem ipsum amet <span><i class="fa fa-angle-right"></i></span></a></li>
                <li><a href="#">Lorem ipsum amet <span><i class="fa fa-angle-right"></i></span></a></li>
                <li><a href="#">Lorem ipsum amet <span><i class="fa fa-angle-right"></i></span></a></li>
                <li><a href="#">Lorem ipsum amet <span><i class="fa fa-angle-right"></i></span></a></li>
                <li><a href="#">Lorem ipsum amet <span><i class="fa fa-angle-right"></i></span></a></li>
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
                    $path= asset('no-photo.jpg');
                ?>
            <?php endif; ?>
                  <a href="<?php echo e(route('front.blog-detail',$value->slug)); ?>">
                    <img src="<?php echo e($path); ?>" alt="">

                    <h6><?php echo e($value->title); ?></h6></a>
                  <ul>
                    <li><i class="fa fa-user"></i> By: <a href="#"><?php echo e($value->writer_name); ?></a></li>
                    <li><i class="fa fa-calendar"></i> <?php echo e(date('Y-m-d',strtotime($value->created_at))); ?></li>
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

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/blog/blog-detail.blade.php ENDPATH**/ ?>