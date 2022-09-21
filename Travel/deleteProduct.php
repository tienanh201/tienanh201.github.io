<?php
ob_start();
include "header.php";
include "config.php";

if(isset($_GET["id"])){


$id = $_GET["id"];
$sql ="DELETE FROM tdl_book WHERE book_id =$id";
$result = mysqli_query($conn,$sql);

if($result==true){
  
    header("Location: product.php");
    
}
else{
    $_SESSION['delete'] = "<div class='text-danger'>Xóa Thất Bại.</div>";
    header("Location:product.php");

}
}
mysqli_close($conn);
?>