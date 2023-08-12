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
                <option value="<?php echo e($value->id); ?>" <?php echo e(old('purpose_id', @$information->purpose_id)==$value->id?'selected':''); ?>>
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
                <option value="<?php echo e($value->id); ?>" <?php echo e(old('road_size_id', @$information->road_size_id)==$value->id?'selected':''); ?>>
                    <?php echo e($value->title); ?></option>
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
    <div class="col-12 col-sm-12 center-on-small-only">

        <button class="btn btn-primary" type="submit"> send</button>

    </div>
</div>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front-new/property/form.blade.php ENDPATH**/ ?>