


<?php
    $field = $information['name'];
?>
<input

type="<?php echo e($information['type']); ?>"
class="<?php echo e($information['class']); ?>"
placeholder="<?php echo e($information['placeholder']); ?>"
name="<?php echo e($information['name']); ?>"
value="<?php echo e(old($information['name'],@$d->$field)); ?>"

<?php if(@$information['id']): ?>
    id="<?php echo e($information['id']); ?>"
<?php endif; ?>

<?php if($information['required']): ?>
    required="required"
<?php endif; ?>


>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/textbox.blade.php ENDPATH**/ ?>