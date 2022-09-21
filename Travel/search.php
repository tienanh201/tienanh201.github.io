<?php
include 'header.php';
include 'config.php';
?>





<?php
                $search = mysqli_real_escape_string($conn, $_POST['search']);
                            

    ?>
<div class="search_title">


    <h2 class="search_heading">Kết Quả Tìm Kiếm <a href="#" class="text-black">"<?php echo $search; ?>"</a></h2>
</div>
<div class="container">
    <div class="row">
        <?php
                        // b1
                        
                        // b2: câu lệnh truy vấn
                        $sql = "SELECT * FROM tdl_tour WHERE tour_name LIKE '%$search%'";

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
                           
                        
                        ?>

        <div class="col-lg-4">
            <div class="package__item-search">
                <?php 
                                //Check whether image available or not
                                if($tour_picture == "")
                                {
                                    //Image not Available
                                    echo "<div class='error'>Image not available.</div>";
                                }
                                else
                                {
                                    //Image Available
                                    ?>
                <a href="book_mumbai.php?id=<?php echo $tour_id;?>">
                    <img src="img/<?php echo $tour_picture; ?>"  class=" img-curve"
                        style="width:100%">
                </a>
                <?php
                                }
                            ?>


                <div class="package__item-content">
                    <h3 class="package__item-heading">

                        <i class="package__item-heading-icon fas fa-map-marker-alt"></i>
                        <?php echo $tour_name ?>
                    </h3>


                    <div class="package__item-price">

                        <span class="package__item-price1"><i
                                class="far fa-money-bill-alt"></i><?php echo $price_package ?></span>
                                <a href="book.php?id=<?php echo $tour_id;?>"><input class="button" type="submit"
                                        value="Đặt Ngay"></a>

                    </div>
                </div>
            </div>




            <?php
            }}
            else
                        {
                            //Food Not Available
                            echo "<div class='error'style='font-size:30px; text-align:center'>Không Có Địa Điểm Hợp Lệ</div>";
                        }             
        ?>
        </div>

    </div>


</div>
<?php
include 'footer.php';
?>