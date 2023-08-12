<style>
    .slimScrollBar {
        background-color: #fff !important;
    }
</style>
<nav id="left-sidebar-nav" class="sidebar-nav">
    <ul id="main-menu" class="metismenu">



        <?php
            $current_route = \Request::route()->getName();
        ?>
        <li class="<?php if($current_route == 'dashboard'): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('dashboard')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Dashboard</span></a>
        </li>








        

        <?php
            $route = ['admin-residental-property.index', 'admin-residental-property.edit', 'admin-commercial-property.index', 'admin-commercial-property.edit', 'featured-property.index', 'featured-property.edit', 'recommended-property.index', 'recommended-property.edit', 'home-page-property.index', 'home-page-property.edit'];
        ?>

        <li class="<?php if(in_array($current_route, $route)): ?> active open <?php endif; ?>">
            <a href="#property" class="has-arrow">

                
                <span>Property </span>

            </a>
            <ul>

                <?php
                    $route = ['admin-residental-property.index', 'admin-residental-property.edit'];
                ?>

                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('admin-residental-property.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Residental Properties
                            <?php if($residental_pending_property_count > 0): ?>
                                (<?php echo e($residental_pending_property_count); ?>)
                            <?php endif; ?>
                        </span></a>

                </li>


                <?php
                    $route = ['admin-commercial-property.index', 'admin-commercial-property.edit'];
                ?>

                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('admin-commercial-property.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Commercial Properties
                            <?php if($commerical_pending_property_count > 0): ?>
                                (<?php echo e($commerical_pending_property_count); ?>)
                            <?php endif; ?>
                        </span></a>

                </li>



                <?php
                    $route = ['featured-property.index', 'featured-property.edit'];
                ?>
                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('featured-property.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Featured Properties
                        </span></a>
                </li>
                <?php
                    $route = ['recommended-property.index', 'recommended-property.edit'];
                ?>
                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('recommended-property.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Recommended
                        </span></a>
                </li>

            </ul>

        </li>





        <?php
            $route = ['category.index', 'category.edit', 'sub-category.index', 'sub-category.edit', 'child-category.index', 'child-category.edit', 'location.index', 'location.edit', 'feature.index', 'feature.edit', 'floor.index', 'floor.edit', 'road-size.index', 'road-size.edit'];
        ?>






        <li class="<?php if(in_array($current_route, $route)): ?> active open <?php endif; ?>">
            <a href="#myPage" class="has-arrow">

                
                <span>Property Settings </span>

            </a>
            <ul>


                <?php
                    $route = ['category.index', 'category.edit'];
                ?>
                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('category.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Main Category</span></a>
                </li>

                <?php
                    $route = ['sub-category.index', 'sub-category.edit'];
                ?>
                
                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('sub-category.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Sub Category</span></a>
                </li>


                <?php
                    $route = ['child-category.index', 'child-category.edit'];
                ?>
                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('child-category.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Child Category</span></a>
                </li>


                <?php
                    $route = ['location.index', 'location.edit'];
                ?>
                

                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('location.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <span>Location</span></a>
                </li>


                <?php
                    $route = ['feature.index', 'feature.edit'];
                ?>


                

                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('feature.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Local Area Facilities
                        </span></a>
                </li>
                <?php
                    $route = ['floor.index', 'floor.edit'];
                ?>
                

                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('floor.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Floor</span></a>
                </li>

                <?php
                    $route = ['road-size.index', 'road-size.edit'];
                ?>
                

                <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
                    <a href="<?php echo e(route('road-size.index')); ?>">
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span>Road Type</span></a>
                </li>

                <?php
                    $route = ['home-stay-video.index'];
                ?>





            </ul>
        </li>








        

        <li class="header">Others</li>
        <?php
            $current_route = \Request::route()->getName();
        ?>
        <li class="<?php if($current_route == 'boost-request.index'): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('boost-request.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                    $boost_count = \App\Models\BoostPost::where('status', 0)->count();
                ?>
                <span>Boost Request

                    <?php if($boost_count > 0): ?>
                        ( <?php echo e($boost_count); ?> )
                    <?php endif; ?>
                </span>
            </a>
        </li>


        <li class="<?php if($current_route == 'boost-content.index'): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('boost-content.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Boost Content</span>
            </a>
        </li>




        <li class="<?php if($current_route == 'boost-step.index'): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('boost-step.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Boost Step</span>
            </a>
        </li>

        
        <?php
            $route = ['shift-home.index', 'shift-home.edit'];
        ?>

        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('shift-home.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Shift Home</span></a>
        </li>

        
        <?php
            $route = ['shift-home-item.index', 'shift-home-item.edit'];
        ?>

        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('shift-home-item.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Shift Home Items</span></a>
        </li>


        <?php
            $route = ['shift-home-content.index'];
        ?>

        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('shift-home-content.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Shift Home Content</span></a>
        </li>



        <?php
            $route = ['blog.index', 'blog.edit'];
        ?>
        
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('blog.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Blogs
                </span></a>
        </li>


        <?php
            $route = ['blog-category.index', 'blog-category.edit'];
        ?>
        
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('blog-category.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Blog Category
                </span></a>
        </li>



        <?php
            $route = ['faq.index', 'faq.edit'];
        ?>

        
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('faq.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>FAQ</span></a>
        </li>












        <?php
            $route = ['testimonial.index', 'testimonial.edit'];
        ?>

        
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('testimonial.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Testimonial</span></a>
        </li>



        <?php
            $route = ['newsletter.index', 'newsletter.edit'];
        ?>
        

        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('newsletter.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Newsletter Subscriber
                </span></a>
        </li>


        <?php
            $route = ['page.index', 'page.edit'];
        ?>
        
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('page.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Page
                </span></a>
        </li>

        <?php
            $route = ['partner.index', 'partner.edit'];
        ?>

        
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('partner.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Partner
                </span></a>
        </li>






        <?php
            $route = ['quick-link.index', 'quick-link.edit'];
        ?>


        
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('quick-link.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;
                <span>Quick Link</span>
            </a>
        </li>







        <?php
            $route = ['message.index', 'message.edit'];
        ?>
        
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('message.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Contact Us</span></a>
        </li>

        <?php
            $route = ['contact-us.index', 'contact-us.edit'];
        ?>


        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('contact-us.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Find Me Room</span></a>
        </li>


        <?php
            $route = ['support-forum.index', 'support-forum.edit'];
        ?>
        

        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('support-forum.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Support Forum
                </span></a>
        </li>



        
        <?php
            $route = ['about-us.index', 'about-us.edit'];
        ?>
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('about-us.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>About us
                </span></a>
        </li>






        
        <?php
            $route = ['watermark.index', 'watermark.edit'];
        ?>
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('watermark.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Watermark
                </span></a>
        </li>
        
        <?php
            $route = ['advertisement.index', 'advertisement.edit'];
        ?>
        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('advertisement.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Advertisement
                </span></a>
        </li>

        <?php
            $route = ['boost-subscription.index', 'boost-subscription.edit'];
        ?>
        <li class="<?php if($current_route == 'boost-subscription.index'): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('boost-subscription.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;

                <span>Subscription Settings</span>
            </a>
        </li>


        
        <?php
            $route = ['settings.index'];
        ?>

        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('settings.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Settings
            </a>
        </li>



        <?php if($user->role != 'editor'): ?>
            <?php
                $route = ['user.index', 'user.edit'];
            ?>

            <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">

                <a href="<?php echo e(route('user.index')); ?>">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Users
                </a>
            </li>
        <?php endif; ?>


        <?php
            $route = ['meta-tag.index', 'meta-tag.edit'];
        ?>

        <li class="<?php if(in_array($current_route, $route)): ?> active <?php endif; ?>">

            <a href="<?php echo e(route('meta-tag.index')); ?>">
                &nbsp;&nbsp;&nbsp;&nbsp;
                Meta Tag
            </a>
        </li>



        <?php
            $route = ['change.password'];
        ?>
        


    </ul>
</nav>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/admin/layouts/navbar.blade.php ENDPATH**/ ?>