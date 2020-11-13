<?php   include("../path.php");?>
<?php include(ROOT_PATH ."/admin/controller/post.php");
adminsOnly();?>
<!doctype html>
<html lang="en">

<head>
    <title>Create Post</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
</head>

<body>
    <?php include(ROOT_PATH ."/includes/admin/header_admin.php"); ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-8 ">
                    <div class="col-sm-12 p-0">
                        <h1>Create Post</h1>
                        <?php   include(ROOT_PATH . "/includes/public/errors.php"); ?>
                        <form method="post" action="create_post.php" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $title; ?>"
                                    id="">
                            </div>
                            <div class="form-group">
                                <label for=""></label>
                                <input type="file" class="form-control-file" name="image"  >
                            </div>
                            <div class="form-group">
                                <label for="editor">Nội dung</label>
                                <textarea class="form-control ckeditor" name="content" value="<?php echo $content; ?>"
                                    rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <select class="form-control" name="topic_id" id="">
                                    <option value=""></option>
                                    <?php foreach ($topics as $key => $topic): ?>
                                    <?php if(!empty($topic_id) && $topic_id==$topic['id']): ?>
                                    <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?>
                                    </option>
                                    <?php else: ?>
                                    <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?>
                                    </option>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-check">
                                <?php if(empty($published)): ?>
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="published">Publish
                                </label>
                                <?php else:  ?>
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="published" checked>Publish
                                </label>
                                <?php endif; ?>
                            </div>
                            <button type="submit" name="add-post" class="btn btn-primary">Add Post</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <?php include(ROOT_PATH ."/includes/admin/menu_admin.php"); ?>
                </div>
            </div>
        </div>
    </main>
    <?php include(ROOT_PATH . "/includes/admin/footer_admin.php"); ?>