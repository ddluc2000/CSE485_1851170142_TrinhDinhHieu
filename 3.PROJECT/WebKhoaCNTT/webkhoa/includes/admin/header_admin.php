  <header>
    <div class="container-fluid">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                <a class="navbar-brand" href="<?php echo BASE_URL . '/index.php'; ?>">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION['username'])): ?>
                        <li class="nav-item active">
                            <a class="nav-link" href=""><?php echo $_SESSION['username']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL . '/logout.php'; ?>">Logout</a>
                        </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </header>
    </div>
</header>
