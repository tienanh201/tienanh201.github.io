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
        <h4 class="login__title">ĐĂNG KÝ</h4>
        <?php 
                if(isset($_SESSION['login1']))
                {
                    echo $_SESSION['login1'];
                    unset($_SESSION['login1']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        <form action="process-register.php" method="POST">
            <div class="login__username">
                <input type="text" name="username" required id="" placeholder="Username" class="login__input">
                <i class="login__icon fas fa-user"></i>
            </div>
            <div class="login__username">
                <input type="email" name="userEmail" required id="" placeholder="Email" class="login__input">
                <i class="login__icon fas fa-user"></i>
            </div>

            <div class="login__password">
                <input type="password" name="password1" required id="" placeholder="Password" class="login__input">
                <i class="login__icon fas fa-lock"></i>
            </div>
            <div class="login__password">
                <input type="password" name="password2" required id="" placeholder="Nhập Lại Password" class="login__input">
                <i class="login__icon fas fa-lock"></i>
            </div>
            <div class="login__button">
                <button type=submit name="smregis" class="login_btn">ĐĂNG KÝ</button>

            </div>
            <p class="login_text"> <a href="login.php" class="login_text-link">Quay
                    lại</a>.
            </p>
        </form>

    </div>

</body>

</html>