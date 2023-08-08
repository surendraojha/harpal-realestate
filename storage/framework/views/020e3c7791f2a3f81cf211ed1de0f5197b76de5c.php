<script>
$('form').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
  }
});

</script>
<?php /**PATH D:\xampp\htdocs\kotha-bhada\resources\views/components/disable-enter-submit.blade.php ENDPATH**/ ?>