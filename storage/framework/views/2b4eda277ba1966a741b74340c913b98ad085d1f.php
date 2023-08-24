<div class="row clearfix">



    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Title</span>
                </div>
                <?php echo Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>




    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Photo</span>
                </div>
                <?php echo Form::file('photo', ['class' => 'form-control']); ?>



            </div>


        </div>

        <?php if(@$information->photo): ?>
            <img height="300px" src="<?php echo e(asset('category/' . @$information->photo)); ?>" alt="">
        <?php endif; ?>

    </div>


    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="form-group">
            <label for="">Custom Fields</label>
            <table class="table table-responsive" id="fieldsTable">
                <thead>
                    <tr>
                        <th>Identifier</th>
                        <th>Label</th>
                        <th>Required</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $array = @$information->custom_fields?json_decode($information->custom_fields):[];
                    ?>

                    <?php $__empty_1 = true; $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>
                        <td><input type="text" class="form-control" value="<?php echo e($value->identifier); ?>" name="identifier[]"></td>
                        <td><input type="text" class="form-control" value="<?php echo e($value->label); ?>" name="label[]"></td>
                        <td>

                            <select name="required[]" class="form-control">
                                <option value="0" <?php if($value->required==0): ?> selected <?php endif; ?>>No</option>
                                <option value="1" <?php if($value->required==1): ?> selected <?php endif; ?>>Yes</option>
                            </select>


                        </td>
                        <td><button class="removeRow">Remove</button></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td><input type="text" class="form-control" name="identifier[]"></td>
                        <td><input type="text" class="form-control" name="label[]"></td>
                        <td>

                            <select name="required[]" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>


                        </td>
                        <td><button class="removeRow">Remove</button></td>
                    </tr>
                    <?php endif; ?>

                </tbody>
            </table>

            <button type="button" id="addRow">Add Row</button>


        </div>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Display Order</span>
                </div>
                <?php echo Form::number('order', null, ['placeholder' => 'Display Order', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>


    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Meta Title</span>
                </div>
                <?php echo Form::text('meta_title', null, ['placeholder' => 'Meta Title', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>

    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> Meta Keyword</span>
                </div>
                <?php echo Form::text('meta_keyword', null, ['placeholder' => 'Meta Keyword', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>



    

    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Meta Description</span>
                </div>
                <?php echo Form::textarea('meta_description', null, ['placeholder' => 'Meta Description', 'class' => 'form-control']); ?>

            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {
            $('#addRow').on('click', function() {
                var newRow = '<tr>' +
                    '<td><input type="text" class="form-control" name="identifier[]"></td>' +
                    '<td><input type="text" class="form-control" name="label[]"></td>' +

                    `<td><select name="required[]" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select></td>`+
                    '<td><button class="removeRow">Remove</button></td>' +
                    '</tr>';
                $('#fieldsTable tbody').append(newRow);
            });

            $('#fieldsTable').on('click', '.removeRow', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/category/form.blade.php ENDPATH**/ ?>