<?php
include "header.php";
include "config.php";
?>
<div class="main">
    <div class="container">
        <h4>Thêm dữ liệu </h4>

        <form action="" method="POST">
            <div class="row">
                <div class="col-md-2">
                    <label for="userName">User</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="userName" name="userName">
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label for="userMail">Email</label>
                </div>
                <div class="col-md-10">
                    <input type="email" class="form-control" id="userMail" name="userMail">
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <label for="userPass">Password</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="userPass" name="userPass">
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label for=""></label>
                </div>
                <div class="col-md-10">
                    <button type="submit" name="submit" class="btn btn-success">Lưu Lại</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include 'footer.php';
?>
<!-- ------ -->
<?php
if(isset($_POST["submit"])){


$user_name = $_POST['userName'];
$user_mail = $_POST['userMail'];
$password = $_POST['userPass'];

//Tạo truy vấn SQL để chèn  vào cơ sở dữ liệu
$sql = "INSERT INTO tdl_users (user_acc,user_email,user_pass) 
        VALUES('$user_name','$user_mail','$password')";
// Thực thi Truy vấn và Lưu trong Cơ sở dữ liệu
      $result = mysqli_query($conn,$sql);
   
   if($result >0){

    $_SESSION['add'] = "<div class='text-success'>Thêm Thành Công</div>";
  header("Location:user.php");
   }
   else{
    $_SESSION['add'] = "<div class='text-error'>Thêm Thất Bại</div>";
    header("Location:user.php");
   }
}

mysqli_close($conn);
?>