<?php
include "header.php";
include "config.php";
?>



<div class="main">
    <div class="container">
        <h1 style="padding-top:30px; text-align:center">GIỎ HÀNG</h1>

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
                        //Get all the orders from database
                        
                        $sql = "SELECT * FROM tdl_book ORDER BY book_id DESC "; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
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
                    
                    <td><a href="deleteProduct.php?id=<?php echo $row['book_id']; ?>"><button class="btn btn-danger"><i
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

                            echo "<tr><td colspan='12' class='error'>Giỏ Hàng Trống</td></tr>";

                          

                        }
                    ?>

            </tbody>
        </table>
    </div>

</div>