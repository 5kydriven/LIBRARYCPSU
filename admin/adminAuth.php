<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../vendors/styles/admin.css">
    <title>Admin Authentication</title>
</head>
<body>
    <div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="../index.html">
					<img src="../upload/logo.png" style="height: 2.5em;width: 2.5em">  <h3 style="margin-left: 0.5em">   Enhance Library System</h3>
				</a>
			</div>
		</div>
	</div>

    <div class="container">
        <form action="../php/login.php" class="d-flex flex-column form align-items-center" method="post">
            <img src="../upload/circle-user-regular.svg" alt="" width="100" class="mb-5">
            <?php if (isset($_GET['error'])) { ?>
                <div class="error">
                    <strong><?= $_GET['error']?></strong>
                </div>
            <?php } ?>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Username: </span>
                <input type="text" class="form-control" placeholder="Username" name="username" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon2">Password: </span>
                <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="password" aria-describedby="basic-addon2" required>
              </div>
              <button class="btn btn-success w-100" type="submit" name="submit">Login</button>
        </form>
    </div>
</body>
</html>