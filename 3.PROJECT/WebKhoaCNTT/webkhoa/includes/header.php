<div class="container-fluid">
    <header class="container">
        <nav class="navbar navbar-expand-sm  navbar-light p-0 ">
            <a class="navbar-brand" href="<?php echo BASE_URL .'/index.php' ?>"><img src="images/logo_min.jpg"
                    alt="Ảnh logo"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <?php foreach($topics as $key => $topic): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL .'/index.php?t_id='. $topic['id'] ?>"><?php echo $topic['name']; ?></a>
                    </li>
                    <?php endforeach; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FORUM</a>
                    </li>
                    <?php if(isset($_SESSION['id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href=""><i class="far fa-user"></i><?php echo $_SESSION['username']; ?></a>
                        <ul class="p-0">
                            <?php if($_SESSION['admin']): ?>
                            <li><a class="nav-link" href="<?php echo BASE_URL .'/admin/dashboard.php' ?>">DASHBOARD</a>
                            </li>
                            <?php endif; ?>
                            <li><a class="nav-link" href="<?php echo BASE_URL . '/logout.php'; ?>">LOGOUT</a></li>
                        </ul>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CSE</a>
                        <ul class="p-0">
                            <li><a class="nav-link" href="<?php echo BASE_URL .'/login.php' ?>">SIGN UP</a></li>
                            <li><a class="nav-link" href="<?php echo BASE_URL .'/register.php' ?>">REGISTER</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </header>
</div>