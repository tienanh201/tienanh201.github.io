<?php
include "header.php";
include "config.php";
?>



<div class="main">
    <div class="container">
        <h1>Manage BookTour</h1>

        <br />

        <?php 
                    if(isset($_SESSION ['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION ['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
        <br><br>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Tour</th>
                    <th>Gía vé</th>
                    <th>Số Lượng</th>
                    <th>Tổng tiền</th>
                    <th>Ngày Đặt </th>
                    <th>SĐT</th>
                    <th>Email</th>
                    <th>Tên Người Đặt</th>
                    <th>Địa Chỉ</th>
                    <th>Xóa</th>

                </tr>
            </thead>
            <tbody>
                <?php 
                        //Nhận tất cả các book từ cơ sở dữ liệu
                        
                        $sql = "SELECT * FROM tdl_book ORDER BY book_id DESC "; // hiện thị Đơn đặt hàng mới nhất ở đầu tiên
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Đếm hàng
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Tạo Số và đặt giá trị của nó là 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Nhận tất cả các chi tiết đặt hàng
                                $book_id = $row['book_id'];
                                $book_name = $row['book_name'];
                                $tour_package = $row['tour_package'];
                                $book_quantity = $row['book_quantity'];
                                $book_total = $row['book_total'];
                                $tour_date = $row['tour_date'];
                              
                                $client_phone = $row['client_phone'];
                                $client_email = $row['client_email'];
                                $client_name = $row['client_name'];
                                $client_address = $row['client_address'];
                                
                                ?>

                <tr>
                    <td><?php echo $sn++; ?>. </td>
                    <td><?php echo $book_name; ?></td>
                    <td><?php echo $tour_package; ?></td>
                    <td><?php echo $book_quantity; ?></td>
                    <td><?php echo  $book_total; ?></td>
                    <td><?php echo $tour_date; ?></td>

                    <td><?php echo $client_phone; ?></td>
                    <td><?php echo  $client_email; ?></td>
                    <td><?php echo $client_name; ?></td>
                    <td><?php echo  $client_address; ?></td>
                    
                    <td><a href="delete_Booktour.php?id=<?php echo $row['book_id']; ?>"><button class="btn btn-danger"><i
                                    class="fas fa-trash-alt"></i>Xóa
                                </button</a>
                    </td>
                </tr>

                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>Orders not Available</td></tr>";
                        }
                    ?>

            </tbody>
        </table>
    </div>

</div>