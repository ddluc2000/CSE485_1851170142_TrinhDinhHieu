<?php if(count($errors) > 0) : ?>
<div class="badge badge-primary">
    <?php foreach($errors as $error) : ?>
    <p><?php echo $error; ?></p>
    <?php endforeach; ?>
</div>
<?php endif; ?>