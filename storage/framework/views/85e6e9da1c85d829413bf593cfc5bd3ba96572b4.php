<?php $__env->startSection('title','Create Commercial Property'); ?>


<?php $__env->startSection('content'); ?>
    <div class="ContactForm moreDetailSignup">
        <form action="<?php echo e(route('commercial-property.store')); ?>" id="property-form" method="post"
        enctype="multipart/form-data" >
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center mb-3">
                       Choose Your Property
                    </h6>
                </div>

                <?php echo $__env->make('front.commercial-property.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                

                <div class="customForm">
                    <button class="colorBtn ms-0" type="submit"
                    onclick="event.preventDefault();validateCommercialForm();"
                    >
                        SUBMIT FOR APPROVAL <i class="fas fa-arrow-right ps-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <h3 style="font-weight:400; text-transform:uppercase" class="text-center">
                    Video Is being Uploaded.
                </h3>
              <img src="<?php echo e(asset('front/assets/imgs/processing.gif')); ?>" alt="">
              <h4 style="font-weight: 500;" class="text-center">
                Please have a patience It may take 4 to 5 minutes
                <small>
                    Let The page refresh
                </small>
              </h4>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<?php if (isset($component)) { $__componentOriginalbdb6372f108be6646083411c2a59cac372c1e46d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DisableEnterSubmit::class, []); ?>
<?php $component->withName('disable-enter-submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbdb6372f108be6646083411c2a59cac372c1e46d)): ?>
<?php $component = $__componentOriginalbdb6372f108be6646083411c2a59cac372c1e46d; ?>
<?php unset($__componentOriginalbdb6372f108be6646083411c2a59cac372c1e46d); ?>
<?php endif; ?>
<?php if(@$information): ?>
<?php
    $price =  old('price', @$information->price) ;
?>
<?php else: ?>
<?php
    $price = old('price') ;
?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal40d5b110e63f2e5d687218224fdcc48d10cd412b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CommercialPropertyValidation::class, []); ?>
<?php $component->withName('commercial-property-validation'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal40d5b110e63f2e5d687218224fdcc48d10cd412b)): ?>
<?php $component = $__componentOriginal40d5b110e63f2e5d687218224fdcc48d10cd412b; ?>
<?php unset($__componentOriginal40d5b110e63f2e5d687218224fdcc48d10cd412b); ?>
<?php endif; ?>

<?php if (isset($component)) { $__componentOriginal1e284c3ef7ccbeef49c59b41beacaa864da55f8b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PriceAutoComma::class, ['price' => $price]); ?>
<?php $component->withName('price-auto-comma'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal1e284c3ef7ccbeef49c59b41beacaa864da55f8b)): ?>
<?php $component = $__componentOriginal1e284c3ef7ccbeef49c59b41beacaa864da55f8b; ?>
<?php unset($__componentOriginal1e284c3ef7ccbeef49c59b41beacaa864da55f8b); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginaledb213a3f47b5ea0698ec5f396b2ba2634d13928 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\PropertyLoader::class, []); ?>
<?php $component->withName('property-loader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaledb213a3f47b5ea0698ec5f396b2ba2634d13928)): ?>
<?php $component = $__componentOriginaledb213a3f47b5ea0698ec5f396b2ba2634d13928; ?>
<?php unset($__componentOriginaledb213a3f47b5ea0698ec5f396b2ba2634d13928); ?>
<?php endif; ?>
    <script>
        // $('#rentaltype').on('change', function() {

        //     getSubcategory();

        // });



        // function getSubcategory() {
        //     var category_id = $('#rentaltype option:selected').val();

        //     // alert(category_id);
        //     var url = "<?php echo e(url('get-sub-category')); ?>/" + category_id;
        //     $.ajax({
        //         url: url,
        //         success: function(result) {

        //             $('#sub-category').empty();
        //             var data = result.data;

        //             $('#sub-category').append(`<option value='' disabled selected>Select Option</option>`)

        //             jQuery.each(data, function(index, itemData) {
        //                 $('#sub-category').append(
        //                     `<option value='${itemData.id}'>${itemData.title}</option>`)
        //             });
        //         }
        //     });
        // }

        //scripts only for rental home page
        //      new SlimSelect({
        //   select: '.multiple-category'
        // });
        // new SlimSelect({
        //   select: '.locationGlobe'
        // });
        // new SlimSelect({
        //   select: '.customLocation'
        // });
        // new SlimSelect({
        //   select: '.customCategory'
        // });


        $(document).ready(function() {
            // $('.locationGlobe').select2();



            // $('#location_id').select2({

            //     tags: true,
            //     allowClear: true,
            // });






            //     if ($('.locationGlobe').find("option[value='" + data.id + "']").length) {
            //     $('.locationGlobe').val(data.id).trigger('change');
            // } else {
            //     // Create a DOM Option and pre-select by default
            //     var newOption = new Option(data.text, data.id, true, true);
            //     // Append it to the select
            //     $('.locationGlobe').append(newOption).trigger('change');
            // }

            // add photos

        });


        var count = 0;

function addPhotos(){
        $('#add-more-photos').append(`
            <div class='mb-3 d-flex' id="photo-${count}">
            <input type='file' name="photo[]" accept="image/*">

            <button class="btn btn-danger" onclick="event.preventDefault();deletePhoto('photo-'+${count})"><i class='fa fa-trash'></i></button>
            <div>
        `);

            count++;
        }

        function deletePhoto(id) {
            $('#' + id).remove();
        }



    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/commercial-property/create.blade.php ENDPATH**/ ?>