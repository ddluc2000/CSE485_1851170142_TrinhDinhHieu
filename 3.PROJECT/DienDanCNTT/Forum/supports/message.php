<?php if(isset($_SESSION['message'])): ?>
<div class="msg success">
<li><?php echo $_SESSION['message']; ?></li>
<?php unset($_SESSION['message']);?>
</div>
<?php endif; ?>