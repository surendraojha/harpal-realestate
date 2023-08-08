    <div class="row">

        <?php
            $count = 0;
        ?>
        <?php $__currentLoopData = $active_properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 mb-4">
                <div class="singleenterBox border">
                    <div class="row  mb-2">
                        <div class="col-3">
                            <a href="<?php echo e(route('property.detail', $value->slug)); ?>" title="<?php echo e($value->title); ?>">
                                <img src="<?php echo e(asset('uploads/' . $value->featured_photo)); ?>" alt="<?php echo e($value->title); ?>">
                            </a>
                        </div>
                        <div class="col-8">
                            <div class="singleenterContent">
                                <div class="singleTitleBox">
                                    <a href="<?php echo e(route('property.detail', $value->slug)); ?>">
                                        <h4>
                                            <?php echo e($value->title); ?>

                                        </h4>
                                        <span>
                                            #<?php echo e($value->ad_id); ?>

                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <form action="<?php echo e(route('my-property.destroy', $value->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="trashBtn" type="submit"
                                    onclick="return confirm('Are You Sure You Want To Delete This Property?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            <a class="trashBtn mt-3" href="<?php echo e(route('my-property.edit', $value->slug)); ?>">
                                <i class="fas fa-edit"></i>
                            </a>
                        </div>
                    </div>
                    <div class="location">
                        <?php echo e($value->location->location); ?>

                    </div>
                    <div class="pricong">
                        <?php
                            $formatted_price = \App\Helpers\NumberHelper::formatnumber($value->price);
                        ?>
                        Rs. <?php echo e($formatted_price); ?>

                    </div>
                    <div class="removeBox mt-2">
                        <div class="row align-items-center">
                            <div class="col-md-6 mb-3">
                                Ad Listed on : <?php echo e(date('d M, Y', strtotime($value->created_at))); ?>


                            </div>
                            <div class="col-md-6 mb-3">
                                Ad Expires on : <?php echo e(date('d M, Y', strtotime($value->expiration_date))); ?>

                            </div>
                            <div class="col-md-6 border-top pt-3">



                                <?php if(!@$value->boostPost): ?>
                                <div class="promoteWrap" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Promote your rental property to reach more people across additional placements">
                                    <a class="colorBtn d-inline-block py-2"
                                        href="#"   data-bs-toggle="modal"        data-bs-target="#boostrModal<?php echo e($count); ?>">
                                        Promote Your Property
                                    </a>
                                </div>
                                <?php else: ?>
                                    <?php if($value->boostPost->status == 0): ?>
                                        <button class="colorBtn d-inline-block py-2 disabled" disabled>
                                            Promotion Request Sent To Admin
                                        </button>
                                    <?php else: ?>
                                        <button class="colorBtn d-inline-block py-2 disabled" disabled>
                                            Promotion Running
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>


                                <form action="<?php echo e(route('front.boost.post')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <!-- Boost Modal -->
                                    <div class="modal fade" id="boostrModal<?php echo e($count); ?>" tabindex="-1"
                                        aria-labelledby="boostrModal<?php echo e($count); ?>Label" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="boostrModal1Label">Boost Your
                                                        Property</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="labelTitle border-end mb-1 pt-3">
                                                                    <h6 class="mx-3">
                                                                        Please Select a Package
                                                                    </h6>
                                                                    <div class="packageList">
                                                                        <div class="row">

                                                                            <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <div class="col-md-4">
                                                                                    <div class="singlePackage mx-3">
                                                                                        <input type="radio"
                                                                                            value="<?php echo e($v->id); ?>"
                                                                                            id="basicPackage<?php echo e($value->ad_id . '-' . $v->id); ?>"
                                                                                            name="subscription_id" <?php if($index==1): ?> checked <?php endif; ?>>
                                                                                        <label
                                                                                            for="basicPackage<?php echo e($value->ad_id . '-' . $v->id); ?>">
                                                                                            <div class="packageTitle"data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-html="true" data-bs-original-title='                                                                                            <?php if (isset($component)) { $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BoostFeatureList::class, ['label' => $v->feature_label_1,'value' => $v->feature_value_1]); ?>
<?php $component->withName('boost-feature-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29)): ?>
<?php $component = $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29; ?>
<?php unset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29); ?>
<?php endif; ?>


                                                                                                <?php if (isset($component)) { $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BoostFeatureList::class, ['label' => $v->feature_label_2,'value' => $v->feature_value_2]); ?>
<?php $component->withName('boost-feature-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29)): ?>
<?php $component = $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29; ?>
<?php unset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29); ?>
<?php endif; ?>

                                                                                                <?php if (isset($component)) { $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BoostFeatureList::class, ['label' => $v->feature_label_3,'value' => $v->feature_value_3]); ?>
<?php $component->withName('boost-feature-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29)): ?>
<?php $component = $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29; ?>
<?php unset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29); ?>
<?php endif; ?>

                                                                                                <?php if (isset($component)) { $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BoostFeatureList::class, ['label' => $v->feature_label_4,'value' => $v->feature_value_4]); ?>
<?php $component->withName('boost-feature-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29)): ?>
<?php $component = $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29; ?>
<?php unset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29); ?>
<?php endif; ?>


                                                                                                <?php if (isset($component)) { $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BoostFeatureList::class, ['label' => $v->feature_label_5,'value' => $v->feature_value_5]); ?>
<?php $component->withName('boost-feature-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29)): ?>
<?php $component = $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29; ?>
<?php unset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29); ?>
<?php endif; ?>

                                                                                                <?php if (isset($component)) { $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BoostFeatureList::class, ['label' => $v->feature_label_6,'value' => $v->feature_value_6]); ?>
<?php $component->withName('boost-feature-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29)): ?>
<?php $component = $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29; ?>
<?php unset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29); ?>
<?php endif; ?>


                                                                                                <?php if (isset($component)) { $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BoostFeatureList::class, ['label' => $v->feature_label_7,'value' => $v->feature_value_7]); ?>
<?php $component->withName('boost-feature-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29)): ?>
<?php $component = $__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29; ?>
<?php unset($__componentOriginala6055a475a1ce4d336b4af0d3696e57e9ad52e29); ?>
<?php endif; ?>
                                                                                            '
                                                                                                style="background-color: <?php echo e($v->color); ?>;">
                                                                                                <?php echo e($v->title); ?>

                                                                                            </div>
                                                                                            <div class="singleFeature">

                                                                                                <div class="Selected">
                                                                                                    Selected
                                                                                                </div>
                                                                                            </div>
                                                                                            <div
                                                                                                class="colorBtn d-inline-block py-2 mb-2">
                                                                                                NPR <?php echo e($v->price); ?>

                                                                                            </div>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 mt-4 text-center">
                                                                                <img src="<?php echo e(asset('uploads/'.$setting->qr_code)); ?>" alt="QR Code" style="width:320px; height:auto;object-fit:contain;">
                                                                                <br>
                                                                                <Span>Scan QR Code For Suscription Payment</Span>

                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="row mx-3">
                                                                    <div class="col-12 mt-4">
                                                                        <h6>
                                                                            Now fill all the necessary fields and
                                                                            submit.
                                                                        </h6>
                                                                    </div>
                                                                    <div class="col-md-6 mt-4">
                                                                        <div class="customForm">
                                                                            <label for="">
                                                                                Your Full Name
                                                                            </label>
                                                                            <input type="text" name="name"
                                                                                value="<?php echo e(old('name', $user->name)); ?>"
                                                                                placeholder="eg. Ram Adhikari">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6  mt-4">
                                                                        <div class="customForm">
                                                                            <label for="">
                                                                                Email
                                                                            </label>
                                                                            <input type="text" name="email"
                                                                                value="<?php echo e(old('email', $user->email)); ?>"
                                                                                placeholder="yourname@mail.com">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="customForm">
                                                                            <label for="">
                                                                                Your Phone Number
                                                                            </label>
                                                                            <input type="text" name="phone"
                                                                                value="<?php echo e(old('phone', $user->phone)); ?>"
                                                                                placeholder="98XXXXXXXX">
                                                                        </div>
                                                                    </div>




                                                                    <div class="col-md-12  mt-4">
                                                                        <div class="customForm">
                                                                            <div class="d-flex justify-content-between">
                                                                                <label for="">
                                                                                    Deposit Slip Or Screenshot Of Online
                                                                                    Payment (optional)
                                                                                </label>

                                                                            </div>
                                                                            <input type="file" name="deposit_slip">
                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-12 mt-4">
                                                                        <div class="customForm">
                                                                            <label for="">
                                                                                If any
                                                                            </label>
                                                                            <textarea name="message" id="" cols="30" rows="10" placeholder="Write a Message"
                                                                                class="mb-0"><?php echo e(old('message')); ?></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <input type="hidden" name="property_id"
                                                                        value="<?php echo e(@$value->id); ?>" id="">
                                                                        <div class="col-12 mt-3">
                                                                            <div class="alert alert-primary mb-0" role="alert">
                                                                                <div class="d-flex">
                                                                                    <i class="fas fa-info pe-2"></i>
                                                                                    <div class="waringBox">
                                                                                        यदि तपाइँ कुनै एजेन्ट (dalay dai) सँग व्यवहार गर्नुहुन्छ र यस प्लेटफर्म बाहिर पैसा पठाउने  गर्नुहुन्छ भने kothabhada.com जिम्मेवार हुनेछैन।
                                                                                        <br />
                                                                                        Kothabhada.com will not be responsible if you deal with an agent  and transfer money outside of this platform.
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="customForm text-end m-0">
                                                        <button class="colorBtn px-3 m-0" type="submit">
                                                            Send <i class="flaticon-right-arrow ps-2"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-end border-top pt-3">
                    <a class="" href="<?php echo e(route('my-property.fulfilled', $value->id)); ?>">
                        Marked as filled
                    </a>
                </div>
            </div>


    </div>


    </div>
    </div>
    <?php
        $count++;
    ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['informations' => $active_properties]); ?>
<?php $component->withName('pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966)): ?>
<?php $component = $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966; ?>
<?php unset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966); ?>
<?php endif; ?>

    </div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/front/property/active.blade.php ENDPATH**/ ?>