<?php if(isset($_SESSION['message'])): ?>
            <div class="alert alert-primary ">
            <?php echo $_SESSION['message']; ?>
            <?php 
                unset($_SESSION['message']);
            ?>
        </div>
        <?php endif; ?>