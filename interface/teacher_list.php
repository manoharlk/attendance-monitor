<?php
    include "../includes/config.php";

    $sql= "SELECT * FROM teacher";
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
    include "includes/navbar_t.php";
?>

<div class="span10">
    <!--Body content-->
     <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-2 toppad" >

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h2 class="panel-title">List of all the Teachers</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class=" col-md-9 col-lg-9">
                                <table class="table table-bordered">
                                    <caption></caption>
                                    <thead>
                                    <tr>
                                        <th>Teacher ID</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Subject</th>
                                        <th>Username</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php while($row=$result->fetch_assoc()) :?>
                                    <tr>
                                        <td><?php echo $row['teacher_id']; ?></td>
                                        <td><?php echo $row['firstname'].' '.$row['lastname']; ?></td>
                                        <td><?php echo $row['dept']; ?></td>
                                        <td><?php echo $row['subject']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
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