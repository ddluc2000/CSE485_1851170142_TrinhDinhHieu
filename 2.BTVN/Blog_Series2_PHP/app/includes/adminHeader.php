<header>
        <div class="logo">
            <a href="<?php echo $BASE_URL . '/index.php';?>"><h1 class="logo-text"><span>Hieu</span>Tran</h1></a>
        </div>

        <i class="fa fa-bars menu-toggle"></i>
        <ul class="nav">
        <?php if(isset($_SESSION['username'])):?>
            <li>
                <a href="../../register.html">
                <i class="fa fa-user"></i>
                <?php echo $_SESSION['username']; ?>
                <i class="fa fa-chevron-down" style="font-size: .8em;"></i></a>
                <ul>
                    <li><a href="<?php echo $BASE_URL.'/logout.php';?>" class="logout">Logout</a></li>
                </ul>

            </li>
        <?php endif;?>
        </ul>


    </header>