<!doctype html>
<html lang="en">
<head>


<title> <?php echo e(@$setting->company_name); ?> | <?php echo $__env->yieldContent('title'); ?></title>



<?php echo $__env->make('common.links.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">




<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L58E7B5W8C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L58E7B5W8C');
</script>
</head>




<body class="theme-cyan font-montserrat light_version">

<?php echo $__env->make('admin.layouts.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Theme Setting -->
<!--  -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<div id="wrapper">
    <nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="<?php echo e(route('dashboard')); ?>">

                    <img src="<?php echo e(asset('public/uploads/'.@$setting->favicon)); ?>"
                     alt="Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <!--  -->
            </div>

            <div class="navbar-right">

                <div id="navbar-menu">

                    <ul class="nav navbar-nav">
                        <?php echo $__env->make('admin.layouts.user_info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                        <li><a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="icon-menu"><i class="icon-power"></i></a></li>
                        <form id="frm-logout" action="<?php echo e(route('custom.logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </ul>
                </div>



            </div>
        </div>
    </nav>

    <div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="<?php echo e(route('dashboard')); ?>"><img src="<?php echo e(asset('uploads/'.@$setting->company_logo)); ?>" alt="Logo" class="img-fluid logo">
            <span> <?php echo e(@$setting->company_name); ?></span></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <!-- welcome , username section -->
             <!--if user is superadmin then provide him all navlinks  -->

                <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        </div>
    </div>


     <?php echo $__env->yieldContent('content'); ?>
</div>
<!-- Javascript -->

<?php echo $__env->make('common.links.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    $('.select2').select2({

        // tags: true,
        allowClear: true,
    });
</script>





<?php if (isset($component)) { $__componentOriginalddf1e13e14925d82acc577f4fe93933900cb229d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UnselectVideoScript::class, []); ?>
<?php $component->withName('unselect-video-script'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalddf1e13e14925d82acc577f4fe93933900cb229d)): ?>
<?php $component = $__componentOriginalddf1e13e14925d82acc577f4fe93933900cb229d; ?>
<?php unset($__componentOriginalddf1e13e14925d82acc577f4fe93933900cb229d); ?>
<?php endif; ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\kotha-bhada\resources\views/admin/layouts/main.blade.php ENDPATH**/ ?>