<?php 
    include('path.php');
    include($ROOT_PATH . "/app/controllers/topics.php");
    include_once($ROOT_PATH . '/app/database/db.php');
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Somewhere font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora:ital,wght@1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Blog - HieuTran</title>
</head>

<body>
    
    <!-- TODO:INCLUDES HEADER HERE -->

    <?php include($ROOT_PATH . "/app/includes/header.php");?>
    <?php include($ROOT_PATH . "/app/includes/message.php");?>
    

    <!-- SLIDER   -->
    <div class="page-wrapper">
        <div class="post-slider">
            <h1 class="slider-title">Trending Posts</h1>
            <i class="fas fa-chevron-right next slick-arrow" style=""></i>
            <i class="fas fa-chevron-left prev slick-arrow" style=""></i>
            <div class="post-wrapper">

                <div class="post">
                    <img src="assets/image/img1.png" alt="Beautyful girl" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Every day is the good day!</a></h4>
                        <i class="author">Hieu Tran</i>
                        &nbsp;
                        <i class="calender">09/09/2020</i>
                    </div>
                </div>

                <div class="post">
                    <img src="assets/image/imag2.jpg" alt="Beautyful girl" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Hello Guys</a></h4>
                        <i class="author">Hieu Tran</i>
                        &nbsp;
                        <i class="calender">09/09/2020</i>
                    </div>
                </div>

                <div class="post">
                    <img src="assets/image/img3.png" alt="Beautyful girl" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Welcome to my Blog</a></h4>
                        <i class="author">Hieu Tran</i>
                        &nbsp;
                        <i class="calender">09/09/2020</i>
                    </div>
                </div>

                <div class="post">
                    <img src="assets/image/img4.png" alt="Beautyful girl" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">You're welcome</a></h4>
                        <i class="author">Hieu Tran</i>
                        &nbsp;
                        <i class="calender">09/09/2020</i>
                    </div>
                </div>

                <div class="post">
                    <img src="assets/image/img5.png" alt="Beautyful girl" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.html">Every day is the good day!</a></h4>
                        <i class="author">Hieu Tran</i>
                        &nbsp;
                        <i class="calender">09/09/2020</i>
                    </div>

                </div>
            </div>
        </div>

            <!-- MUSIC -->

            <!-- CONTENT   -->
            <div class="content clearfix">

                <!-- maincontent-->
                <div class="main-content">
                    <h1 class="recent-post-title">Recents Posts</h1>

                    <div class="post">
                        <img src="assets/image/img1.png" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.html">Welcome to my Blog</a></h2>
                            <i class="author">HieuTran</i>
                            &nbsp;
                            <i class="calendar">09/09/2020</i>
                            <p class="preview-text">Hello everybody, this is my Blog. It so beautiful.</p>
                            <a href="single.html" class="btn read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post">
                        <img src="assets/image/imag2.jpg" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.html">Every day is the good day!</a></h2>
                            <i class="author">HieuTran</i>
                            &nbsp;
                            <i class="calendar">09/09/2020</i>
                            <p class="preview-text">Hello everybody, this is my Blog. It so beautiful.</p>
                            <a href="single.html" class="btn read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post">
                        <img src="assets/image/img3.png" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.html">Every day is the good day!</a></h2>
                            <i class="author">HieuTran</i>
                            &nbsp;
                            <i class="calendar">09/09/2020</i>
                            <p class="preview-text">Hello everybody, this is my Blog. It so beautiful.</p>
                            <a href="single.html" class="btn read-more">Read More</a>
                        </div>
                    </div>

                    <div class="post">
                        <img src="assets/image/img4.png" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.html">Beautyful Girl</a></h2>
                            <i class="author">HieuTran</i>
                            &nbsp;
                            <i class="calendar">09/09/2020</i>
                            <p class="preview-text">This is a Beautiful Girl on the internet!</p>
                            <a href="single.html" class="btn read-more">Read More</a>
                        </div>
                    </div>
                </div>

                <!--//End Maincontent-->
                <div class="sidebar">
                    <audio controls autoplay loop preload="auto" class="audio">
                        <source src="music/easylove.mp3" type="audio/mp3">
                    </audio>
                    <div class="section search">
                        <h2 class="section-title">Search</h2>
                        <form action="index.html" method="post">
                            <input type="text" name="txt_search" class="text-input" placeholder="Search ...">
                        </form>
                    </div>
                    <div class="section topics">
                        <h2 class="section-title">Topics</h2>
                        <ul>
                            <?php foreach($topics as $key => $topic):?>
                                <li><a href="#"><?php echo $topic['name'];?></a></li>
                            </tr>
                            <?php endforeach;?>
                            


                            <!-- <li><a href="#">Picture</a></li>
                            <li><a href="#">Relax</a></li>
                            <li><a href="#">Games</a></li>
                            <li><a href="#">Community</a></li> -->
                        </ul>
                    </div>


                </div>

            </div>
            <!--//End Content-->
        </div>
    

    <!--Footer-->

    <?php include($ROOT_PATH . "/app/includes/footer.php");?>

    <!--END-Footer-->



    <!--Slider script-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- CUSTOM    -->
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>


