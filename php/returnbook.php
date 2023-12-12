<?php

include 'db.php';


date_default_timezone_set('Asia/Manila');

$date = date("Y-m-d",strtotime("-8 HOURS"));

$statusid = $_GET['status'];

$memid = $_GET['memid'];

$pkey = $_GET['pkey'];

$sql = mysqli_query($conn, "UPDATE bookstatus set returned = '$date', status='returned' where bookstatusid = '$statusid' ");

$book = mysqli_query($conn, "SELECT * from bookstatus where bookstatusid = '$statusid'");
$bookquery = mysqli_fetch_array($book);
$bookid = $bookquery['booksid'];


$rebook = mysqli_query($conn, "SELECT * from books where bookid = '$bookid'");
$rebookquery = mysqli_fetch_array($rebook);

$copies = $rebookquery['copies']+1;

mysqli_query($conn, "UPDATE books set copies = '$copies' where bookid = '$bookid'");

mysqli_query($conn,"INSERT into reports (fullname,title,task,transactiondate) values ('$pkey','$bookid','returned book','$date')");
header('location:../admin/process.php?key='.$memid.'');

?>