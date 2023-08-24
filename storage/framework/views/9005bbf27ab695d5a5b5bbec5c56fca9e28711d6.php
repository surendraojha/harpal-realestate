<div class="row clearfix">




    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Title</span>
                </div>
                <?php echo Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>



    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Rental Type</span>


                    <?php echo Form::select('category_id', $categories, null, ['class' => 'form-control', 'id' => 'category_id']); ?>



                </div>
            </div>
        </div>
    </div>



    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Room Type</span>

                    <?php
                        $category_id = old('category_id', @$information->category_id);

                        if ($category_id) {
                            $sub_categories = \App\Models\Category::where('parent', $category_id)->pluck('title', 'id');
                        } else {
                            $sub_categories = [];
                        }
                    ?>
                    <?php echo Form::select('sub_category_id', $sub_categories, null, ['placeholder' => 'Room Type', 'class' => 'form-control', 'id' => 'sub_category_id']); ?>



                </div>
            </div>
        </div>

    </div>



    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Purpose</span>
                </div>
                <?php echo Form::select('purpose_id', $purposes, null, ['placeholder' => 'Purpose', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>


    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Date Of Build</span>
                </div>

                <select name="date_of_build" id="" class="form-control">
                    <option value="" selected disabled>Select Option</option>

                    <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value); ?>"
                            <?php echo e(old('date_of_build', @$information->date_of_build) == $value ? 'selected' : ''); ?>>
                            <?php echo e($value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </div>

    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">No. Of Bed Rooms</span>
                </div>
                <?php echo Form::text('bedroom', null, ['placeholder' => 'No. Of Bed Rooms', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>



    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">No. Of Bath Rooms</span>
                </div>
                <?php echo Form::text('bathroom', null, ['placeholder' => 'No. Of Bed Rooms', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>

    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">No. Of Kitchen</span>
                </div>

                <?php
                $kitchen = [
                    '' => 'Select Kitchen',
                    '1' => 'Yes',
                    '0' => 'No'
                ];
            ?>
                <?php echo Form::select('kitchen', $kitchen, null, ['class' => 'form-control']); ?>



            </div>
        </div>
    </div>

    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Furnishing</span>
                </div>

                <?php
                    $furnishing = [
                        '' => 'Select Option',
                        'Yes' => 'Yes',
                        'No' => 'No',
                        'Semi Furnished' => 'Semi Furnished',
                    ];
                ?>
                <?php echo Form::select('furnishing', $furnishing, null, ['class' => 'form-control']); ?>



            </div>
        </div>
    </div>


    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Faced</span>
                </div>

                <?php
                    $faced = [
                        '' => 'Select Option',
                        'East' => 'East',
                        'West' => 'West',
                        'North' => 'North',
                        'South' => 'South',
                    ];
                ?>
                <?php echo Form::select('faced', $faced, null, ['class' => 'form-control']); ?>



            </div>
        </div>
    </div>



    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Area Covered</span>
                </div>


                <?php echo Form::text('area_covered', null, ['placeholder' => 'Eg. 45 Ropani', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>


    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Build Up Area</span>
                </div>


                <?php echo Form::text('buld_up_area', null, ['placeholder' => 'Eg. 1474.29 Sq. Feet', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>




    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Contact Number</span>
                </div>


                <?php echo Form::text('contact_number', null, ['placeholder' => 'Eg. 98XXXXXXXX', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>

    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Parking</span>
                </div>
                <?php echo Form::text('parking', null, ['placeholder' => 'Parking Facility', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>


    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Balcony</span>
                </div>
                <?php echo Form::select('balcony', ['1' => 'Yes', '0' => 'No'], null, ['placeholder' => 'Select Option', 'class' => 'form-control']); ?>


            </div>
        </div>
    </div>



    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Water</span>
                </div>
                <?php echo Form::text('water', null, ['placeholder' => 'Water Facility', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>


    
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location for map (optional)</span>
                </div>
                <?php echo Form::text('location_for_map', null, ['placeholder' => 'Lalitude and longitude', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>

    
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Overview</span>
                </div>
                <?php echo Form::textarea('overview', null, ['placeholder' => 'Details', 'class' => 'form-control ckeditor']); ?>

            </div>
        </div>
    </div>




    
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Featured Photo</span>
                </div>
                <?php echo Form::file('featured_photo', ['class' => 'form-control', 'accept' => 'image/*']); ?>


                <button type="button" class="btn btn-success" onclick="addPhotos();">Add More Photos</button>

            </div>

            <div id="add-more-photos">
                <?php if(@$information): ?>
                    <?php echo $__env->make('admin.property.edit-photos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php endif; ?>
            </div>
        </div>

        <?php if(@$information->featured_photo): ?>
            <img height="300px" style="object-fit: cover; width:300px" class="mb-3"
                src="<?php echo e(asset('uploads/' . @$information->featured_photo)); ?>" alt="">
        <?php endif; ?>

    </div>





    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Price</span>
                </div>
                <?php echo Form::text('price', @$information->price, ['placeholder' => 'Price in Rs.', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>

    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Price Negotiable</span>
                </div>

                <?php
                    $negotiation = [
                        '0' => 'No',
                        '1' => 'Yes',
                    ];
                ?>
                <?php echo Form::select('price_negotiable', $negotiation, null, ['class' => 'form-control']); ?>

            </div>
        </div>
    </div>


    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Floor</span>
                </div>
                <?php echo Form::select('floor_id', $floors, null, ['placeholder' => 'Select Floor', 'class' => 'form-control']); ?>


            </div>
        </div>
    </div>
    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Road Size</span>
                </div>
                <?php echo Form::select('road_size_id', $road_sizes, null, ['placeholder' => 'Select Road Size', 'class' => 'form-control']); ?>


            </div>
        </div>
    </div>

    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Location</span>
                </div>
                <?php echo Form::select('location_id', $locations, null, ['placeholder' => 'Select Location', 'class' => 'form-control']); ?>


            </div>
        </div>
    </div>





    
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Status</span>
                </div>
                <?php
                    $status = [
                        '1' => 'Active',
                        '0' => 'Pending',
                        '2' => 'Fulfilled /Expired',
                    ];
                ?>
                <?php echo Form::select('status', $status, null, ['placeholder' => 'Select option', 'class' => 'form-control']); ?>


            </div>
        </div>
    </div>


    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Views</span>
                </div>
                <?php echo Form::number('view', null, ['placeholder' => 'Default Views', 'class' => 'form-control']); ?>



            </div>
        </div>
    </div>


    
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h3>Additional Features</h3>
        <?php $__currentLoopData = $additional_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="form-group">
                <div class="input-group">
                    <input class="form-control" type="checkbox" name="feature_id[]" value="<?php echo e($value->id); ?>"
                        <?php if(in_array($value->id, $checked_features)): ?> checked <?php endif; ?>> <?php echo e($value->title); ?>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>


    
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Featured Video Link</span>
                </div>
                <?php echo Form::text('featured_video', null, ['placeholder' => 'Youtube link of your video', 'class' => 'form-control']); ?>

            </div>
        </div>


        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Featured Video</span>
                </div>
                <?php echo Form::file('video', ['accept' => 'video/*', 'class' => 'form-control']); ?>

            </div>
        </div>


        <?php if(@$information->video): ?>
            <div id="video-div">

                <video width="320" height="240" controls>
                    <source src="<?php echo e(asset('uploads/' . @$information->video)); ?>" type="video/mp4">
                    <source src="<?php echo e(asset('uploads/' . @$information->video)); ?>" type="video/ogg">
                    Your browser does not support the video tag.
                </video>


                <button type="button" onclick="deleteVideo('<?php echo e($information->id); ?>');" class="btn btn-danger"><i
                        class="fa fa-trash"></i></button>
        <?php endif; ?>
    </div>
</div>

</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/property/form.blade.php ENDPATH**/ ?>