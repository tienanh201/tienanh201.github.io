<?php
    include('send.php');
    // Kiểm tra tính hợp lệ của dữ liệu trên FORM (Javascript)
    // Nhận dữ liệu từ FORM: coi như dữ liệu đã hợp lệ

    if(isset($_POST['smregis'])){
        $user  = $_POST['username'];
        $email = $_POST['userEmail'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];
    }

    // Kiểm tra Email hoặc Username đã tồn tại chưa?
    //1. Kết nối tới Server
    $conn = mysqli_connect('localhost','root','','qldl');
    if(!$conn){
        die("Không thể kết nối");
    }

    // 2. Truy vấn dữ liệu
    $sql = "SELECT * FROM tdl_users WHERE user_email='$email' OR user_acc='$user'";
    $result = mysqli_query($conn,$sql);

    // 3. XỬ lý kết quả
    if(mysqli_num_rows($result) > 0){
        echo 'Email hoặc Username đã tồn tại';
    }else{
        // Băm mật khẩu
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
        $code = md5(uniqid(rand(), true));
            //Nếu chưa tồn tại, thì chúng ta mới LƯU vào CSDL và GỬI email xác nhận
        $sql_2 = "INSERT INTO tdl_users (user_acc, user_email, user_pass,user_code) VALUES ('$user','$email','$pass_hash','$code')";
        $result_2 = mysqli_query($conn,$sql_2);

        if($result_2 >=1){
            sendEmail($email,$code);
        }
    }


?>