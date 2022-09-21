<?php
include 'header.php';
?>

<div class="app">

</div>

<div class="section">
        <div class="container">

            <h1 class="section__heading"style="padding-top:100px">
                <span class="letter">Đ</span>
                <span class="letter">I</span>
                <span class="letter">Ể</span>
                <span class="letter">M</span>


                <span class="letter">Đ</span>
                <span class="letter">Ế</span>
                <span class="letter">N</span>

                <span class="letter">H</span>
                <span class="letter">Ấ</span>
                <span class="letter">P</span>

                <span class="letter">D</span>
                <span class="letter">Ẫ</span>
                <span class="letter">N</span>


            </h1>



            <!-- img1-------------------------------------------- -->
            <!-- mục tiêu lấy data từ sql hết -->
            <div class="row">
                <?php
                        // b1
                        include 'config.php';
                        // b2: câu lệnh truy vấn
                      

                        $sql = "SELECT * FROM tdl_tour ";
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
                                // $book_id = $row['book_id'];
                           
                        ?>

                <div class="packages col-lg-4">
                    <div class="package__item">


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
                        <a href="book_mumbai.php?id=<?php echo $tour_id;?>">
                            <img src="img/<?php echo $tour_picture; ?>" class=" img-curve" style="width:100%;max-height: 285px;">
                        </a>

                        <?php
                                }
                              ?>


                        <div class="package__item-content">
                            <h3 class="package__item-heading">
                                <a href="book_mumbai.php?id=<?php echo $tour_id;?>" style="color:#333">
                                    <i class="package__item-heading-icon fas fa-map-marker-alt"></i>
                                    <?php echo $tour_name ?>
                                </a>
                            </h3>


                            <div class="package__item-price">

                                <span class="package__item-price1"><i
                                        class="far fa-money-bill-alt"></i><?php echo $price_package ?></span>
                                <!-- bổ xung là mình cần lấy đc cái book_id -->
                                <a href="book.php?id=<?php echo $tour_id;?>"><input class="button" type="submit"
                                        value="Đặt Ngay"></a>

                            </div>
                        </div>

                    </div>
                </div>

                <?php
                            }
                        }
                        
             ?>
            </div>






        </div>

    </div>





<?php
include 'footer.php';
?>