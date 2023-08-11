<?php $__env->startSection('content'); ?>
    <div class="propertylist-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 property-box">
                    <form method="post" action="<?php echo e(route('my-property.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <h2>Please list your property here.</h2>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="title" class="">Title</label>

                                    <?php
                                        $field = [
                                            'type' => 'text',
                                            'placeholder' => 'Title',
                                            'class' => 'form-control',
                                            'name' => 'title',
                                            'id' => 'title',
                                            'required' => false,
                                        ];
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field]); ?>
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
                                <label>Main Category</label>
                                <select name="main_category_id" id="main_category_id" class="form-control">
                                    <option value="">-- Type of Property --</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Parent Category</label>
                                <select name="sub_category_id" id="sub_category_id" class="form-control">
                                    <option value="">-- Type of Property --</option>
                                    

                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <label>Category</label>
                                <select name="child_category_id" id="child_category_id" class="form-control">
                                    <option value="">-- Select Option --</option>
                                    

                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label>Purpose</label>
                                <select name="purpose_id" id="purpose_id" class="form-control">
                                    <option value="">-- Select Option --</option>
                                    <?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">
                                <label>Road Size</label>
                                <select name="road_size_id" id="road_size_id" class="form-control" required>
                                    <option value="">-- Select Option --</option>
                                    <?php $__currentLoopData = $road_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                        </div>


                        


                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="location_for_map" class="">Location For Map</label>

                                    <?php
                                        $field = [
                                            'type' => 'text',
                                            'placeholder' => 'latitude,longiture',
                                            'class' => 'form-control',
                                            'name' => 'location_for_map',
                                            'id' => 'location_for_map',
                                            'required' => false,
                                        ];
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field]); ?>
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
                            
                            <div class="col-md-6">
                                <div class="md-form">

                                    <label for="message">Price </label>


                                    <?php
                                        $field = [
                                            'type' => 'number',
                                            'placeholder' => 'Rs 123456.00',
                                            'class' => 'form-control',
                                            'name' => 'price',
                                            'id' => 'price',
                                            'required' => true,
                                        ];
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field]); ?>
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
                            <div class="col-md-6">
                                <div class="md-form">
                                    <?php
                                        $price_negotiable = [
                                            '0' => 'No',
                                            '1' => 'Yes',
                                        ];
                                    ?>

                                    <label for="price_negotiable">Price Negotiable </label>


                                    <select name="price_negotiable" class="form-control" id="price_negotiable">
                                        <?php $__currentLoopData = $price_negotiable; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <label for="name" class="">Property Measurement</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="md-form">

                                    <?php
                                        $field = [
                                            'type' => 'number',
                                            'placeholder' => '200 sq',
                                            'class' => 'form-control',
                                            'name' => 'area_covered',
                                            'id' => 'area_covered',
                                            'required' => true,
                                        ];
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field]); ?>
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







                            <div class="col-md-6">
                                <div class="md-form">
                                    <?php
                                        $field = [
                                            'type' => 'number',
                                            'placeholder' => '200 sq',
                                            'class' => 'form-control',
                                            'name' => 'buld_up_area',
                                            'id' => 'buld_up_area',
                                            'required' => true,
                                        ];
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field]); ?>
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
                                    <label for="featured_photo">Featured Photo</label>

                                    <?php
                                        $field = [
                                            'type' => 'file',
                                            'placeholder' => 'form-control',
                                            'class' => '',
                                            'name' => 'featured_photo',
                                            'id' => 'featured_photo',
                                            'required' => true,
                                        ];
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field]); ?>
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
                                    <label for="contact_number" class="">Mobile</label>

                                    <?php
                                        $field = [
                                            'type' => 'text',
                                            'placeholder' => '98********',
                                            'class' => 'form-control',
                                            'name' => 'contact_number',
                                            'id' => 'contact_number',
                                            'required' => true,
                                        ];
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field]); ?>
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
                                    <label for="subject" class="">Email Id</label>

                                    <?php
                                        $field = [
                                            'type' => 'email',
                                            'placeholder' => 'hello@example.com',
                                            'class' => 'form-control',
                                            'name' => 'email',
                                            'id' => 'email',
                                            'required' => true,
                                        ];
                                    ?>
                                    <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field]); ?>
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
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">

                                <div class="md-form">
                                    <label for="message">Description</label>
                                    <textarea type="text" id="description" name="description" rows="2" class="form-control md-textarea"
                                        placeholder="Property related your message"><?php echo e(old('description')); ?></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 center-on-small-only">

                                <button class="btn btn-primary" type="submit"> send</button>

                            </div>
                        </div>
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