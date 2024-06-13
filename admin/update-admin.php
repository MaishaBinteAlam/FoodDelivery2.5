<?php include('<partials/menu.php'); ?>

<div class= "main-content">
    <div class="wrapper">
        <h1> Update Admin</h1>

        <br><br>

        <?php
        //1. Get the ID of Selected Admin
        $id= $_GET['id'];

        //2. Create SQL Query to Get the Details
        $sql= "SELECT * FROM tbl_admin";

        //Excute the Query
        $res = mysqli_query($conn, $sql);

        //check whether the query is executed or not
        if($res==true)
        {
            //check whether the data is available or not
            $count = mysqli_num_rows($res);
            //check whether we have admin data or not
            if($count==1)
            {
                //Get the Details
                echo "Admin Available";
            }
            else
            {
                //redirect to manage admin page
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }


        ?>

        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type ="text" name= "full_name" value="">
                    </td>
                </tr>

                <tr>
                    <td>Username:</td>
                    <td>
                        <input type="text" name="username" value="">
                    </td>
                </tr>

                <tr>
                    <td colspan="2"> 
                        <input type="submit" name="submit" value="Update Admin" class= "btn-secondary">
                    </td>
                </tr>

            </table>
        </form>

    </div>


</div>
<?php include('<partials/fooer.php'); ?>

