<?php
    include "../includes/config.php";

    $sql= "SELECT * FROM user_log";
    try{
        $result = $db->query($sql);
    }catch(Exception $e){
        echo $e->getMessage();
    }
    $num_rows= $result->num_rows;
    if($num_rows<0){
        die($db->error);
    }

?>
<?php
    include "includes/header_list.php";
    include "includes/navbar_a.php";
?>

<div class="span10">
    <!--Body content-->
     <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-2 toppad" >

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2 class="panel-title">List of all the Attendance Check-In's</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-md-9 col-lg-9">
                                <table class="table table-bordered">
                                    <caption></caption>
                                    <thead>
                                    <tr>
                                        <th>User Log_ID</th>
                                        <th>Scholar No</th>
                                        <th>UserName</th>
                                        <th>Name</th>
                                        <th>Check In Time</th>
                                        <th>Check Out TIme</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row=$result->fetch_assoc()) :?>
                                    <?php
                                        $username= $row['username'];
                                        $sql1= "SELECT * FROM student WHERE username='$username'";
                                        try{
                                            $result1 = $db->query($sql1);
                                        }catch(Exception $e){
                                            echo $e->getMessage();
                                        }
                                        $num_row= $result1->num_rows;
                                        if($num_row<0){
                                            die($db->error);
                                        }
                                        $user= $result1->fetch_assoc();
                                        $scholarno = $user['student_id'];
                                        $firstname= $user['firstname'];
                                        $lastname= $user['lastname'];
                                    ?>
                                    <tr>
                                        <td><?php echo $row['user_log_id']; ?></td>
                                        <td><?php echo $scholarno; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $firstname.' '.$lastname; ?></td>
                                        <td><?php echo $row['login_time']; ?></td>
                                        <td><?php echo $row['logout_time']; ?></td>
                                    </tr>
                                    <?php endwhile; ?>
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
<?php
    include "includes/footer.php";
?>