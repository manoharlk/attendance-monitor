<?php
    include('../includes/config.php');

    if (isset($_POST['submit'])) {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        try {
            $sql = "SELECT * FROM student WHERE username='$username' AND password='$password'";
            $result = $db->query($sql);
        }catch (Exception $e){
            echo $e->getMessage();
            die($e->getMessage());
        }
        if(!$result){
            die("Query Not successful".$db->error);
        }
        $count= $result->num_rows;
        $row= $result->fetch_assoc();

        if ($count > 0)
        {
            $_SESSION['username'] = $row['username'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];

            $fname = strtoupper($row['firstname']);
            $lname = strtoupper($row['lastname']);

            $msg = $fname. " " .$fname. " ".$lname. " ". "You have CHECKED-IN.";
            $time= date('Y-m-d h:i:s');
            $_SESSION['login_time']= $time;
            try {
                $sql = "INSERT INTO user_log (username,login_time) VALUES ('$username','$time')";
                $result = $db->query($sql);
            }catch (Exception $e){
                echo $e->getMessage();
            }
            $num_rows= $db->affected_rows;
            if($num_rows>0){
                //$success="User ".$username." Checked In Successfully at".date('d-F-Y g-i-A');
                echo "<div class='alert alert-success'><h3>User ".$username." Checked In Successfully at ".date('d-F-Y g:iA')."</h3></div>";
            }else{
                die("Query Not successful".$db->error);
            }
        }
        else
        {
            ?>
            <?php
            //session_destroy();
            echo "<div class='alert alert-danger alert-dismissable'><h3>Invalid Username or Password</h3></div>";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check In</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
<!--    <div class='alert alert-success'><h3>User --><?php //echo $username; ?><!-- Checked In Successfully </h3></div>-->

    <form action="check_out.php" method="post" >
        <button class="btn btn-lg btn-danger" name='checkout' type="submit">Check Out</button>
    </form>
    <form action="../index.php" method="post" >
        <button class="btn btn-lg btn-primary" name='submit' type="submit">Back to Home</button>
    </form>
</div>
</body>
</html>
