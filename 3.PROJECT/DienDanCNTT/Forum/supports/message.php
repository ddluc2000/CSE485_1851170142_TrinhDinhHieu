<?php if(isset($_SESSION['message'])): ?>
<div class="alert alert-success" role="alert">
<li><?php echo $_SESSION['message']; ?></li>
<?php unset($_SESSION['message']);?>
</div>
<?php endif; ?>
