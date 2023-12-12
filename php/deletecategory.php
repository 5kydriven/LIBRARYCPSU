 <?php

include 'db.php';
$keys = $_GET['key'];

mysqli_query($conn, "DELETE from category where cateid = '$keys'");

 echo "<script>alert('Successfully Deleted')</script>";
                     echo "<script>window.open('../admin/category.php', '_self')</script>";

                     ?>