<?php
    include "includes/config.php";
//    if(isset($_POST['username'])) {
//        $user = $_POST['username'];
//    }else{
//        echo "Something is wrong";
//    }
    $username=$_SESSION['username'];
    $sql= "SELECT * FROM teacher WHERE username='$username'";
    try{
        $result = $db->query($sql);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    $num_rows= $result->num_rows;
    if($num_rows<0){
        die($db->error);
    }
    $row= $result->fetch_assoc();
?>

<div class="span10">
    <!--Body content-->
    <?php
        if(isset($_GET['msg'])) {
            echo "<div class='alert alert-success pull-left col-lg-offset-3' ><h4>".$_GET['msg']."</h4></div>";
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-2 toppad" >

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title"><?php echo $row['firstname'].' '.$row['lastname']; ?></h3>
                        <div class="col-lg-5  toppad  pull-right col-lg-offset-3 ">
                            <form action="interface/edit_profile.php?user=<?php echo $row['username'];?>" method="post" >
                                <button class="btn btn-success" name="edit" type="submit">Edit Profile</button>
                                <a href="interface/logout.php" ><button class="btn btn-danger" type="button">Log Out</button></a>
                            </form>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/pic.png" class="img-circle img-responsive"> </div>
                            <div class=" col-md-9 col-lg-9">
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>Department:</td>
                                        <td><?php echo $row['dept']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Subject:</td>
                                        <td><?php echo $row['subject']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth:</td>
                                        <td><?php echo $row['dob']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Hire date:</td>
                                        <td><?php echo $row['hire_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></td>
                                    </tr>
                                        <td>Phone Number</td>
                                        <td><?php echo $row['phone']; ?><br></td>
                                    <tr>
                                        <td>Home Address</td>
                                        <td><?php echo $row['address']; ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>