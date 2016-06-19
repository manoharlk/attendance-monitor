<?php
    session_start();
?>


<?php
include "../includes/config.php";

if(isset($_POST['login'])){
    $username= $_POST['username'];
    $password= $_POST['password'];

    $sql= "SELECT * FROM teacher WHERE username='$username' AND password='$password'";
    $user = $db->query($sql);

    $num_rows = $db->affected_rows;
    if($num_rows>0){
        $_SESSION['username']=$username;
        header("location:../interface.php?msg='Successfully Logged In'");
    }
    else{
        echo "<script>alert('Password or Username is not correct')</script>";
    }

}
