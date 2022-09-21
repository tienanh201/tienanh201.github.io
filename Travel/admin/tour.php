<?php
include "header.php"
?>
<div class="main">
    <div class="container">
    
    <h1>Manage Tour</h1>
     <br />
        <a href="addTour.php"><button class="btn btn-success but"><i class="fas fa-user-plus"></i>Thêm dữ liệu</button></a>
        <?php

            if(isset($_SESSION ['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION ['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION ['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
            ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Picture</th>

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
                    $sql = "SELECT * FROM tdl_tour";
                    // 
                    $result = mysqli_query($conn,$sql); //Lưu kết quả trả về vào result
                    // Bước 03: Phân tích và xử lý kết quả
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                               $tour_id = $row['tour_id'];
                                $tour_name = $row['tour_name'];
                                $price_package = $row['price_package'];
                                $tour_picture = $row['tour_picture'];
                    ?>
                <tr style="line-height:162px">
                    <td><?php echo $tour_id; ?>. </td>
                    <td><?php echo $tour_name; ?></td>
                    <td><?php echo $price_package; ?></td>

                    <td style="width:20%">
                        <?php 
                                //Check whether image available or not
                                if($tour_picture=="")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                        ?>

                        <img src="../img/<?php echo $tour_picture; ?>"style="width:90%">
                        <?php
                                }
                              ?>

                    </td>
                    <td><a href="update_Tour.php?id=<?php echo $row['tour_id']; ?>"><button
                                class="btn btn-success"><i class="fas fa-pencil-alt"></i>Sửa</button></a></td>
                    <td><a href="deleteTour.php?id=<?php echo $row['tour_id']; ?>"><button class="btn btn-danger"><i class="fas fa-trash-alt"></i>Xóa
                                </button</a>
                    </td>
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