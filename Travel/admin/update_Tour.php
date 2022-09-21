<?php

include "header.php";
include "config.php";
?>
<div class="main-content">
    <div class="container">
        <h1>Update Category</h1>

        <br><br>


        <?php 
        
            //Check whether the id is set or not
            if(isset($_GET['id']))
            {
                //Get the ID and all other details
                //echo "Getting the Data";
                $id = $_GET['id'];
                //Create SQL Query to get all other details
                $sql = "SELECT * FROM tdl_tour WHERE tour_id=$id";

                //Execute the Query
                $res = mysqli_query($conn, $sql);

                //Count the Rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //Get all the data
                    $row = mysqli_fetch_assoc($res);

                    $tour_name = $row['tour_name'];
                    $price_package = $row['price_package'];
                    $tour_picture = $row['tour_picture'];
                   
                }
                else
                {
                    //redirect to manage category with session message
                    $_SESSION['no-category-found'] = "<div class='error'>Category not Found.</div>";
                    header('location: tour.php');
                }

            }
            else
            {
                //redirect to Manage CAtegory
                header('location:tour.php');
            }
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">



            <div class="row">
                <div class="col-md-2">
                    <label for="userName">Name</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" value="<?php echo $tour_name; ?>">
                </div>
            </div>

            <!--  -->
            <div class="row">
                <div class="col-md-2">
                    <label for="price">Price</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="price" value="<?php echo $price_package; ?>">
                </div>
            </div>
            <!--  -->
            <!-- <table class="tbl-30"> -->

            <div class="row">
                <div class="col-md-2">
                    <label for="price">Picture</label>
                </div>
                <div class="col-md-10">
                    <?php 
                            if($tour_picture != "")
                            {
                                //Display the Image
                                ?>
                    <img src="../img/<?php echo $tour_picture; ?>" style="width:30%">

                    <?php
                            }
                            else
                            {
                                //Display Message
                                echo "<div class='error'>Image Not Added.</div>";
                            }
                        ?>
                </div>
            </div>


            <!--  -->
            <!-- <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr> -->
            <!--  -->
            <div class="row">
                <div class="col-md-2">
                    <label for="price">New Picture</label>
                </div>
                <div class="col-md-10">
                    <input type="file" name="image">
                </div>
            </div>
            <!--  -->
            <div class="row">
                <div class="col-md-2">
                    <label for=""></label>
                </div>
                <div class="col-md-10">
                    <input type="hidden" name="picture" value="<?php echo $tour_picture; ?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <button type="submit" name="submit" class="btn btn-success">Lưu Lại</button>
                </div>
            </div>


        </form>

        <?php 
        
            if(isset($_POST['submit']))
            {
                //echo "Clicked";
                //1. Get all the values from our form
                $id = $_POST['id'];
                $tour_name = $_POST['name'];
                $price_package = $_POST['price'];
                $tour_picture = $_POST['picture'];


               // 2. Cập nhật hình ảnh mới nếu được chọn
                // Kiểm tra xem hình ảnh đã được chọn hay chưa
                if(isset($_FILES['image']['name']))
                {
                    // Lấy chi tiết hình ảnh
                    $image_name = $_FILES['image']['name'];

                    //Check whether the image is available or not
                    if($image_name != "")
                    {
                        //Image Available

                        //A. UPload the New Image

                        // Tự động đổi tên hình ảnh của chúng tôi

                        // LẤy phần mở rộng của hình ảnh của chúng tôi (jpg, png, gif, v.v.), ví dụ: "specialfood1.jpg"
                        $ext = end(explode('.', $image_name));

                        //Rename the Image
                        $image_name ="Travel_".rand(000, 999).'.'.$ext;// e.g. Food_Category_834.jpg
                        

                        $source_path = $_FILES['image']['tmp_name'];

                        $destination_path = "../img/".$image_name;

                        //Finally Upload the Image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        
                     // Kiểm tra xem hình ảnh có được tải lên hay không
                     // Và nếu hình ảnh không được tải lên thì chúng tôi sẽ dừng quá trình và chuyển hướng với thông báo lỗi
                        if($upload==false)
                        {
                            //SEt message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                            //Redirect to Add CAtegory Page
                            header('location:tour.php');
                            //STop the Process
                            die();
                        }

                       //B. Xóa hình ảnh hiện tại nếu có
                        if($tour_picture !="")
                        {
                            $remove_path = "../img/".$tour_picture;

                            $remove = unlink($remove_path);

                            // Kiểm tra xem hình ảnh có bị xóa hay không
                            // Nếu không xóa được thì hiển thị thông báo và dừng processs
                            if($remove==false)
                            {
                                //Failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current Image.</div>";
                                header('location:tour.php');
                                die();//Stop the Process
                            }
                        }
                        

                    }
                    else
                    {
                        $image_name = $tour_picture;
                    }
                }
                else
                {
                    $image_name = $tour_picture;
                }

                //3. Update the Database
                $sql2 = "UPDATE tdl_tour SET 
                   tour_name='$tour_name',

                   price_package='$price_package',

                    tour_picture= '$image_name' 
                   
                    WHERE tour_id=$id
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //4. REdirect to Manage Category with MEssage
                //CHeck whether executed or not
                if($res2==true)
                {
                    //Category Updated
                    $_SESSION['update'] = "<div class='text-success'>Cập Nhật Thành Công</div>";
                    header('location:tour.php');
                }
                else
                {
                    //failed to update category
                    $_SESSION['update'] = "<div class='text-error'>Cập Nhật thất bại</div>";
                    header('location:tour.php');
                }

            }
        
        ?>

    </div>
</div>