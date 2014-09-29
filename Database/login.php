<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kolby's Computers</title>
<?php include 'include/head.php'; ?>
</head>

<body>

<div class="container">
  <div class="header">
  <?php include 'include/header.php'; ?>
    <!-- end .header --></div>
  <div class="sidebar1">
  <?php include 'include/sidebar.php'; ?>
    <!-- end .sidebar1 --></div>
  <div class="content">
  <p><?php if(isset($_POST["username"]))
		{
		//Get all fields from _POST and put them in variables
			$username = $_POST["username"];
			$password = $_POST["password"];
			require "include/mysql_connect.php";
			$result = mysql_query("SELECT * FROM kcs_accounts WHERE username='$username' AND password='$password'");
			$rows = mysql_num_rows($result);
			mysql_close($con);
			if($rows == 0)
			{
				echo "Your username or password is incorrect, please try again.";
			}
			else
			{
				$_SESSION["username"] = $username;
				$_SESSION["password"] = $password;
				echo "You are now logged in.";
				?><a href=""><?php echo "Click here if you are not redirected."; ?></a><?php
				header('Location: http://kolbyscomputers.ca');
			}
		}
			?></p>
	<p>Please Login Below:</p>
    <form name="input" action="login.php" method="post"><p><br />
	Username: <br /><input type="text" size="50" name="username" /><br />
	Password: <br /><input type="password" size="50" name="password" /><br />
	<br /><input type="submit" value="Submit" />
	</p></form>
    <!-- end .content --></div>
  <div class="footer">
  <?php include 'include/footer.php'; ?>
    <!-- end .footer --></div>
  <!-- end .container --></div>
</body>
</html>