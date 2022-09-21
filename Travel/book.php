<?php
ob_start();
include "header.php";
include "config.php";
?>
<?php 
        if(isset($_SESSION['order']))
        {
            echo $_SESSION['order'];
            unset($_SESSION['order']);
        }
    ?>
<?php 
        //CHeck whether food id is set or not
        if(isset($_GET['id']))
        {
            //Get the Food id and details of the selected food
            $tour_id = $_GET['id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tdl_tour WHERE tour_id=$tour_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $tour_name = $row['tour_name'];
                $price_package =$row['price_package'];
                $tour_picture = $row['tour_picture'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to homepage
            header('location:'.SITEURL);
        }
    ?>
<div class="shop_tour">
    <div class="blog-heading">

        <img src="img/thanhtoan.jpg" alt=""
            style="width: 100%;">
    </div>
    <div class="blog-title">

        <h1 style="font-size:30px">Thông Tin Thanh Toán</h1>

    </div>
    <div class="container">
        <form action="" method="POST">

            <div class="row">

                <div class="col-lg-4">
                    <div class="shop_tour-heading">
                        <h3>Thông Tin Về Người Đặt</h3>
                    </div>
                    <div class="panel-body">
                        <!-- giá -->
                        <!-- <strong class="total">Tổng cộng: </strong> -->

                        <div class="form-group has-error">
                            <input type="text" class="form-control" name="clientname" placeholder="Họ và tên" required>
                        </div>
                        <div class="form-group has-error">
                            <input type="text" class="form-control" name="clientphone" placeholder="Số Điện Thoại"
                                required>
                        </div>
                        <div class="form-group has-error">
                            <input type="text" class="form-control" name="clientemail" placeholder="Email" required>
                        </div>
                        <div class="form-group has-error">
                            <input type="text" class="form-control" name="clientaddress" placeholder="Địa Chỉ" required>
                        </div>
                        <!-- <input name="btn-tt" type="submit" class="btn btn-primary pay" value="Thanh Toán"></input> -->

                    </div>

                </div>

                <div class=" col-lg-8">
                    <div class="shop_tour-heading">
                        <h3>Thông Tin Về Sản Phẩm / Dịch Vụ</h3>
                    </div>


                    <div class="cart-tour">
                        <div class="col-lg-6">
                            <div class="shop_tour-img">

                                <!-- ảnh -->
                                <img src="img/<?php echo $tour_picture; ?>" alt="" class="img_tour">
                            </div>
                        </div>

                        <div class="col-lg-6" style="padding: 0 15px">
                            <div class="shop_tour-book">

                                <h3 class="shop_tour-title"><?php echo $tour_name; ?></h3>

                                <input type="hidden" name="bookName" value="<?php echo $tour_name; ?>">
                                <!-- <input type="hidden" name="name" value=""> -->
                                <!-- <p>
                                    <strong class="tour_date">Ngày khởi hành: </strong>
                                    <span class="tour_date-star"></span>
                                </p> -->
                                <div class="shop-detail">
                                    <div class="shop-detail-price">
                                        <strong class="customer">Gía vé : </strong>
                                        <input name="quantity" class="qty" type="number" min="1" value="1" max="10">

                                        <span class="item-price" name="price">x<?php echo  $price_package; ?> </span>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="cart-total">
                        <div class="pull-left" style="float:right">
                            <input name="btn-tt" type="submit" class="btn btn-primary pay" value="Thanh Toán"></input>
                        </div>

                        <!-- update song rồi  -->
                        
                    </div>




                </div>

            </div>
        </form>
        <?php 

//CHeck whether submit button is clicked or not
if(isset($_POST['btn-tt']))
{
    // Get all the details from the form

    $book_name = $_POST['bookName'];
    // $price_package = $_POST['price'];
    $qty = $_POST['quantity'];

    $total = $price_package * $qty; // total = price x qty 

    $tour_date = date("Y-m-d h:i:sa"); //Order DAte

    // $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

    $customer_name = $_POST['clientname'];
    $customer_phone = $_POST['clientphone'];
    $customer_email = $_POST['clientemail'];
    $customer_address = $_POST['clientaddress'];


    //Save the Order in Databaase
    //Create SQL to save the data
    $sql2 = "INSERT INTO tdl_book SET 
        book_name = '$book_name',
        tour_package = $price_package,
        book_quantity = $qty,
        book_total = $total,
        tour_date = '$tour_date',
        client_phone = '$customer_phone',
        client_email = '$customer_email',
        client_name = '$customer_name',
        client_address = '$customer_address'
    ";

    //echo $sql2; die();

    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    //Check whether query executed successfully or not
    if($res2==true)
    {
        //Query Executed and Order Saved
        $_SESSION['order'] = "<div class='text-success text-center'>Đặt Thành Công</div>";
         header('location:product.php');
        
    }
    else
    {
        //Failed to Save Order
        $_SESSION['order'] = "<div class='text-error text-center'>Failed to Order Food.</div>";
        // header('location:book.php');
        echo'thất bại';
    }

}

?>





    </div>
</div>
<?php
include 'footer.php';
?>