<?php

include "header.php";
?>

<div class="app">
    <div class="slider">
        <form action="search.php" class="slider__content" method="POST">


            <input type="text" class="nav__searchbar-input" name="search" placeholder="Tìm kiếm..." required>
            <button class="btnsearch" name="submit" value="search"><i class=" fas fa-search"></i></button>



        </form>

    </div>
    <!-- book -->

    <!-- Packages -->
    <div class="section">
        <div id="dulich" class="container">

            <h1 class="section__heading">
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
                            <img src="img/<?php echo $tour_picture; ?>" class=" img-curve" style="width:100%;max-height: 285
px
;">
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

    <!-- Services -->

    <!-- gallery -->
    <div class="section">
        <div class="container">
            <h1 class="section__heading">
                <span class="letter">K</span>
                <span class="letter">H</span>
                <span class="letter">O</span>
                <span class="letter">Ả</span>
                <span class="letter">N</span>
                <span class="letter">H</span>
                <span class="letter">K</span>
                <span class="letter">H</span>
                <span class="letter">Ắ</span>
                <span class="letter">C</span>



            </h1>
            <div id="gallery" class="gallery-now row">
                <!-- img1 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom1.jpg" alt="" class="gallery-img">

                    </div>
                </div>
                <!-- img2 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom2.jpg" alt="" class="gallery-img">

                    </div>
                </div>
                <!-- img3 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom3.jpg" alt="" class="gallery-img">

                    </div>
                </div>
                <!-- img4 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom4.jpg" alt="" class="gallery-img">

                    </div>
                </div>
                <!-- img5 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom5.jpg" alt="" class="gallery-img">

                    </div>
                </div>
                <!-- img6 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom6.jpg" alt="" class="gallery-img">

                    </div>
                </div>
                <!-- img7 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom7.jpg" alt="" class="gallery-img">

                    </div>
                </div>
                <!-- img8 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom8.jpg" alt="" class="gallery-img">

                    </div>
                </div>
                <!-- img9 -->
                <div class="gallery col-lg-4 col-md-6 col-12">
                    <div class="gallery__item">
                        <img src="img/kknhom1.jpg" alt="" class="gallery-img">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- book -->

    <!-- Review -->
    <div class="section">
        <div class="container">
            <h1 class="section__heading">
                <span class="letter">G</span>
                <span class="letter">I</span>
                <span class="letter">Ớ</span>
                <span class="letter">I</span>
                <span class="letter">T</span>
                <span class="letter">H</span>
                <span class="letter">I</span>
                <span class="letter">Ệ</span>
                <span class="letter">U</span>

            </h1>
            <div id="review" class="review-now row">
                <!-- img1 -->
                <div class="review col-lg-4 col-md-4 col-12">
                    <div class="review__item">
                        <img src="img/pic1.png" alt="" class="review-img">
                        <h3 class="review__item-heading">Tatiana</h3>
                        <p class="review__item-text">Phần tuyệt vời nhất của chuyến đi là 5 ngày đi bộ đường dài lên
                            chòi - trong một góc nhìn - sông băng, đỉnh núi phủ đầy tuyết, vịnh hẹp, đồng cỏ hoa dại,
                            thác nước đổ ầm ầm, sông suối sủi bọt - và, ngoại trừ nước và chim, cả hai đều tạo ra âm
                            thanh thú vị, một sự yên tĩnh tuyệt vời.
                        </p>
                        
                    </div>
                </div>
                <!-- img2 -->
                <div class="review col-lg-4 col-md-4 col-12">
                    <div class="review__item">
                        <img src="img/pic2.1.jfif" alt="" class="review-img">
                        <h3 class="review__item-heading">Ronaldo</h3>
                        <p class="review__item-text">Tôi đã có một thời gian tuyệt vời. Tôi yêu hướng dẫn viên của chúng
                            tôi - anh ấy rất hiểu biết, quan tâm, theo dõi mọi người và giao tiếp tốt. Và nước máy sạch!
                            Tôi nghĩ cả nhóm cũng quan tâm đến nhau.
                        </p>
                        
                    </div>
                </div>
                <!-- img3 -->
                <div class="review col-lg-4 col-md-4 col-12">
                    <div class="review__item">
                        <img src="img/pic3.png" alt="" class="review-img">
                        <h3 class="review__item-heading">Michelle</h3>
                        <p class="review__item-text">Việt Nam có một cảnh quan kỳ diệu và những con người ấm áp và thân
                            thiện, những người rõ ràng yêu và muốn quan tâm đến môi trường mà họ chia sẻ như ngôi nhà
                            của họ. Đi bộ đường dài là khó nhưng oh rất đáng giá. Hầu hết thời gian chúng tôi đi trên
                            những con đường mòn chỉ có cừu, không phải người thường lui tới, vì vậy bạn thực sự đã giành
                            được điểm tham quan của chuyến đi. Thora là người hướng dẫn tuyệt vời nhất. Tình yêu của cô
                            ấy đối với đất nước của mình và tất cả những gì nó mang lại tỏa sáng qua nụ cười và kiến
                            ​​thức của cô ấy.
                        </p>
                        <!-- <div class="package__item-rate">
                            <i class="package__item-star fas fa-star"></i>
                            <i class="package__item-star fas fa-star"></i>
                            <i class="package__item-star fas fa-star"></i>
                            <i class="package__item-star fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact -->

</div>


<!-- Footer -->
<?php


include "footer.php";
  ?>