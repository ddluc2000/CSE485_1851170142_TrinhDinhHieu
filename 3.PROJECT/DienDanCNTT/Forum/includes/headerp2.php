<?php include_once("path.php");
global $BASE_URL; ?>
</head>
  <body>
        <header>
            <h1 class="logo">Forum_CSE</h1>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="navId">
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL."/index.php";?>" class="nav-link">Home</a>
                </li>

                <li class="nav-item">
                    <a href="#tab5Id" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="http://localhost:88/Forum/index.php?controller=admin&action=index" class="nav-link">Term</a>
                </li>
                <?php if(isset($_SESSION['id'])):?>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="http://localhost:88/Forum/index.php?controller=users&action=index&u_id=<?php echo $_SESSION['id'];?>">Profile</a>
                    <a class="dropdown-item" href="#tab3Id">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $BASE_URL."/index.php?controller=users&action=logout";?>">Logout</a>
                </div>
                </li>
                <?php else:?>
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL."/index.php?controller=users&action=login";?>" class="nav-link">Login</a>
                </li>
                <?php endif;?>

            </ul>
            <div class="clearfix"></div>
        </header>
