<?php
include "header.php";
include "config.php";
?>

<div class="main-content">
    <div class="container">
        <h1>Update Admin</h1>

        <br><br>
        <!-- Lấy dữ liệu từ sql -->
        <?php 
            //1. Get the ID of Selected Admin
            $id=$_GET['id'];

            //2. Create SQL Query to Get the Details
            $sql="SELECT * FROM tdl_users WHERE user_id=$id";

            //Execute the Query
            $res=mysqli_query($conn, $sql);

            //Check whether the query is executed or not
            if($res==true)
            {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if($count==1)
                {
                    // Get the Details
                    //echo "Admin Available";
                    $row=mysqli_fetch_assoc($res);

                    $username = $row['user_acc'];
                    $email = $row['user_email'];
                   
                }
                else
                {
                    //Redirect to Manage Admin PAge
                    header('location:manage-admin.php');
                }
            }
        
        ?>
        <!-- TẠO FORM -->
        <form action="" method="POST">

            <table class="tbl-30">

                <div class="row">
                    <div class="col-md-2">
                        <label for="username">UserName</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                    </div>
                </div>



                <!--  -->
                <div class="row">
                    <div class="col-md-2">
                        <label for="userMail">Email</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="userMail" value="<?php echo $email; ?>">
                    </div>
                </div>
                <!--  -->
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn btn-secondary">
                    </td>
                </tr>

            </table>

        </form>
        <!-- END FORM -->
    </div>
</div>
<!-- Xử Lý về SQL -->
<?php 
        
    //Check whether the Submit Button is Clicked or not
    if(isset($_POST['submit']))
    {
        //echo "Button CLicked";
        //Get all the values from form to update
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['userMail'];
       

        //Create a SQL Query to Update Admin
        $sql = "UPDATE tdl_users SET
        user_acc = '$username',
        user_email = '$email'
        WHERE user_id='$id'
        ";

        //Execute the Query
        $res = mysqli_query($conn, $sql);

        //Check whether the query executed successfully or not
        if($res==true)
        {
            //Query Executed and Admin Updated
            $_SESSION['update'] = "<div class='text-success'>Cập Nhật Thành Công</div>";
            //Redirect to Manage Admin Page
            header('location: user.php');
        }
        else
        {
            //Failed to Update Admin
            $_SESSION['update'] = "<div class='text-error'>Cập Nhật Thất Bại</div>";
            //Redirect to Manage Admin Page
            header('location: user.php');
        }
    }

?>