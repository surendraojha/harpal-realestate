<?php
$user = auth()->user();

$wish_list = \App\Models\WishList::where('user_id', $user->id)
    ->where('property_id', $value->id)
    ->first();
?>


<?php if(!$wish_list): ?>
    <?php
        $class = 'addTofav';
    ?>
<?php else: ?>
    <?php
        $class = 'addedTofav';
    ?>
<?php endif; ?>
<a href="<?php echo e(route('add-to-wish-list', $value->id)); ?>" class="<?php echo e($class); ?>" data-bs-toggle="tooltip"
    data-bs-placement="top" title="" data-bs-original-title="Add To Favourites">
    <i class="fas fa-heart"></i>
</a>
<?php /**PATH E:\xampp\htdocs\harpal-realestate\resources\views/components/add-wish-list.blade.php ENDPATH**/ ?>