<?php include('partials/menu.php') ?>




    <!-- Main Content Section Starts -->
    <div class="main-content">
    <div class="wrapper">
        <h1>Manage Admin</h1>
        <br/><br/><br/>

        <?php
         if(isset($_SESSION['add']))

        {
            echo $_SESSION['add']; //Displaying Session Message
            unset($_SESSION['add']); //Removing Session Message
        }

        if(isset($_SESSION['delete']))
        {
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
        }


        ?>

    <br><br><br>

        <!--- Button to Add Admin---->
        <a href ="add-admin.php" class="btn-primary">Add Admin</a>

        <br/><br/></br>

        <table class= "tbl-full">
            <tr>
                <th>S.N</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>

            <?php 
             $sql = "SELECT * FROM tbl_admin";
             //Execute the Query
             $res = mysqli_query($conn, $sql);

             //check whether the Query is Executed or Not
             if($res==TRUE)
             {
                //count Rows to check whwther we have data in database or not
                $count = mysqli_num_rows($res); //Function to get all the rows in database

                $sn=1; //Create a Variable and Assign the value 

                //check the num of rows
                if($count>0)
                {
                    //we have data in database
                    while($rows =mysqli_fetch_assoc($res))
                    {
                        //using while loop to get all the data drom database
                        //and using while loop will run as long as we have data in database

                        //get invidividual data
                        $id =$rows['id'];
                        $full_name = $rows['full_name'];
                        $username = $rows ['username'];

                        //display the values in our table 

                        ?>
                             <tr>
                            <td><?php echo $sn++; ?>.</td>
                            <td><?php echo $full_name;?></td>
                            <td><?php echo $username ?></td>
                        <td>
                            <a href="<?php echo SITEURL; ?> admin/update-admin.php?id <?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                            <a href="<?php echo SITEURL; ?> admin/delete-admin.php?id <?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                        </td>
                              </tr>
                        <?php

                    }
                }
                else{
                    //we do not have data in database
                }
             }
            ?>

            
        </table>
</div>
</div>
        
    <!-- Main Content Section Ends -->

    <?php include('partials/footer.php'); ?>