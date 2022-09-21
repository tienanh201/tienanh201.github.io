
<?php
        // Dịch vụ bảo vệ:
        session_start(); //Công ty dịch vụ Bảo vệ

        if(isset($_POST['smlogin'])){
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Bước 01: Kết nối DB Server
            $conn = mysqli_connect('localhost','root','','qldl');
            if(!$conn){
                die("Không thể kết nối");
            }

            // Bước 02: Truy vấn thông tin
            $sql = "SELECT * FROM tdl_users WHERE user_acc='$username'";
            $result = mysqli_query($conn,$sql);

            // Bước 03: Xác thực > Đăng nhập > Ở trên, trả về 1 bản ghi thôi
            if(mysqli_num_rows($result) > 0){
                // Bảo vệ cửa CHÍNH: kiểm tra xác thực
                $_SESSION['loginOK'] = $username;
              
                header("Location:index.php");
            }else{
                $_SESSION['login1'] = "<div class='text-error'>Tên tài khoản hoặc mật khẩu sai</div>";
                header("Location:login.php");
            }
        }
    ?>



    

