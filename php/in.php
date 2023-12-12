<?php

error_reporting(0);
date_default_timezone_set('Asia/Manila');
    $time = date("h:i A",strtotime("-8 HOURS"));
    $date = date("M-d-Y l",strtotime("-8 HOURS"));
    $times = date("A",strtotime("-8 HOURS"));

include 'db.php';

$action = !isset($_GET['id']) ? 'none' : strtolower($_GET['id']);
switch ($action) {
    case 'id':

    extract($_POST);

        $q_emp = mysqli_query($conn,"SELECT * FROM members WHERE idnumber = '$idscan'") ;
        $belangel=mysqli_fetch_array($q_emp); 
        $rows = mysqli_num_rows($q_emp);
       
        $id = $belangel['memid'];
        $name = $belangel['fullname'];
        $type = $belangel['type'];
        $course = $belangel['course']." ".$belangel['yearlevel'];




        if ($rows < 1) { ?>

                 <div class="alert alert-dismissible"><br><br>
                  <center><i class="icon fa fa-ban text-danger" style="font-size: 5em" ></i></center>
                  <p style="font-size: 2em;text-align:center; ">No Match found!!!</p>
                  <embed src="beep.mp3" style="visibility:hidden">
                  
                </div>
 
        <?php }
        else{

            if ($belangel['action']=="OFFLINE") {
                 mysqli_query($conn, "UPDATE members set action = 'ONLINE' where idnumber = '$idscan' ");
                 mysqli_query($conn,"INSERT INTO `log` VALUES('','$id','$idscan','$date','$time','','$name','$course','$type')");  ?>
               <!--   //echo 2; // intering in -->

                
                 <div class="alert alert-dismissible">
                  <br><br>
                  <center><i class="icon fa fa-check text-success" style="font-size: 5em" ></i></center>
                  <p style="font-size: 2em;text-align:center; ">Welcome!!!</p>
                  <embed src="beep.mp3" style="visibility:hidden">

                    <div>
                      <a href="admin/memprocess.php?key=<?php echo $belangel['idnumber']; ?>" class="btn btn-primary">Borrow</a>
                       <a href="admin/memreturn.php?key=<?php echo $belangel['idnumber']; ?>" class="btn btn-primary">Return</a>
                    </div>
                  
                </div>
                     


            <?php }
            else if ($belangel['action']=="ONLINE") {
                $sql = mysqli_query($conn, "SELECT * from `log` where idnumber = '$idscan' order by logid desc limit 1  ");
                $row = mysqli_fetch_array($sql);
                    $lastid = $row['logid'];
                    $lastdate = $row['date'];

                        if ($lastdate <> $date) { 
                            mysqli_query($conn, "INSERT into `log` values ('','$id','$idscan','$date','$time','','$name','$course','$type')");
                            //echo 2; intering in// ?>
                               
                              <div class="alert alert-dismissible">
                                <br><br>
                              <center><i class="icon fa fa-check text-success" style="font-size: 5em" ></i></center>
                              <p style="font-size: 2em;text-align:center; ">Welcome!!!</p>
                              <embed src="beep.mp3" style="visibility:hidden">
                    <div>
                      <a href="admin/memprocess.php?key=<?php echo $belangel['idnumber']; ?>" class="btn btn-primary">Borrow</a>
                       <a href="admin/memreturn.php?key=<?php echo $belangel['idnumber']; ?>" class="btn btn-primary">Return</a>
                    </div>
                  
                              </div>
                       <?php  }
                        else{

                            mysqli_query($conn, "UPDATE members SET action = 'OFFLINE' WHERE idnumber = '$idscan'");
                            mysqli_query($conn, "UPDATE `log` SET timeout = '$time' WHERE  idnumber = '$idscan' and  date = '$date' and logid =  '$lastid' ");

                            //echo 3; // exiting 
                            ?>

                            <div class="alert alert-dismissible">
                              <br><br>
                              <center><i class="icon fa fa-times text-danger" style="font-size: 5em" ></i></center>
                              <p style="font-size: 2em;text-align:center; ">Bye!!!</p>
                              <embed src="beep.mp3" style="visibility:hidden">
                              
                            </div>

                                     
                       <?php }
            }
            else{
            }
        }
                
    break;
    default:
    break;
}

?>                 
                        
      