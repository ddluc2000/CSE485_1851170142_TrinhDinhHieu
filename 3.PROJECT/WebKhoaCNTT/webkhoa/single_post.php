<?php include("path.php");
include(ROOT_PATH ."/admin/controller/post.php");
if(isset($_GET['id'])){
$post =selectOne('post',['id' => $_GET['id']]);
}
$posts=selectAll('post',['published'=>1]);
?>
<!doctype html>
<html lang="en">

<head>
    <title><?php echo $post['title']; ?></title>
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
    <?php include(ROOT_PATH ."/includes/header.php"); ?>
    <main>
        <div class="container ">
            <h2><?php echo $post['title']; ?></h2>
            <div class="row">
                <div class="col-md-10 ">
                    <div class="col-sm-12 p-0">
                    <div class="col-sm-7"><img src="<?php echo BASE_URL . '/images/'.$post['image']; ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""
                    width="751px"   height="260px"></div>
                    
                        <?php echo html_entity_decode($post['content']);  ?>
                    </div>
                </div>
                <div class="col-md-2 ">
                    <div class="list-group">
                        <?php foreach($posts as $p): ?>
                        <a href="single_post.php?id=<?php echo $p['id'];?>" class="list-group-item list-group-item-info"><?php echo $p['title'] ?></a>                     
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include(ROOT_PATH . "/includes/footer.php");
?>