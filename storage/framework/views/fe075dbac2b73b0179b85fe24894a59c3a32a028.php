<?php $__env->startSection('content'); ?>
<div class="contact-body">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-md-7 col-lg-8 contact-left">
          <h4>Send Us a Message</h4>
          <form action="<?php echo e(route('front.contact-us')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                    <?php
                        $attributes = [
                           'type'=>'text',
                           'name'=>'name',
                           'class'=>'form-control',
                           'placeholder'=>'Your Name',
                           'required'=>true
                        ]
                    ?>

                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $attributes]); ?>
<?php $component->withName('textbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8)): ?>
<?php $component = $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8; ?>
<?php unset($__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8); ?>
<?php endif; ?>

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                    <?php
                    $attributes = [
                       'type'=>'email',
                       'name'=>'email',
                       'class'=>'form-control',
                       'placeholder'=>'Your email',
                       'required'=>true
                    ]
                ?>

                <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $attributes]); ?>
<?php $component->withName('textbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8)): ?>
<?php $component = $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8; ?>
<?php unset($__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8); ?>
<?php endif; ?>

                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                    <?php
                    $attributes = [
                       'type'=>'number',
                       'name'=>'phone',
                       'class'=>'form-control',
                       'placeholder'=>'Phone no',
                       'required'=>true
                    ]
                ?>

                <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $attributes]); ?>
<?php $component->withName('textbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8)): ?>
<?php $component = $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8; ?>
<?php unset($__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8); ?>
<?php endif; ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">

                    <?php
                    $attributes = [
                       'type'=>'text',
                       'name'=>'contact_for',
                       'class'=>'form-control',
                       'placeholder'=>'Subject',
                       'required'=>true
                    ]
                ?>

                <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $attributes]); ?>
<?php $component->withName('textbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8)): ?>
<?php $component = $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8; ?>
<?php unset($__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8); ?>
<?php endif; ?>


                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                  <textarea type="text" name="message" placeholder="Your message"><?php echo e(old('message')); ?></textarea>
                </div>
              </div>
              <div class="col-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Send</button>
                
              </div>
            </div>
          </form>
        </div>
        <div class="col-12 col-sm-12 col-md-5 col-lg-4">
          <h4>Get in Touch</h4>
          <p><i class="fa fa-phone"></i> <?php echo e($setting->phone); ?></p>
          <p><i class="fa fa-envelope"></i> <?php echo e($setting->email); ?></p>
          <p><i class="fa fa-map-marker"></i> <?php echo e($setting->address); ?></p>
          <p><i class="fa fa-globe"></i> <?php echo e(request()->getHttpHost()); ?></p>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/message.blade.php ENDPATH**/ ?>