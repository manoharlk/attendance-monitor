<?php
    include "includes/header_list.php";
    include "includes/navbar_e.php";
?>

<?php
    include "../includes/config.php";
    if(isset($_GET['user'])) {
        $username = $_GET['user'];
        //die($username);
        $sql= "SELECT * FROM teacher WHERE username='$username'";
        try{
            $result = $db->query($sql);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        $num_row= $result->num_rows;
        if($num_row<0){
            die($db->error);
        }
        $row= $result->fetch_assoc();
    }
    else{
        echo "Something is wrong";
    }


    if(isset($_POST['submit'])){
        $firstname= filter_input(INPUT_POST,'firstname');
        $lastname= filter_input(INPUT_POST,'lastname');
        $dept= filter_input(INPUT_POST,'dept');
        $subject= filter_input(INPUT_POST,'subject');
        $gender= filter_input(INPUT_POST,'gender');
        $dob= filter_input(INPUT_POST,'dob');
        $hire_date= filter_input(INPUT_POST,'hire_date');
        $email= filter_input(INPUT_POST,'email');
        $phone= filter_input(INPUT_POST,'phone');
        $address= filter_input(INPUT_POST,'address');

        $sql1="UPDATE teacher SET firstname='$firstname',lastname='$lastname',
              dept='$dept',subject='$subject',gender='$gender',dob='$dob',hire_date='$hire_date',
              email='$email',phone='$phone',address='$address' WHERE username='$username'";
        $result1= $db->query($sql1);
        if(!$result1){
            die("Query Not successful".$db->error);
        }
        $num_rows= $db->affected_rows;
        if($num_rows>0){
            $success="User ".$username." Updated Successfully";

//            $parent = dirname($_SERVER['REQUEST_URL']);
//            header("location: $parent/interface.php?user=$username&msg=$success");
            header('location:edit_profile.php?user=$username&msg=$success');
        }
    }

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
                        <h2 class="panel-title">Edit your profile</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="images/pic.png" class="img-circle img-responsive"> </div>
                            <div class=" col-md-9 col-lg-9">
                                <table class="table table-user-information">
                                <form action="edit_profile.php?user=<?php echo $username;?>" method="post" >
                                    <tbody>
                                    <tr>
                                        <td>First Name:</td>
                                        <td><input type="text" class="form-control"
                                         name="firstname" value="<?php echo $row['firstname']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Last Name:</td>
                                        <td><input type="text" class="form-control"
                                         name="lastname" value="<?php echo $row['lastname']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Department:</td>
                                        <td><input type="text" class="form-control"
                                         name="dept" value="<?php echo $row['dept']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Subject:</td>
                                        <td><input type="text" class="form-control"
                                         name="subject" value="<?php echo $row['subject']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Gender:</td>
                                        <td><input type="text" class="form-control"
                                         name="gender" value="<?php echo $row['gender']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Date of Birth:</td>
                                        <td><input type="text" class="form-control"
                                         name="dob" value="<?php echo $row['dob']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Hire date:</td>
                                        <td><input type="text" class="form-control"
                                         name="hire_date" value="<?php echo $row['hire_date']; ?>"/></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="text" class="form-control"
                                         name="email" value="<?php echo $row['email']; ?>"/></td>
                                    </tr>
                                        <td>Phone Number</td>
                                        <td><input type="text" class="form-control"
                                         name="phone" value="<?php echo $row['phone']; ?>"/></td>
                                    <tr>
                                        <td>Home Address</td>
                                        <td><input type="text" class="form-control"
                                         name="address" value="<?php echo $row['address']; ?>"/></td>
                                    </tr>
                                    </tbody>
                                    </table>
                                    <button class="btn btn-lg btn-primary btn-block"
                                     name='submit' type="submit">Update</button>
                                </form>

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

<?php
    include "includes/footer.php";
?>