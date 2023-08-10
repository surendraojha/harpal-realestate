<div class="col-12 mb-3">
    <div class="d-inline-flex mb-4 border-bottom ">
        <div>
            <h6 class="mb-0 formsmall-title">
              Your Review
            </h6>
            
        </div>
    </div>
</div>
<div class="col-12">
    <div class="singleformbox">
        <div class="row">


            <div class="row clearfix">



                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating customForm">
                        <?php echo Form::file('photo', ['class' => 'form-control mb-3']); ?>

                        <label for="dob">
                            Photo
                        </label>

                    </div>
                    <div class="form-group">

                        <?php if(@$information->photo): ?>
                            <img height="250px" src="<?php echo e(asset('uploads/' . @$information->photo)); ?>" alt="">
                        <?php endif; ?>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating customForm">
                        <?php if(!@$information->name): ?>
                                <?php
                                    $name = $user->name;
                                ?>
                            <?php else: ?>
                                <?php
                                    $name = old('name',@$information->name)
                                ?>
                            <?php endif; ?>

                            <?php echo Form::text('name', @$name, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'required']); ?>

                            <label for="dob">
                                Full Name
                            </label>
                        </div>
                </div>

                
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating customForm">
                        <?php if(!@$information->name): ?>
                                <?php
                                    $name = $user->name;
                                ?>
                            <?php else: ?>
                                <?php
                                    $name = old('name',@$information->name)
                                ?>
                            <?php endif; ?>

                            <?php echo Form::text('activity', @$information->activity, ['placeholder' => 'Enter Activity', 'class' => 'form-control', 'required']); ?>

                            <label for="dob">
                                Explain Activity
                            </label>
                        </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="form-floating">
                            <?php
                                $ratings = [
                                    '1' => '1',
                                    '2' => '2',
                                    '3' => '3',
                                    '4' => '4',
                                    '5' => '5',
                                ];
                            ?>
                                <?php echo Form::select('rating', $ratings, @$information->rating, ['placeholder' => 'Select Your Rating', 'class' => 'form-control', 'required']); ?>


                        <label for="floatingSelect">Rating</label>
                      </div>
                </div>
                
                <div class="col-lg-12 col-md-12 col-sm-12">


                <div class="form-floating">

                <span id="output"></span>
                <span>of 160 Characters</span>
                </div>
                    <div class="form-floating">
                        <?php echo Form::textarea('message', @$information->message, ['placeholder' => 'Enter Message', 'class' => 'form-control','id'=>'message', 'required', 'style' => "height:110px;"]); ?>

                        <label for="floatingTextarea">Message</label>
                      </div>
                </div>
                







            </div>
        </div>
    </div>
</div>



<script>
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }
</script>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/front/testimonials/form.blade.php ENDPATH**/ ?>