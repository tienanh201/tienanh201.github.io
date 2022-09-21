
<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../font/fontawesome-free-5.15.3-web/css/all.min.css">
    <title>ADMIN</title>
</head>

<body>
    
    <div class="login">
        <h4 class="login__title">Đăng Nhập</h4>
        
        <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                   
                }


         ?>
  
        <form action="process-login.php " method="POST">
            <div class="login__username">
                <input type="text" name="username" required id="" placeholder="Username" class="login__input">
                <i class="login__icon fas fa-user"></i>
            </div>

            <div class="login__password">
                <input type="password" name="password" required id="" placeholder="Password" class="login__input">
                <i class="login__icon fas fa-lock"></i>
            </div>
            <div class="login__button">
                <button type=submit name="smlogin" class="login_btn">Đăng Nhập</button>

            </div>
            <p class="login_text">Bạn chưa có tài khoản? <a href="register.php" class="login_text-link">Đăng Ký Ngay
                    </a>.
            </p>
        </form>

    </div>


    
</body>

</html>

<?php
ob_start();
session_start();
if (isset($_POST['smlogin'])) {
  $email = $_POST['username'];
  $password = $_POST['password'];

  $email =stripcslashes($email);
  $password =stripcslashes($password);
  $email = mysqli_real_escape_string($conn,$email);
  $password = mysqli_real_escape_string($conn,$password);
 

  $a = "SELECT * FROM tdl_users WHERE  user_acc='$email'";
  $result = mysqli_query($conn, $a);

  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $pass_hash = $row['user_pass'];
    echo $pass_hash;
    echo "<br>";
    echo $password;
    if (password_verify($password, $pass_hash)) {
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
      
      $_SESSION['loginOK'] = $email;
      header("location:index.php");
    } else {
    $_SESSION['login'] = "<h5 class='text-danger'>Đăng nhập Thất Bại.</h5>";
     header('location:login.php');
    }
  } else {
    $_SESSION['login'] = "<h5 class='text-danger'>Đăng nhập Thất Bại.</h5>";
    header('location:login.php');

  }
}


?>
    