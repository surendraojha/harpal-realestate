<?php
    @$user = auth()->user();
    @$user=@$user->name;
?>
<div class="user-account" style="display: inline;">
                <div class="user_div">

                        <img src="<?php echo e(asset('public/uploads/'.@$setting->favicon)); ?>"  class="user-photo" style="object-fit: contain" alt="Display Picture">

                </div>
                <div class="dropdown">
                    <span>Welcome,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown">
                        <strong><?php echo e(@$user); ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">


                        


                       <!--  <li><a href="#"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li> -->

                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                             class="icon-menu"> <i class="icon-power"></i>Logout</a> </li>
                        <form id="frm-logout" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                        <li class="divider"></li>

                    </ul>
                </div>
            </div>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/admin/layouts/user_info.blade.php ENDPATH**/ ?>