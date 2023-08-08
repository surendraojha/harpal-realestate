<select name="order" id=""
onchange="this.form.submit()"
class="formCustom">
    <option value=""
    <?php echo e(old('order',$order)==""?'selected':''); ?>

    >Most Revelence</option>
    <option value="latest"

    <?php echo e(old('order',$order)=="latest"?'selected':''); ?>


    >Latest Property</option>
    <option value="oldest"
    <?php echo e(old('order',$order)=="oldest"?'selected':''); ?>


    >Oldest Property</option>
    <option value="lowest-price"
    <?php echo e(old('order',$order)=="lowest-price"?'selected':''); ?>


    >Lowest Price First</option>
    <option value="highest-price"
    <?php echo e(old('order',$order)=="highest-price"?'selected':''); ?>


    >Hightest Price First</option>
</select>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/sort-search.blade.php ENDPATH**/ ?>