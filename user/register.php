<?php
    try {
        include "../includes/config.php";
    }catch (Exception $e){
        echo $e->getMessage();
    }

    if(isset($_POST['submit'])){
        $student_id= (int) filter_input(INPUT_POST,'student_id');
        $firstname= filter_input(INPUT_POST,'firstname');
        $lastname= filter_input(INPUT_POST,'lastname');
        $classname= filter_input(INPUT_POST,'classname');
        $username= filter_input(INPUT_POST,'username');
        $password= filter_input(INPUT_POST,'password');
        $password1= filter_input(INPUT_POST,'password1');

//        if(!strcmp($password,$password1)){
//            $msg="Passwords Don't Match";
//            header('location:register.php?msg="$msg"');
//        }

        $sql="INSERT INTO student VALUES ($student_id,'$firstname','$lastname','$classname','$username','$password')";
        $result= $db->query($sql);
        if(!$result){
            die("Query Not successful".$db->error);
        }

        $num_rows= $db->affected_rows;

        if($num_rows>0){
            $success="User ".$username." Added Successfully";
            header('location:register.php?success="$success"');
//            echo "<div class=\"alert alert-danger\">User ".$username." added Successfully</div>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Registration</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
    <?php
        if(isset($_GET['success'])){
            echo "<div class=\"alert alert-success\">User added Successfully</div>";
        }
        if(isset($_GET['msg'])){
            echo "<div class=\"alert alert-danger\">Passwords Don't match</div>";
        }

    ?>

    <form class="form-signin" action="register.php" method="post" enctype="multipart/form-data" >
        <h2 class="form-signin-heading">Student Registration</h2>
        <input type="text" class="form-control" name="student_id" placeholder="Scholar Number" required="required" autofocus />
        <input type="text" class="form-control" name="firstname" placeholder="First Name" required="required" autofocus="" />
        <input type="text" class="form-control" name="lastname" placeholder="Last Name" required="required" autofocus="" />
        <input type="text" class="form-control" name="classname" placeholder="Class Name" required="required" autofocus="" />
        <input type="text" class="form-control" name="username" placeholder="User Name" required="required" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Password" required="required"/>
        <input type="password" class="form-control" name="password1" placeholder="Confirm Password" required="required"/>

        <button class="btn btn-lg btn-primary btn-block" name='submit' type="submit">Register</button>
    </form>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>