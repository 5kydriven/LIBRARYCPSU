<?php 

include 'db.php';
session_start();

	echo $allowid = $_GET['key'];


$bb = $_POST['books'];
$bbb = $_POST['days'];
$bbbb = $_POST['penalty'];



       mysqli_query($conn, "UPDATE allowable SET allowbooks ='$bb', allowdays = '$bbb', penalty = '$bbbb' WHERE allowid='$allowid'");

       echo "<script>alert('Successfully save changes :)')</script>";
                     echo "<script>window.open('../admin/settings.php', '_self')</script>";



?>