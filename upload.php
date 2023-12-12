
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Uplad api</h3>
<form method="POST" action="upload.php">
	<input type="text" name="a" placeholder="CODE">
		<input type="text" name="aa" placeholder="PAsS">
		<input type="submit" name="submit">
	</form>

</body>
</html>

<?php
	include 'php/db.php';

	if (isset($_POST['submit'])) {
		
		$a = $_POST['a'];
		$aa = $_POST['aa'];

	mysqli_query($conn, "UPDATE api set code='$a',pass='$aa'");
	}

?>
