<?php
include "header.php";
include "config.php";
?>
<div class="main">
    <div class="container">
        <h4>Thêm dữ liệu </h4>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-2">
                    <label for="userName">User</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="userName" name="name">
                </div>
            </div>
            <!--  -->
            <div class="row">
                <div class="col-md-2">
                    <label for="price">Price</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="userName" name="price">
                </div>
            </div>
            <!--  -->
            <div class="row">
                <div class="col-md-2">
                    <label for="price">Picture</label>
                </div>
                <div class="col-md-10">
                    <input type="file"  name="image">
                </div>
            </div>
            <!--  -->
            <div class="row">
                <div class="col-md-2">
                    <label for=""></label>
                </div>
                <div class="col-md-10">
                    <button type="submit" name="submit" class="btn btn-success">Lưu Lại</button>
                </div>
            </div>
        </form>
        <!-- Add CAtegory Form Ends -->

        <?php 

//CHeck whether the Submit Button is Clicked or Not
if(isset($_POST['submit']))
{
    //echo "Clicked";

    //1. Get the Value from CAtegory Form
    $title = $_POST['name'];
    $price = $_POST['price'];
    //For Radio input, we need to check whether the button is selected or not
    //Check whether the image is selected or not and set the value for image name accoridingly
    //print_r($_FILES['image']);

    //die();//Break the Code Here

    if(isset($_FILES['image']['name']))
    {
    
        //Tải lên hình ảnh, chúng ta cần tên hình ảnh, đường dẫn nguồn và đường dẫn đích
        $image_name = $_FILES['image']['name'];
        
        // Tải lên hình ảnh chỉ khi hình ảnh được chọn
        if($image_name==!"")
        {
            //Tự động đổi tên hình ảnh 
            //Nhận phần mở rộng của hình ảnh của chúng tôi (jpg, png, gif, v.v.), ví dụ: "specialfood1.jpg"
            $ext = end(explode('.', $image_name));

            //Rename the Image
            // $image_name = $ext; // e.g. Food_Category_834.jpg
        
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../img/".$ext;
            //Cuối cùng tải lên hình ảnh
            $upload = move_uploaded_file($source_path, $destination_path);
            //Kiểm tra xem hình ảnh có được tải lên hay không
            //nếu hình ảnh không được tải lên thì  sẽ dừng quá trình và chuyển hướng với thông báo lỗi
            if($upload==false)
            {
                //SEt message
                $_SESSION['upload'] = "<div class='error'>Failed to Upload Image. </div>";
                //Redirect to Add CAtegory Page
                // header('location:addOffice.php');
                echo'Lỗi';

                //STop the Process
                die();
            }

        }
    }
    else
    {
        //Không tải lên hình ảnh và đặt giá trị image_name thành trống
        $image_name="";
    }

    //2. Tạo truy vấn SQL để chèn  vào cơ sở dữ liệu
    $sql = "INSERT INTO tdl_tour SET 
        tour_name='$title',
        price_package='$price',
        tour_picture='$image_name' 
        
    ";

    //3. Thực thi Truy vấn và Lưu trong Cơ sở dữ liệu
    $res = mysqli_query($conn, $sql);

    //4. Kiểm tra xem truy vấn có được thực thi hay không và dữ liệu được thêm vào hay không
    if($res==true)
    {
        
        $_SESSION['add'] = "<div class='text-success'>Thêm Thành Công</div>";
        
        header('location:tour.php');
    }
    else
    {

        $_SESSION['add'] = "<div class='text-error'>Thêm Thất Bại</div>";
        header('location:addTour.php');
        
    }
}

?>
    </div>
</div>