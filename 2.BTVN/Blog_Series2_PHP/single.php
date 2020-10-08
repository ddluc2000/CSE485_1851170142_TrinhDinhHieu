<?php include('path.php');?>

<?php include($ROOT_PATH . "/app/controllers/posts.php");
    
    if(isset($_GET['id'])){
        $post= selectOne('posts',['id' => $_GET['id']]);
    }
    $topics = selectAll('topics');
    $posts=selectAll('posts',['published' => 1]);
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
    <title><?php echo $post['title'];?></title>
</head>

<body>

    <?php include($ROOT_PATH . "/app/includes/header.php");?>

    <!-- CONTENT   -->
    <div class="page-wrapper">
        <div class="content clearfix">

    <!-- maincontent-->
            <div class="main-content single">
                <h1 class="post-title"><?php echo $post['title'];?></h1>
                <div class="post-content">
                    <?php echo html_entity_decode($post['body']);?>
                </div>
            </div>
    <!--//End Maincontent-->
    <!--Sidebar-->
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Popular</h2>
                    <?php foreach($posts as $p):?>
                    <div class="post clearfix">
                        <img src="<?php echo $BASE_URL . '/assets/image/'.$p['image'];?>" alt="123">
                        <a href="#" class="title"><h4><?php echo $p['title'];?></h4></a>
                    </div>
                    <?php endforeach;?>
                </div>
                    <div class="section topics">
                        <h2 class="section-title">Topics</h2>
                        <ul>
                            <?php foreach($topics as $key => $topic):?>
                                <li><a href="<?php echo $BASE_URL . "/index.php?t_id=" . $topic['id'] . '&name='.$topic['name'];?>"><?php echo $topic['name'];?></a></li>
                            
                            <?php endforeach;?>
                        </ul>
                    </div>


                </div>
    <!--End - Sidebar-->
            
    <!--//End Content-->
        </div>
    </div>
    <!--Footer-->
    
    <?php include($ROOT_PATH . "/app/includes/footer.php");?>

    <!--END-Footer-->
        

        <!-- script SLICKS   -->

        <!--ERROR _ RESP DISPLAY-->
        <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        <!-- CUSTOM    -->
        <script src="assets/js/script.js"></script>
</body>

</html>