<?php
include('../includes/config.php');

if (isset($_POST['submit'])) {
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    if($_SESSION['username']=$username){
        try {
            $time= date('Y-m-d h:i:s');
            $sql = "UPDATE user_log SET logout_time='$time'  WHERE username='$username'";
            $result = $db->query($sql);
        }catch (Exception $e){
            echo $e->getMessage();
            die($e->getMessage());
        }
    }

    if(!$result){
        die("Query Not successful".$db->error);
    }
    $count = $db->affected_rows;
    if ($count > 0) {
//        echo "<div class='alert alert-success'>User " . $username . " Checked Out Successfully </div>";
//        echo "<h3>Your Check Out Time: ".$time."</h3>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Check Out</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="wrapper">
    <div class='alert alert-success'><h3>User <?php echo $username; ?> Checked Out Successfully </h3></div>

    <form action="../index.php" method="post" >
        <button class="btn btn-lg btn-primary" name='submit' type="submit">Back to Home</button>
    </form>
</div>
</body>
</html>