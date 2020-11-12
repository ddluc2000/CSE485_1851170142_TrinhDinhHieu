<?php include_once("path.php");
global $BASE_URL;
global $ROOT_PATH;
global $URL; ?>
<style> 
.ck-editor__editable { 
    min-height: 200px; 
} 
</style> 
</head>
  <body>
        <header>
            <a href="<?php echo $BASE_URL; ?>">
            <img src="<?php echo $BASE_URL."/assets/images/logo.png"?>" height="60px">
            <h1 class="logo">Forum</h1>
            </a>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="navId">
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL."/index.php";?>" class="nav-link">Home</a>
                </li>
                <li class="nav-item"> 
                        <a class="nav-link" href="#" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Search
                        </a>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <form action="<?php echo $URL."posts&action=search"?>" method="post">
                            <input type="text" class="form-control" name="val" aria-describedby="helpId" placeholder="">
                            <button type="submit" name="search_post" class="btn btn-primary">search</button>
                            </form>
                        </div>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $URL."parent&action=about";?>" class="nav-link">About</a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo $URL."parent&action=rules";?>" class="nav-link">Rules</a>
                </li>
                <?php if(isset($_SESSION['id'])):?>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username'];?></a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo $URL;?>users&action=index&u_id=<?php echo $_SESSION['id'];?>">Profile</a>
                    <?php if($_SESSION['admin']==1):?>
                    <a class="dropdown-item" href="<?php echo $URL;?>admin&action=index">Dash Board</a>
                    <?php endif;?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo $BASE_URL."/index.php?controller=users&action=logout";?>">Logout</a>
                </div>
                </li>
                <?php else:?>
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL."/index.php?controller=users&action=register";?>" class="nav-link">Register</a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo $BASE_URL."/index.php?controller=users&action=login";?>" class="nav-link">Login</a>
                </li>
                <?php endif;?>

            </ul>
            <div class="clearfix"></div>
        </header>
