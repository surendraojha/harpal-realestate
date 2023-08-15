<?php $__env->startSection('title'); ?>
Edit <?php echo e($module); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="main-content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit <?php echo e($module); ?>

                    </h2>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#addUser">Edit
                                <?php echo e($information->title); ?>

                            </a></li>
                    </ul>
                    <div class="tab-content mt-0">

                        <div class="tab-pane active show" id="addUser">
                            <div class="body mt-2">
                                <?php echo Form::model($information,['route' => ['admin-residental-property.update',$information->id],
                                'method' => 'post','files'=>true,"id"=>"property-form"]); ?>


                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <?php echo $__env->make('admin.residental-property.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary"

                                    onclick="event.preventDefault();validateResidentalForm();"

                                    >Update</button>
                                    <a class="btn btn-secondary" href="<?php echo e(route('admin-residental-property.index')); ?>">
                                        Close
                                    </a>
                                </div>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php if (isset($component)) { $__componentOriginalf8481a2efebc9135001debd6a08f5f6023f610a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ValidateResidentalProperty::class, []); ?>
<?php $component->withName('validate-residental-property'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf8481a2efebc9135001debd6a08f5f6023f610a5)): ?>
<?php $component = $__componentOriginalf8481a2efebc9135001debd6a08f5f6023f610a5; ?>
<?php unset($__componentOriginalf8481a2efebc9135001debd6a08f5f6023f610a5); ?>
<?php endif; ?>

    <script>
        $('#category_id').on('change', function() {

            getSubcategory();

        });



        function getSubcategory() {
            var category_id = $('#category_id option:selected').val();

            // alert(category_id);
            var url = "<?php echo e(url('get-sub-category')); ?>/" + category_id;
            $.ajax({
                url: url,
                success: function(result) {

                    $('#sub_category_id').empty();
                    var data = result.data;

                    $('#sub_category_id').append(`<option value='' disabled selected>Select Option</option>`)

                    jQuery.each(data, function(index, itemData) {
                        $('#sub_category_id').append(
                            `<option value='${itemData.id}'>${itemData.title}</option>`)
                    });
                }
            });
        }


    // add photos
    var count = 0;

function addPhotos(){
    $('#add-more-photos').append(`
        <div class='mb-3' id="photo-${count}">
        <input type='file' name="photo[]" accept="image/*">

        <button class="btn btn-danger" onclick="event.preventDefault();deletePhoto('photo-'+${count})"><i class='fa fa-trash'></i></button>
        <div>
    `);

    count++;
}

function deletePhoto(id){
    $('#'+id).remove();
}

// delete photo from server

function deletePhotoServer(id,div_id){

if(confirm('Are you sure you want to delete this photo?')){
var url = "<?php echo e(url('delete-photo')); ?>/" + id +'/'+div_id;
$.ajax({
    url: url,
    success: function(result) {

        // $('#sub-category').empty();
        var data = result.div_id;



        // alert(data);

        if(data){
            $('#'+data).remove();
        }
        // $('#sub-category').append(`<option value='' disabled selected>Select Option</option>`)

        // jQuery.each(data, function(index, itemData) {
        //     $('#sub-category').append(
        //         `<option value='${itemData.id}'>${itemData.title}</option>`)
        // });
    }
});
}

}
function deleteVideo(id){


    if(confirm('Are you sure , you want to delete this video?')){


    var url = "<?php echo e(url('iv-admin/delete-video/')); ?>/"+id;

    $.ajax({
                url: url,
                success: function(result) {

                    var data = result.status;

                    if(data){
                        $('#video-div').remove();
                    }

                }
            });
        }
}

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/residental-property/edit.blade.php ENDPATH**/ ?>