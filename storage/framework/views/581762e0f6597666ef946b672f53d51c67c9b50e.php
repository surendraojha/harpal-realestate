<?php $__env->startSection('content'); ?>
    <div class="propertylist-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 property-box">
                    <form method="post" action="<?php echo e(route('my-property.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <h2><?php echo e($title); ?></h2>

                        <?php echo $__env->make('front-new.property.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function getSubCategory(id, child_category_id) {
            var url = "<?php echo e(route('get.sub-category')); ?>?id=" + id;
            var mainData;
            $.ajax({
                url: url, // Replace with your Laravel route
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $(child_category_id).empty();
                    $(child_category_id).append('<option value="">-- Select Sub-Category --</option>');
                    $.each(data.data, function(key, value) {
                        $(child_category_id).append('<option value="' + value.id + '">' + value
                            .title +
                            '</option>');
                    });
                }
            });



        }


        $('#main_category_id').on('change', function() {
            var id = $('#main_category_id option:selected').val();
            $('#sub_category_id').empty();

            var data = getSubCategory(id, '#sub_category_id');
            // console.log('data',data);
        });



        $('#sub_category_id').on('change', function() {
            var id = $('#sub_category_id option:selected').val();
            $('#child_category_id').empty();
            var data =  getSubCategory(id,'#child_category_id');
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('front-new.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/property/create.blade.php ENDPATH**/ ?>