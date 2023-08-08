<script src="<?php echo e(asset('admin/js/libscripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/vendorscripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/c3.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/mainscripts.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('admin/js/index.js')); ?>"></script>
<script src="<?php echo e(asset('admin//bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>










<!-- select 2 -->
<script src="<?php echo e(asset('admin/js/select2.min.js')); ?>"></script>



<script src="<?php echo e(asset('admin/js/check_all.js')); ?>"></script>


<script src="<?php echo e(asset('admin//js/toggle.js')); ?>"></script>

<script src="<?php echo e(asset('admin/js/datepicker.js')); ?>"></script>






<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
<script>

    var route_prefix = "<?php echo e(asset('laravel-filemanager')); ?>";
  $('.ckeditor').ckeditor({
    height: 100,
    filebrowserImageBrowseUrl: route_prefix + '?type=Images',
    // filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token=<?php echo e(csrf_token()); ?>',
    // filebrowserBrowseUrl: route_prefix + '?type=Files',
    filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token=<?php echo e(csrf_token()); ?>'
  });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>








<script type="text/javascript">

    <?php if(Session::has('message')): ?>
    var type = "<?php echo e(Session::get('alert-type', 'info')); ?>";
    switch(type){
        case 'info':
            toastr.info("<?php echo e(Session::get('message')); ?>");
            break;

        case 'warning':
            toastr.warning("<?php echo e(Session::get('message')); ?>");
            break;

        case 'success':
            toastr.success("<?php echo e(Session::get('message')); ?>");
            break;

        case 'error':
            toastr.error("<?php echo e(Session::get('message')); ?>");
            break;
    }
  <?php endif; ?>

  </script>




<script>
    <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            toastr.error("<?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <?php if(Session::has('error')): ?>
        toastr.error("<?php echo e(Session::get('error')); ?>");
    <?php endif; ?>
</script>




<?php echo $__env->yieldContent('script'); ?>
<?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/common/links/js.blade.php ENDPATH**/ ?>