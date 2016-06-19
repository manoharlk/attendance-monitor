<?php
include "includes/config.php";
session_start();

if(isset($_POST['login'])){
   //global $username;
    $username= $_POST['username'];
    $password= $_POST['password'];

    $sql= "SELECT * FROM teacher WHERE username='$username' AND password='$password'";
    $user = $db->query($sql);

    $num_rows = $db->affected_rows;
    if($num_rows>0){

        $_SESSION['username']=$username;
        $_SESSION['msg']='Successfully Logged In';
        header("location:interface.php?msg='Successfully Logged In'");
    }
    else{
        session_destroy();
        header("location:index.php?msg='Password or Username is not correct'");
        echo "<script>alert('Password or Username is not correct')</script>";
    }

}
?>

<?php
    if(isset($_SESSION['username'])) {
        include "interface/includes/header.php";
        include "interface/includes/navbar.php";
        include "interface/includes/profile.php";

        include "interface/includes/footer.php";
    }else{
        header('location:index.php');
    }

?>
