<?php include("path.php");
include(ROOT_PATH ."/admin/controller/topic.php"); 
$posts=array();
if(isset($_GET['t_id'])){
    $posts= getPostsByTopicId($_GET['t_id']);
}else{
    $posts=getPublishedPost();
}



?>
<!doctype html>
<html lang="en">

<head>
    <title>Khoa Công nghệ thông tin Đại Học Thủy Lợi</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/b83b93c2d0.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- FB Page Plugin -->
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0"
        nonce="lCPHnw7D"></script>
    <!-- //FB Page Plugin -->
    <!-- Header -->
    <?php   include(ROOT_PATH . '/includes/header.php'); ?>



    <!--//Header-->
    <!-- Page -->
    <!-- Sliderbar -->
    <div class="slider-bar container ">
        <?php   include(ROOT_PATH . '/includes/public/message.php'); ?>
        <div id="carouselId" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                <li data-target="#carouselId" data-slide-to="1"></li>
                <li data-target="#carouselId" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="img-fluid img-thumbnail" src="images/cntt.jpg" alt="First slide" width="1161px"
                        height="400px">
                </div>

                <div class="carousel-item">
                    <img class="img-fluid img-thumbnail" src="images/ktpm.jpg" alt="Second slide" width="1161px"
                        height="400px">
                </div>
                <div class="carousel-item">
                    <img class="img-fluid img-thumbnail" src="images/httt.jpg" alt="Third slide" width="1161px"
                        height="400px">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <!-- //Sliderbar -->

    <!-- Page Content-->
    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="page-post mb-3 pb-3">
                        <div class="row">
                            <?php foreach ($posts as $post) :?>
                            <div class="col-md-6">
                                <img class="img-fluid img-thumbnail" src="<?php echo BASE_URL . '/images/'.$post['image'];  ?>"
                                    alt="ảnh gì đó" width="351px"   height="120px">
                            </div>
                            <div class="col-md-6">
                                <a href="single_post.php?id=<?php echo $post['id'];?>">
                                    <h3><?php echo $post['title']; ?></h3>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="page-topic">
                        <div class="fb-page" data-href="https://www.facebook.com/cse.tlu.edu.vn/" data-tabs="timeline"
                            data-width="" data-height="" data-small-header="false" data-adapt-container-width="true"
                            data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/cse.tlu.edu.vn/" class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/cse.tlu.edu.vn/">Khoa Công nghệ thông tin- Đại học
                                    Thủy lợi</a></blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content-->

    <!-- //page -->
    <?php
    include(ROOT_PATH . '/includes/footer.php');
?>