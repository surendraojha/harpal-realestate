  <?php if($user->role!='editor'): ?>

                                                <td>

                                                    <label class="fancy-checkbox">
                                                        <input class="checkbox-tick checkitem" type="checkbox"
                                                            name="id[]" value="<?php echo e($value->id); ?>">
                                                        <span></span>
                                                    </label>
                                                </td>
                                                <?php endif; ?>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/check-box-td.blade.php ENDPATH**/ ?>