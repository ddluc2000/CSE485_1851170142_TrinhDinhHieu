
<?php
        if(isset($_POST['update'])){
            print_r($_FILES);
            $file = $_FILES['avatar']['tmp_name'];
            $path = "../assets/images/avt/".$_FILES['avatar']['name'];
            if(move_uploaded_file($file, $path)){
                echo "Tải tập tin thành công";
            }else{
                echo "Tải tập tin thất bại";
            }
        }
    ?>
<!-- VIET BODY LUON O DAY -->
    <div class="page-wrapper">
        <div class="main-page container">
            <div class="row">
                <div class="col-md-12">

                    <div class="user-content">
                     <form action="" method="post" enctype="multipart/form-data">
                            <input type="file" name="avatar">
                            <button type="submit" name="update">Update</button>
                     </form>   
                        
                    </div>

                    <div class="list-posted">
                        Các bài post
                    </div>
                </div>
            </div>
        </div>
    </div>


