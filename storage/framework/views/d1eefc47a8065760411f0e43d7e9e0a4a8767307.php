
                                                    <?php

                                                    if(!$per_page)
                                                        $per_page=50;

                                                    $page = request()->get('page');

                                                        if(!$page){


                                                            $page=1;
                                                            $i =($index+1);

                                                        }else{
                                                            $i = ($page-1)*$per_page + ($index+1);

                                                        }

                                                    ?>
                                                    <?php echo e($i); ?>

<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/backend-page-number.blade.php ENDPATH**/ ?>