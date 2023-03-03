<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="icon" href="./css/images/logo-ar-removebg-preview.png">
</head>
<body>
    <form action="Patients-login.php" method="post">
		<h2>LOGIN</h2>
		<?php if (isset($_GET['error'])) { ?>
			<p class="error"><?php echo $_GET['error']; ?></p>
		<?php } ?>
		<label>User Name</label>
		<input type="text" name="uname" placeholder="User Name"><br>

		<label>Password</label>
		<input type="password" name="password" placeholder="Password"><br>

		<button type="submit">Login</button>
        <a href="Patients-signup.php" class="ca">Create an account</a>
    </form>
</body>
</html>