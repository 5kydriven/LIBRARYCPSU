<?php

include 'db.php';

date_default_timezone_set('Asia/Manila');


$bookid = $_GET['bookid'];
$memid = $_GET['memid'];
$pkey = $_GET['pkey'];

$mem = mysqli_query($conn, "SELECT * from members where memid = '$pkey'");
$memnu = mysqli_fetch_array($mem);


$sqll = mysqli_query($conn,"SELECT * from allowable");
$roww = mysqli_fetch_array($sqll);
$daysallow = $roww['allowdays'];
$booksallow = $roww['allowbooks'];


$date = date("Y-m-d",strtotime("-8 HOURS"));
$allowabledays = $daysallow;
$duedate = date("Y-m-d", strtotime("+$allowabledays days"));


$sql = mysqli_query($conn,"SELECT * from books where bookid='$bookid'");
$row = mysqli_fetch_array($sql);
$title = $row['title'];




if ($row['copies']<1) {

               header('location:../admin/process.php?key='.$memid.'');

}

else{

	$a = mysqli_query($conn,"SELECT * from bookstatus where memid = '$pkey' and status = 'borrowed' ");
	$stat = mysqli_fetch_array($a);
	$aa = mysqli_num_rows($a);
	

	if ($aa == $booksallow) {
		 header('location:../admin/process.php?key='.$memid.'');
	}
	else{

		

		$copies = $row['copies']-1;

		mysqli_query($conn, "UPDATE books set copies = '$copies' where bookid = '$bookid'");

		$insert = mysqli_query($conn, "INSERT into bookstatus (booksid,memid,borrowed,returned,duedate,status,penalty) values ('$bookid','$pkey','$date','','$duedate','borrowed','no penalty')");

		mysqli_query($conn,"INSERT into reports (fullname,title,task,transactiondate) values ('$pkey','$bookid','borrowed book','$date')");

		$ses = mysqli_query($conn,"SELECT * from api");
		$sesres = mysqli_fetch_array($ses);

		$codes = $sesres['code'];
		$passs = $sesres['pass'];

	

		$sendto = "0".$memnu['number'];
		$sms = "Title: ".$title.", Borrowed date: ".$date.", Due date: ".$duedate;  


		$api =$codes;
		$apipass =$passs;


						//##########################################################################
						// ITEXMO SEND SMS API - PHP - CURL-LESS METHOD
						// Visit www.itexmo.com/developers.php for more info about this API
						//##########################################################################
						function itexmo($number,$message,$apicode,$passwd){
						$url = 'https://www.itexmo.com/php_api/api.php';
						$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
						$param = array(
						'http' => array(
						'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
						'method'  => 'POST',
						'content' => http_build_query($itexmo),
						),
						);
						$context  = stream_context_create($param);
						return file_get_contents($url, false, $context);
						}
						//##########################################################################


						$result = itexmo($sendto,$sms,$api, $apipass);
						if ($result == ""){
						echo "iTexMo: No response from server!!!
						Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
						Please CONTACT US for help. ";	
						}else if ($result == 0){
						echo "Message Sent!";
						}
						else{	
						echo "Error Num ". $result . " was encountered!";
						}
		




	header('location:../admin/process.php?key='.$memid.'');

		

	}

}


?>
