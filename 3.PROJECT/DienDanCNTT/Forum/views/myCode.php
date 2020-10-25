<!DOCTYPE html>
<html>
<body>
    <form action="myCode.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="avtF">
        <input type="submit" name="upload">
    </form>
    <?php
        if(isset($_POST['upload'])){
            print_r($_FILES);
            $file = $_FILES['avtF']['tmp_name'];
            $path = "../assets/images/avt/".$_FILES['avtF']['name'];
            if(move_uploaded_file($file, $path)){
                echo "Tải tập tin thành công";
            }else{
                echo "Tải tập tin thất bại";
            }
        }
    ?>
</body>
</html>
