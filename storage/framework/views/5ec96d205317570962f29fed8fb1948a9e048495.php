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
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field,'d' => @$information]); ?>
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
                <option value="<?php echo e($value->id); ?>"
                    <?php echo e(old('main_category_id', @$information->subcategory->category->parent) == $value->id ? 'selected' : ''); ?>>
                    <?php echo e($value->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>
    </div>
</div>

<?php
    // dd(@$information->subcategory->category->parent);
    // try{
    $sub_categories = \App\Models\Category::where('parent', @$information->subcategory->category->parent)->get();
    // dd($sub_categories);
    // }catch(\Exception $e){
    //     dd($e);
    // }
?>
<div class="row">
    <div class="col-md-12">
        <label>Parent Category</label>
        <select name="sub_category_id" id="sub_category_id" class="form-control">
            <option value="">-- Type of Property --</option>

            <?php if(@$information): ?>
                <?php $__currentLoopData = $sub_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>"
                        <?php echo e(old('sub_category_id', $information->subcategory->category->id) == $value->id ? 'selected' : ''); ?>>
                        <?php echo e($value->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

        </select>
    </div>
</div>


<?php
    // dd('hii');
    $child_categories = \App\Models\Category::where('parent', @$information->subcategory->parent)->get();

?>
<div class="row">
    <div class="col-md-12">
        <label>Category</label>
        <select name="child_category_id" id="child_category_id" class="form-control">
            <option value="">-- Select Option --</option>
            <?php if(@$information): ?>

                <?php $__currentLoopData = $child_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>"
                        <?php echo e(old('child_category_id', $information->sub_category_id) == $value->id ? 'selected' : ''); ?>>
                        <?php echo e($value->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

        </select>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <label>Purpose</label>
        <select name="purpose_id" id="purpose_id" class="form-control">
            <option value="">-- Select Option --</option>
            <?php $__currentLoopData = $purposes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($value->id); ?>"
                    <?php echo e(old('purpose_id', @$information->purpose_id) == $value->id ? 'selected' : ''); ?>>
                    <?php echo e($value->title); ?></option>
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
                <option value="<?php echo e($value->id); ?>"
                    <?php echo e(old('road_size_id', @$information->road_size_id) == $value->id ? 'selected' : ''); ?>>
                    <?php echo e($value->title); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </select>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="md-form">
            <label for="message">Address</label>
        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">

            <label for="">Province</label>

            <select name="province_id" class="form-control" id="province_id">
                <option value="" selected>Select Option</option>
                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($value->id); ?>"
                        <?php echo e(old('province_id', @$information->province_id) == $value->id ? 'selected' : ''); ?>>
                        <?php echo e($value->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">
            <label for="">District</label>



            <select name="district_id" class="form-control" id="district_id">
                <option value="" selected>Select Option</option>


                <?php if(old('province_id', @$information->province_id)): ?>

                    <?php
                        $province_id = old('province_id', @$information->province_id);

                        $districts = \App\Models\District::where('province_id', $province_id)->get();
                    ?>



                    <?php $__currentLoopData = $districts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"
                            <?php echo e(old('district_id', @$information->district_id) == $value->id ? 'selected' : ''); ?>>
                            <?php echo e($value->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                <?php endif; ?>

            </select>


        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">
            <label for="">Gau/Nagarpalika</label>

            <select name="municipality_id" class="form-control" id="municipality_id">
                <option value="" selected>Select Option</option>

                <?php if(old('province_id', @$information->province_id)): ?>

                    <?php
                        $district_id = old('district_id', @$information->district_id);

                        $municipalities = \App\Models\Municipality::where('district_id', $district_id)->get();
                    ?>
                    <?php $__currentLoopData = $municipalities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"
                            <?php echo e(old('municipality_id', @$information->municipality_id) == $value->id ? 'selected' : ''); ?>>
                            <?php echo e($value->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
            </select>

        </div>
    </div>
    <div class="col-md-6">
        <div class="md-form">
            <label for="">Woda</label>

            <select name="woda_id" class="form-control" id="woda_id">
                <option value="" selected>Select Option</option>

                <?php if(old('municipality_id', @$information->municipality_id)): ?>

                    <?php
                        $municipality_id = old('municipality_id', @$information->municipality_id);

                        $wodas = \App\Models\Woda::where('municipality_id', $municipality_id)
                            ->orderBy('number')
                            ->get();
                    ?>

                    <?php $__currentLoopData = $wodas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->id); ?>"
                            <?php echo e(old('woda_id', @$information->woda_id) == $value->id ? 'selected' : ''); ?>>
                            <?php echo e($value->number); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>
            </select>
        </div>
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

                // dd(@$information->$field['name'],$information);

            ?>

            <?php if (isset($component)) { $__componentOriginal10c1e54ebc4fb55496c515cfbe3597be44a2f9b8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field,'d' => @$information]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field,'d' => @$information]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field,'d' => @$information]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field,'d' => @$information]); ?>
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



            <input type="file" class="form-control" name="featured_photo">



            <?php if(@$information->featured_photo): ?>
                <img width="300px" src="<?php echo e(asset('uploads/' . $information->featured_photo)); ?>" alt="">
            <?php endif; ?>

            <?php if(@$information): ?>
                <?php $__currentLoopData = $information->photo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <img width="300px" src="<?php echo e(asset('uploads/' . $value->photo)); ?>" alt="">

                    <a class="btn btn-danger" href="<?php echo e(route('remove.property.photo', $value->id)); ?>"
                        onclick="return confirm('Are you sure, you want to remove this photo?');"><i
                            class='fa fa-trash'></i></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endif; ?>

            <div id="add-more-photos"></div>

            <a href="#" class="d-block mb-4" onclick="event.preventDefault();addPhotos()" class="a">Add
                More Photos +</a>

        </div>
    </div>
</div>


<div class="row" id="custom-fields">

    <?php if(@$information): ?>


        <div class="col-md-12">
            <div class="md-form">
                <?php
                    $custom_fields = $information->custom_fields ? json_decode($information->custom_fields) : [];
                ?>


                <?php $__currentLoopData = $custom_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $customField): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php

                            $label = $customField->label;
                            $value = $customField->value;
                            $identifier = $customField->identifier;
                        ?>
                        <input type="hidden" name="custom_field_identifier[]" value="<?php echo e($identifier); ?>">

                        <input type="hidden" name="custom_field_label[]" value="<?php echo e($label); ?>">

                        <label for="<?php echo e($label); ?>"><?php echo e($label); ?></label>
                        <input type="text" name="custom_field_value[]" value="<?php echo e($value); ?>">
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>
        </div>

    <?php endif; ?>

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
<?php $component = $__env->getContainer()->make(App\View\Components\Textbox::class, ['information' => $field,'d' => @$information]); ?>
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
            <label for="message">Overview</label>
            <textarea id="overview" name="overview" rows="2" class="form-control md-textarea"><?php echo e(old('overview', @$information->overview)); ?></textarea>
        </div>
    </div>


    <div class="col-md-12">
        <label for="message">Amenities/Local Area Facilities</label>
        <?php
            $selected_features = [];

            if (@$information) {
                $selected_features = \App\Models\PropertyFeature::where('property_id', $information->id)
                    ->pluck('feature_id', 'feature_id')
                    ->toArray();

                // dd($selected_features);
            }
        ?>

        <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="md-form">
                <input type="checkbox" id="feature<?php echo e($value->id); ?>" name="feature_id[]"
                    value="<?php echo e($value->id); ?>" <?php echo e(in_array($value->id, $selected_features) ? 'checked' : ''); ?>>
                <label for="feature<?php echo e($value->id); ?>"><?php echo e($value->title); ?></label>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


    <?php if(in_array(auth()->user()->role, ['admin', 'superadmin'])): ?>
        <div class="row">
            <div class="col-md-12">
                <div class="md-form">
                    <label for="contact_number" class="">Status</label>
                    <?php
                        $status = [
                            '0' => 'Pending',
                            '1' => 'Active',
                        ];
                    ?>

                    <select name="status" class="form-control" required>
                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($key); ?>"
                                <?php echo e(old('status', @$information->status) == $key ? 'selected' : ''); ?>>
                                <?php echo e($value); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>


                </div>
            </div>
        </div>

    <?php endif; ?>



    <div class="col-12 col-sm-12 center-on-small-only">

        <button class="btn btn-primary" type="submit"> send</button>

    </div>
</div>


<?php $__env->startPush('script'); ?>
    
    <script>
        var count = 0;

        function addPhotos() {
            $('#add-more-photos').append(`
        <div class='mb-3' id="photo-${count}">
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


    


    <script>
        $('#main_category_id').on('change', function() {
            var category_id = $('#main_category_id option:selected').val();

            var route = "<?php echo e(route('get.custom.fields')); ?>?id=" + category_id;
            $.ajax({
                url: route, // Replace with your Laravel route
                type: 'GET',
                // dataType: 'json',
                success: function(data) {
                    // $('#main_category_id').append('<option value="">-- Select Option --</option>');

                    $('#custom-fields').html(data);
                    // $.each(data, function(key, value) {
                    //     $('#district_id').append('<option value="' + value.id + '">' + value
                    //         .title +
                    //         '</option>');
                    // });
                }
            });


        });
    </script>





    
    <script>
        $('#province_id').on('change', function() {

            $('#district_id').empty();
            $('#municipality_id').empty();
            $('#woda_id').empty();


            var province_id = $('#province_id option:selected').val();

            var url = "<?php echo e(route('get.district')); ?>?id=" + province_id;

            $.ajax({
                url: url, // Replace with your Laravel route
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#district_id').append('<option value="">-- Select Option --</option>');
                    $.each(data, function(key, value) {
                        $('#district_id').append('<option value="' + value.id + '">' + value
                            .title +
                            '</option>');
                    });
                }
            });
        });

        // district

        $('#district_id').on('change', function() {

            $('#municipality_id').empty();
            $('#woda_id').empty();

            var district_id = $('#district_id option:selected').val();

            var url = "<?php echo e(route('get.municipality')); ?>?id=" + district_id;

            $.ajax({
                url: url, // Replace with your Laravel route
                type: 'GET',
                dataType: 'json',
                success: function(data) {


                    $('#municipality_id').append('<option value="">-- Select Option --</option>');
                    $.each(data, function(key, value) {
                        $('#municipality_id').append('<option value="' + value.id + '">' + value
                            .title +
                            '</option>');
                    });
                }
            });
        });

        // municipality


        $('#municipality_id').on('change', function() {

            $('#woda_id').empty();
            var district_id = $('#municipality_id option:selected').val();
            var url = "<?php echo e(route('get.woda')); ?>?id=" + district_id;
            $.ajax({
                url: url, // Replace with your Laravel route
                type: 'GET',
                dataType: 'json',
                success: function(data) {


                    $('#woda_id').append('<option value="">-- Select Option --</option>');
                    $.each(data, function(key, value) {
                        $('#woda_id').append('<option value="' + value.id + '">' + value
                            .number +
                            '</option>');
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/property/form.blade.php ENDPATH**/ ?>