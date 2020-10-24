<?php if(count($errors) >0): ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error): ?>
        <li><?php echo $error; ?></li>
        <?php endforeach;?>
    </div>
<?php endif; ?>
