<?php

error_reporting(0);
date_default_timezone_set('Asia/Manila');
    $time = date("h:i A",strtotime("-8 HOURS"));
    $date = date("M-d-Y l",strtotime("-8 HOURS"));
    $times = date("A",strtotime("-8 HOURS"));

include 'db.php';

if (isset($_POST['submit'])) {

        $idNum = $_POST['idNum'];
        

        $q_emp = mysqli_query($conn,"SELECT * FROM members WHERE idnumber = '$idNum'") ;
        $belangel=mysqli_fetch_array($q_emp); 
        $rows = mysqli_num_rows($q_emp);
       
        $id = $belangel['memid'];
        $name = $belangel['fullname'];
        $type = $belangel['type'];
        $course = $belangel['course']." ".$belangel['yearlevel'];

        if ($rows < 1) { 
            $msg = "<div class='alert alert-dismissible'><br><br><center><i class='icon fa fa-ban text-danger' style='font-size: 5em' ></i></center><p style='font-size: 2em;text-align:center;  color:white '>No Match found!!!</p><embed src='beep.mp3' style='visibility:hidden'></div>";
            header("location: ../userIn/input_id.php?message=$msg");
        }
        else{

            if ($belangel['action']=="OFFLINE") {
                 mysqli_query($conn, "UPDATE members set action = 'ONLINE' where idnumber = '$idNum' ") or die("failed");
                 mysqli_query($conn, "INSERT into `log`(`memid`, `idnumber`, `date`, `timein`, `timeout`, `fullname`, `course`, `type`) values ('$id','$idNum','$date','$time','','$name','$course','$type')") or die("failed") or die("query failed");
                
                 $msg = "<div class='alert alert-dismissible'><br><br><center><i class='icon fa fa-check text-success' style='font-size: 5em'></i></center><p style='font-size: 3em; text-align:center; color: white'>Welcome!!!</p><embed src='beep.mp3' style='visibility:hidden'></div>";
                 header("location: ../userIn/input_id.php?message=$msg");    
            }
            else if ($belangel['action']=="ONLINE") {
                    $sql = mysqli_query($conn, "SELECT * from `log` where idnumber = '$idNum' order by logid desc limit 1  ");
                    $row = mysqli_fetch_array($sql);
                    $lastid = $row['logid'];
                    $lastdate = $row['date'];

                        if ($lastdate != $date) { 
                            mysqli_query($conn, "UPDATE members SET action = 'ONLINE' WHERE idnumber = '$idNum'");
                            mysqli_query($conn, "INSERT into `log`(`memid`, `idnumber`, `date`, `timein`, `timeout`, `fullname`, `course`, `type`) values ('$id','$idNum','$date','$time','','$name','$course','$type')") or die("failed");
                               
                            $msg = "<div class='alert alert-dismissible'><br><br><center><i class='icon fa fa-check text-success' style='font-size: 5em' ></i></center><p style='font-size: 3em; text-align:center; color:white '>Welcome!!!</p><embed src='beep.mp3' style='visibility:hidden'></div>";
                            header("location: ../userIn/input_id.php?message=$msg");
                       }
                        else{

                            mysqli_query($conn, "UPDATE members SET action = 'OFFLINE' WHERE idnumber = '$idNum'");
                            mysqli_query($conn, "UPDATE `log` SET timeout = '$time' WHERE  idnumber = '$idNum' and  date = '$date' and logid =  '$lastid' ");

                            $msg = "<div class='alert alert-dismissible'><br><br><center><i class='icon fa fa-times text-danger' style='font-size: 5em' ></i></center><p style='font-size: 3em;text-align:center; color:white '>Bye!!!</p><embed src='beep.mp3' style='visibility:hidden'></div>";
                            header("location: ../userIn/input_id.php?message=$msg");
                        }
            }
            else{
            }
        }
                
} else{

}

?>                 
                        
      