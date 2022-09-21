<?php
include "header.php";
include "config.php";
?>


<!-- header -->
<?php
                        // b1
                        
                        // b2: câu lệnh truy vấn
                        $id_index = $_GET['id'];
                        
                        $sql = "SELECT * FROM tdl_tour WHERE tour_id=$id_index";
                        $result = mysqli_query($conn,$sql);
                        // b3: ktra
                        if(mysqli_num_rows($result)>0){
                            // chọc vào kết quả và lấy từng bản ghi
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $tour_id = $row['tour_id'];
                                $tour_name = $row['tour_name'];
                                $price_package = $row['price_package'];
                                $tour_picture = $row['tour_picture'];
                                $tour_info = $row['tour_info'];
                                $tour_hotel = $row['tour_hotel'];
                                $tour_menu = $row['tour_menu'];
                                $tour_address = $row['tour_address'];
                                $info_title = $row['info_title'];
                               
                               
                            }
                        }
                        ?>


<div class="details">

    <div class="blog-heading">

        <img src="img/blog.jpg" alt="Du Lịch Phú Quốc: Combo Vinpearl Discovery Phú Quốc + Vé Máy Bay Vietnam Airlines"
            style="width: 100%;">
    </div>
    <div class="blog-title">

        <h1 style="font-size:30px"><?php echo $tour_name; ?> : <?php echo  $info_title; ?></h1>

    </div>
    <div class="title_link" style="padding:10px 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 style="padding:8px 0"><a href="index.php">Trang Chủ </a> / <span style="font-size:14px;color:#ccc"><?php echo $tour_name; ?> : <?php echo  $info_title; ?></span></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="details_wrap">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 ">
                    <div class="mumbai_img">


                        <div class="book_heading1">


                            <h3><i class="fas fa-images"></i></i>HÌNH ẢNH</h3>
                        </div>
                        <div class="details_img">

                            <?php 
                                //Check whether image available or not
                                if ($tour_picture == "") {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                } else {
                                    //Image Available
                                ?>



                            <img src="img/<?php echo $tour_picture; ?>" class=" img-curve" style="width:100%">

                            <?php
                                }
                            ?>

                        </div>
                        <div class="details_text">
                            <h1 class="details_title"><?php echo $tour_name; ?></h1>
                            <!-- <div class="price" style="color:red; font-size:20px"><i class="far fa-money-bill-alt"
                                    style="color:#333"></i>
                                <?php echo $price_package; ?>
                            </div> -->

                            <p class="details_p">
                                <?php
                                echo $tour_info;
                                ?>
                            </p>
                            <div class="package__item-price">

                                <span class="package__item-price3"><i
                                        class="far fa-money-bill-alt"></i><?php echo $price_package ?></span>

                                <a href="book.php?id=<?php echo $tour_id;?>"><input class="button" type="submit"
                                        value="Đặt Ngay"></a>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4">
                    <div class="tour-info">


                        <div class="book_heading1">
                            <h3><i class="fas fa-images"></i></i>THÔNG TIN TOUR</h3>
                        </div>
                        <div class="panel-body">
                            <p class="sign">
                                <strong> <i class="fas fa-map-signs"></i> <?php echo $tour_name; ?> :
                                    <?php echo  $info_title; ?>
                                </strong>
                            </p>
                            <p class="sign">
                                <strong>Mã tour: BTTDVNPQHCM28102119P
                                </strong>
                            </p>
                            <p class="sign">
                                <strong><i class="fas fa-clock"></i> Ngày Khởi Hành: 10/11/2021
                                </strong>
                            </p>
                            <p class="sign">
                                <strong><i class="fas fa-plane-departure"></i> Phương tiện :Máy bay
                                </strong>
                            </p>
                            <p class="sign">
                                <strong><i class="fas fa-flag"></i> Khởi hành tại Hồ Chí Minh
                                </strong>
                            </p>
                        </div>
                        <div class="panel-footer">
                            <a href=""> <i class="fas fa-phone-alt"></i> 1900 6688</a>

                        </div>


                    </div>
                </div>









            </div>

        </div>
    </div>

</div>
<div class="container">

    <div class="row">


        <h1 class="mumbai_heading">Các Dịch Vụ Đi Kèm</h1>
        <div class="col-lg-4">

            <img src="img/<?php echo $tour_hotel; ?>" style="width:100%; height:320px;    border-radius: 10px;">
            <h3 style="text-align:center; padding-top:20px; font-size:20px;">Khách Sạn</h3>

        </div>
        <div class="col-lg-4">

            <img src="img/<?php echo $tour_menu; ?>" style="width:100%;height:320px;    border-radius: 10px;">
            <h3 style="text-align:center; padding-top:20px; font-size:20px">Ẩm Thực</h3>


        </div>
        <div class="col-lg-4">
            <img src="img/<?php echo $tour_address; ?>" style="width:100%;height:320px;    border-radius: 10px;">
            <h3 style="text-align:center; padding-top:20px; font-size:20px">Địa Điểm Du Lịch</h3>

        </div>

    </div>
</div>



<?php
    include "footer.php";
    ?>