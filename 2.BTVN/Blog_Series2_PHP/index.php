<?php 
    include('path.php');
    include($ROOT_PATH . "/app/controllers/topics.php");
    include_once($ROOT_PATH . '/app/database/db.php');
    $postsTitle='Recent Posts';
    // dd($posts);

    if(isset($_GET['t_id'])){
        $posts = getPostsByTopicId($_GET['t_id']);
        $postsTitle='You searched for topic: '.$_GET['name'];
    }
    else if(isset($_POST['search-term'])){
        $posts=searchPosts($_POST['search-term']);
        $postsTitle='You searched for "'.$_POST['search-term'].'"';
    }
    else{
        $posts=getPublishedPosts();
    }
  
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
            <?php foreach($posts as $post):?>
                <div class="post">
                    <img src="<?php echo $BASE_URL . '/assets/image/'.$post['image'];?>" alt="Beautyful girl" class="slider-image">
                    <div class="post-info">
                        <h4><a href="single.php?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></h4>
                        <i class="author"><?php echo $post['username'];?></i>
                        &nbsp;
                        <i class="calender"><?php echo date('F j, Y',strtotime($post['created_at'])); ?></i>
                    </div>
                </div>
                <?php endforeach;?>

            </div>
        </div>

            <!-- MUSIC -->

            <!-- CONTENT   -->
            <div class="content clearfix">

                <!-- maincontent-->
                <div class="main-content">
                    <h1 class="recent-post-title"><?php echo $postsTitle;?></h1>

                    <?php foreach($posts as $post):?>
                    <div class="post">
                        <img src="<?php echo $BASE_URL . '/assets/image/'.$post['image'];?>" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.php?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></h2>
                            <i class="author"><?php echo $post['username'];?></i>
                            &nbsp;
                            <i class="calendar"><?php echo date('F j, Y',strtotime($post['created_at'])); ?></i>
                            <p class="preview-text"><?php echo html_entity_decode(substr($post['body'],0,150).'...');?></p>
                            <a href="single.php?id=<?php echo $post['id'];?>" class="btn read-more">Read More</a>
                        </div>
                    </div>
                    <?php endforeach;?>
                    

                </div>    

                <!--//End Maincontent-->
                <div class="sidebar">
                    <div class="section search">
                        <h2 class="section-title">Search</h2>
                        <form action="index.php" method="post">
                            <input type="text" name="search-term" class="text-input" placeholder="Search ...">
                        </form>
                    </div>
                    <div class="section topics">
                        <h2 class="section-title">Topics</h2>
                        <ul>
                            <?php foreach($topics as $key => $topic):?>
                                <li><a href="<?php echo $BASE_URL . "/index.php?t_id=" . $topic['id'] . '&name='.$topic['name'];?>"><?php echo $topic['name'];?></a></li>
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


