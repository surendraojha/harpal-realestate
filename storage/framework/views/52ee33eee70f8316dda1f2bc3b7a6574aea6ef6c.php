 <?php if($user->role != 'editor'): ?>
     <button class="btn btn-danger" onclick="return confirm('Are You Sure?')" formaction="<?php echo e($route); ?>"
         type="submit">
         <i class="fa fa-trash"></i>
     </button>
 <?php endif; ?>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/delete-button.blade.php ENDPATH**/ ?>