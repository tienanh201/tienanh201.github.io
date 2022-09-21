<?php
include "header.php"
?>
    <div class="main">
        <div class="container">
        <h1>Manage User</h1>
     <br />
            <a href="addUser.php"><button class="btn btn-success but" ><i class="fas fa-user-plus"></i>Thêm dữ liệu</button></a>
            <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            
            ?>
           
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        
                        <th scope="col">Edit</th>

                        <th scope="col">Delete</th>

                    </tr>
                </thead>
                <tbody>
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
                <?php
                    // Quy trình 4 bước
                    // Bước 01: Đã tạo sẵn, gọi lại thôi
                    include 'config.php';
                    // Bước 02: Thực hiện TRUY VẤN
                    $sql = "SELECT * FROM tdl_users";
                    $sn = 1;
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                ?>
                            <tr>
                                <td><?php echo $sn++; ?>. </td>

                                
                                <td><?php echo $row['user_acc']; ?></td>
                                <td><?php echo $row['user_email']; ?></td>
                                <td><?php echo $row['user_pass']; ?></td>
                                

                                <td><a href="update_User.php?id=<?php echo $row['user_id']; ?>"><button class="btn btn-success">Sửa</button></a></td>
                                <td><a href="deleteUser.php?id=<?php echo $row['user_id']; ?>"><button class="btn btn-danger">Xóa</button</a></td>
                            </tr>
                <?php
                        }
                    }
                ?>
                
                <!-- Đoạn này thay đổi theo Dữ liệu trong CSDL -->
            </tbody>
            </table>

        </div>
    </div>
<?php

include "footer.php"
?>
